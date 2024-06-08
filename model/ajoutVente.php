<?php 
include 'connexion.php';
include_once"function.php";

if (
    !empty($_POST['id_produit'])
  &&  !empty($_POST['id_clients'])
   && !empty($_POST['quantite'])
   && !empty($_POST['prix'])
 
) {


$produit = getProduit($_POST['id_produit']);

if(!empty($produit)&& is_array($produit)){
    if ($_POST['quantite']>$produit['quantite']) {
        $_SESSION['message']['text'] = "la quantite à vendre n'est pas disponible ";
        $_SESSION['message']['type']="danger";
    }else

{
        
$sql = "INSERT INTO vente(id_produit,id_clients,quantite,prix )
VALUES(?,?,?,?)";
$req = $connexion->prepare($sql);

$req->execute(array(
$_POST['id_produit'],
$_POST['id_clients'],
$_POST['quantite'],
$_POST['prix']
) );


if ( $req->rowCount()!=0) {

      $sql = "UPDATE produit SET quantite=quantite-? WHERE id_produit=?";
      $req = $connexion->prepare($sql);
      $req->execute(array(
       $_POST['quantite'], 
       $_POST['id_produit']
        
    ));


if ( $req->rowCount()!=0) {
    
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="vente effectué avec succès";

} else {
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="impossible de faire cette vente";
    
}

}else {   
     $_SESSION['message']['type']=" danger";
     $_SESSION['message']['text']="une erreur s est produit lors de la vente";
   }
  }
}



} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";
}


header('location:../vue/Vente.php');