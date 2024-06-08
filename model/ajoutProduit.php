<?php 
include 'connexion.php';


if (
    !empty($_POST['nom_produit'])
  &&  !empty($_POST['id_categorie'])
   && !empty($_POST['quantite'])
   && !empty($_POST['prix_unitaire'])
   && !empty($_POST['date_F'])
   && !empty($_POST['date_E'])
   && !empty($_FILES['images'])

) {

$sql = "INSERT INTO $nom_base_de_donne.produit(nom_produit,id_categorie,quantite,prix_unitaire,date_F,date_E,images )
        VALUES(?,?,?,?,?,?,?)";
    $req = $connexion->prepare($sql);

    $name = $_FILES['images']['name'];;
    $tmp_name = $_FILES['images']['tmp_name'];;
    $folder = "../public/images";
    $destination = "../public/images/$name";




    if(is_dir($folder)){
        mkdir($folder, 0777, true);
    }

    if (move_uploaded_file($tmp_name, $destination)){
        

        $req->execute(array(
            $_POST['nom_produit'],
            $_POST['id_categorie'],
            $_POST['quantite'],
            $_POST['prix_unitaire'],
            $_POST['date_F'],
            $_POST['date_E'],
            $destination
    
         ) );
     
    
     if ( $req->rowCount()!=0) {
        $_SESSION['message']['type']=" success";
        $_SESSION['message']['text']="image ajouté avec succès";
       
    
     }else {   
        $_SESSION['message']['type']=" danger";
        $_SESSION['message']['text']="une erreur s est produit lors de l ajout de l'image ";
     }
   
} else {    
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une erreur s est produit lors de l ajout de l'image ";
 }

}else {

    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une information obligatoire non rensignée ";
 

}


header('location:../vue/produit.php');