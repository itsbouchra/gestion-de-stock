<?php 
include 'connexion.php';


if (
    !empty($_POST['nom'])
  &&  !empty($_POST['prenom'])
   && !empty($_POST['telephone'])
   && !empty($_POST['adresse'])
 
) {

$sql = "INSERT INTO clients(nom,prenom,telephone,adresse )
        VALUES(?,?,?,?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse']
     ) );
 

 if ( $req->rowCount()!=0) {
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="produit ajouté avec succès";
   

 }else {   
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une erreur s est produit lors de l ajout du client";
 }

} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";


}


header('location:../vue/client.php');