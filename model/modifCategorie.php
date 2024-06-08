<?php 
include 'connexion.php';


if (
    !empty($_POST['libelle_cat'])
) {

$sql = "UPDATE categorie SET libelle_cat=? WHERE id_cat=?";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['libelle_cat'],
        $_POST['id_cat'],
    

     ) );
 

 if ( $req->rowCount()!=0) {
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="categorie modifié avec succès";
   

 }else {   
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="rien n'a été modifié";
 }

} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";


}


header('location:../vue/categorie.php');