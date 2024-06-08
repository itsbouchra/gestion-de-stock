<?php
include 'connexion.php';

function getProduit($id_produit=null)
{
   if (!empty($id_produit)) {

    $sql = "SELECT nom_produit, libelle_cat, quantite, prix_unitaire, date_F, date_E, id_categorie ,p.id_produit, images
     FROM produit AS p, categorie AS cat 
     WHERE p.id_categorie=cat.id_cat AND p.id_produit=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_produit));

    return $req->fetch();

   } else {

    $sql = "SELECT nom_produit,libelle_cat, quantite, prix_unitaire,date_F, date_E, id_categorie,p.id_produit,images
    FROM produit AS p, categorie AS cat
    WHERE p.id_categorie=cat.id_cat";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}



function getClient($id_clients=null)
{
   if (!empty($id_clients)) {

    $sql = "SELECT * FROM clients WHERE id_clients=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_clients));

    return $req->fetch();

   } else {

    $sql = "SELECT * FROM clients";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}




function getVente($id_vente=null)
{
   if (!empty($id_vente)) {

    $sql = "SELECT nom_produit, nom, prenom, v.quantite, prix,date_vente
    FROM clients AS c , Vente AS v , produit AS p
     WHERE v.id_produit=p.id_produit AND v.id_clients=c.id_clients AND v.id_vente=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_vente));

    return $req->fetch();

   } else {

    $sql = "SELECT nom_produit, nom, prenom, v.quantite, prix,date_vente
    FROM clients AS c , vente AS v , produit AS p WHERE v.id_produit=p.id_produit AND v.id_clients=c.id_clients";
    
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}

function getFournisseur($id_Fourn=null)
{
   if (!empty($id_Fourn)) {

    $sql = "SELECT * FROM fournisseurs WHERE id_Fourn=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_Fourn));

    return $req->fetch();

   } else {

    $sql = "SELECT * FROM fournisseurs";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}



function getAchats($id_achats=null)
{
   if (!empty($id_achats)) {

    $sql = "SELECT nom_produit, nom, prenom, a.quantite, prix,date_achat
    FROM fournisseurs AS f , achats AS a , produit AS p , Vente AS v
    WHERE a.id_produit=p.id_produit AND a.id_Fourn=f.id_Fourn AND v.id_vente=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_achats));

    return $req->fetch();

   } else {

    $sql = "SELECT nom_produit, nom, prenom, a.quantite, prix,date_achat
    FROM fournisseurs AS f, achats AS a , produit AS p WHERE a.id_produit=p.id_produit AND a.id_Fourn=f.id_Fourn";
    
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}
function getAllCommande()
{
    $sql = "SELECT COUNT(*) AS nb FROM achats";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetch(); 
}

function getAllVente()
{
    $sql = "SELECT COUNT(*) AS nb FROM Vente";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetch(); 
}


function getAllProduit()
{
    $sql = "SELECT COUNT(*) AS nb FROM produit";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetch(); 
}




function getAllCA()
{
    $sql = "SELECT SUM(prix) AS prix FROM Vente";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetch(); 
}


function getLV()
{
  
    $sql = "SELECT nom_produit, nom, prenom, v.quantite, prix,date_vente
    FROM clients AS c , vente AS v , produit AS p WHERE v.id_produit=p.id_produit AND v.id_clients=c.id_clients
    ORDER BY date_vente DESC LIMIT 5";
    
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll(); 
  }

  function getMV()
{
  
    $sql = "SELECT nom_produit,SUM(prix) AS prix
    FROM clients AS c , vente AS v , produit AS p WHERE v.id_produit=p.id_produit AND v.id_clients=c.id_clients
    GROUP BY p.id_produit
    ORDER BY SUM(prix) DESC LIMIT 5";
    
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll(); 
  }
   

  function getCategorie($id_cat=null)
{
   if (!empty($id_cat)) {

    $sql = "SELECT * FROM categorie WHERE id_cat=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_cat));

    return $req->fetch();

   } else {

    $sql = "SELECT * FROM categorie";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}
function getAdmin($id_admin=null)
{
   if (!empty($id_admin)) {

    $sql = "SELECT * FROM admin WHERE id_admin=?";

    $req = $GLOBALS['connexion']->prepare($sql);

    $req->execute(array($id_admin));

    return $req->fetch();

   } else {

    $sql = "SELECT * FROM admin";
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();
    return $req->fetchAll();   }
   
}

