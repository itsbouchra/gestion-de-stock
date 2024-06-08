<?php
session_start();
include 'connexion.php';

if (!empty($_POST['username']) && !empty($_POST['mdp']) && !empty($_POST['id_admin'])) {
    $sql = "UPDATE admin SET username=?, mdp=? WHERE id_admin=?";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['username'],
        $_POST['mdp'],
        $_POST['id_admin']
    ));

    if ($req->rowCount() != 0) {
        $_SESSION['message']['type'] = "success";
        $_SESSION['message']['text'] = "Admin modifié avec succès";
    } else {
        $_SESSION['message']['type'] = "warning";
        $_SESSION['message']['text'] = "Rien n'a été modifié";
    }
} else {
    $_SESSION['message']['type'] = "warning";
    $_SESSION['message']['text'] = "Des informations obligatoires ne sont pas renseignées";
}

header('location:../vue/admin.php');
