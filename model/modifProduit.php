<?php
include 'connexion.php';

if (
    !empty($_POST['nom_produit']) &&
    !empty($_POST['id_categorie']) &&
    !empty($_POST['quantite']) &&
    !empty($_POST['prix_unitaire']) &&
    !empty($_POST['date_F']) &&
    !empty($_POST['date_E']) &&
    !empty($_FILES['images']) &&
    !empty($_POST['id_produit']) // ID du produit à mettre à jour
) {
    $nom_produit = $_POST['nom_produit'];
    $id_categorie = $_POST['id_categorie'];
    $quantite = $_POST['quantite'];
    $prix_unitaire = $_POST['prix_unitaire'];
    $date_F = $_POST['date_F'];
    $date_E = $_POST['date_E'];
    $id_produit = $_POST['id_produit'];

    // Dossier de destination pour enregistrer les images
    $targetDir = "../public/images/";

    // Récupération des informations sur le fichier téléchargé
    $fileName = basename($_FILES['images']['name']);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Vérifier si le fichier est une image
    $isImage = getimagesize($_FILES['images']['tmp_name']);
    if ($isImage !== false) {
        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($_FILES['images']['tmp_name'], $targetFilePath)) {
            // Mettre à jour le produit dans la base de données avec le chemin de l'image
            $sql = "UPDATE produit SET nom_produit=?, id_categorie=?, quantite=?, prix_unitaire=?, date_F=?, date_E=?, images=? WHERE id_produit=?";
            $req = $connexion->prepare($sql);
            $req->execute(array(
                $nom_produit,
                $id_categorie,
                $quantite,
                $prix_unitaire,
                $date_F,
                $date_E,
                $targetFilePath,
                $id_produit
            ));

            if ($req->rowCount() > 0) {
                $_SESSION['message']['type'] = "success";
                $_SESSION['message']['text'] = "Produit modifié avec succès";
            } else {
                $_SESSION['message']['type'] = "warning";
                $_SESSION['message']['text'] = "Rien n'a été modifié";
            }
        } else {
            $_SESSION['message']['type'] = "danger";
            $_SESSION['message']['text'] = "Erreur lors du téléchargement de l'image";
        }
    } else {
        $_SESSION['message']['type'] = "danger";
        $_SESSION['message']['text'] = "Le fichier téléchargé n'est pas une image valide";
    }
} else {
    $_SESSION['message']['type'] = "warning";
    $_SESSION['message']['text'] = "Une information obligatoire n'a pas été renseignée";
}

header('location:../vue/produit.php');
?>
