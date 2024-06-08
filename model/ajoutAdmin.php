<?php 
include 'connexion.php';


if (
    !empty($_POST['username'])
    && !empty($_POST['mdp'])


) {

    $sql = "INSERT INTO admin(username,mdp )
    VALUES(?,?)";
        $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['username'],
        $_POST['mdp']
     ) );
 

 if ( $req->rowCount()!=0) {
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="admin ajouté avec succès";
   

 }else {   
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une erreur s est produit lors de l ajout de l'admin ";
 }

} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";


}


header('location:../vue/admin.php');