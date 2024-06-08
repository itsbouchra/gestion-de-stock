<?php

include_once '../model/function.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />

    <title>
      <?php

         echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
      ?>
    </title>

       <link rel="stylesheet" href="<?php echo '../public/css/style.css'; ?>" />

    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    

 





    <div class="sidebar">
      <div class="logo-details">
      <i class='bx bxs-store'></i>    
        <span class="logo_name">Superette</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="home.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="home.php" ? "active" : "" ?>">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Home</span>
          </a>
        </li>
        <li>
          <a href="vente.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="vente.php" ? "active" : "" ?>">
          <i class='bx bx-shopping-bag' ></i>       
           <span class="links_name">Vente</span>
          </a>
        </li>
        <li>
          <a href="client.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="client.php" ? "active" : "" ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">Client</span>
          </a>
        </li>
        <li>
          <a href="fournisseur.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="fournisseur.php" ? "active" : "" ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">Fournisseur</span>
          </a>
        </li>
        <li>
          <a href="produit.php"class="<?php echo basename($_SERVER['PHP_SELF'])=="produit.php" ? "active" : "" ?>">
            <i class="bx bx-box"></i>
            <span class="links_name">Produit</span>
          </a>
        </li>
        <li>
          <a href="categorie.php"class="<?php echo basename($_SERVER['PHP_SELF'])=="categorie.php" ? "active" : "" ?>">
            <i class="bx bx-category"></i>
            <span class="links_name">Categorie</span>
          </a>
        </li>
        <li>
          <a href="achats.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="achats.php" ? "active" : "" ?>">
            <i class="bx bx-list-ul"></i>
            <span class="links_name">Achats</span>
          </a>
        </li>
       
         
       <li>
          <a href="admin.php" class="<?php echo basename($_SERVER['PHP_SELF'])=="admin.php" ? "active" : "" ?>">
            <i class="bx bx-user"></i>
            <span class="links_name">Administrateur</span>
          </a>
        </li>
       
       
        <li class="log_out">
          <a href="logout.php">
            <i class="bx bx-log-out"></i>
            <span class="links_name">Déconnexion</span>
          </a>
        </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="home">
          <?php

            echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
          ?>

          </span>
        </div>
        <div class="highlight-text">Des produits de qualité, des prix imbattables</div>
           </div>


           
       
      </nav>