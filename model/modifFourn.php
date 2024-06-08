<?php 
include 'connexion.php';


if (
    !empty($_POST['nom'])
  &&  !empty($_POST['prenom'])
   && !empty($_POST['telephone'])
   && !empty($_POST['adresse'])
   && !empty($_POST['id_Fourn'])

) {

$sql = "UPDATE fournisseurs SET nom=?, prenom=?, telephone=?, adresse=? WHERE id_Fourn=?";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['nom'],
        $_POST['prenom'],
        $_POST['telephone'],
        $_POST['adresse'],
        $_POST['id_Fourn']

     ) );
 

 if ( $req->rowCount()!=0) {
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="fournisseur modifié avec succès";
   

 }else {   
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="rien n'a été modifié";
 }

} else {    
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une information obligatoire non rensignée";


}


header('location:../vue/fournisseur.php');