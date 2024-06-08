<?php 
include 'connexion.php';


if (
    !empty($_POST['libelle_cat'])

) {

$sql = "INSERT INTO $nom_base_de_donne.categorie(libelle_cat) VALUES(?)";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['libelle_cat'],
      

     ) );
 

 if ( $req->rowCount()!=0) {
    $_SESSION['message']['type']=" success";
    $_SESSION['message']['text']="categorie ajouté avec succès";
   

 }else {   
    $_SESSION['message']['type']=" danger";
    $_SESSION['message']['text']="une erreur s est produit lors de l ajout du categorie";
 }

} else {    
    $_SESSION['message']['type']=" warning";
    $_SESSION['message']['text']="une information obligatoire non rensignée";


}


header('location:../vue/categorie.php');