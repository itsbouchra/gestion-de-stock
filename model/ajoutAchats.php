<?php 
include 'connexion.php';
include_once"function.php";

if (
    !empty($_POST['id_Fourn'])
  &&  !empty($_POST['id_produit'])
   && !empty($_POST['quantite'])
   && !empty($_POST['prix'])
 
) 

{
        
$sql = "INSERT INTO achats(id_Fourn,id_produit,quantite,prix )
VALUES(?,?,?,?)";
$req = $connexion->prepare($sql);

$req->execute(array(
$_POST['id_Fourn'],
$_POST['id_produit'],
$_POST['quantite'],
$_POST['prix']
) );


if ( $req->rowCount()!=0) {

      $sql = "UPDATE produit SET quantite=quantite+? WHERE id_produit=?";
      $req = $connexion->prepare($sql);
      $req->execute(array(
      $_POST['id_produit'] ,
      $_POST['quantite']
    ));


if ( $req->rowCount()!=0) {
    
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="achat effectué avec succès";

} else {
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="impossible de faire cet achat";
    
}

}else {   
     $_SESSION['message']['type']=" danger";
     $_SESSION['message']['text']="une erreur s est produit lors de l'achat";
   }

} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";
}


header('location:../vue/achats.php');