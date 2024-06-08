<?php
include 'entete.php';

if (!empty($_GET['id_produit'])) {
$produit = getProduit(($_GET['id_produit']));
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_produit']) ? "../model/modifProduit.php" : "../model/ajoutProduit.php" ?> " method="post" enctype="multipart/form-data">
          <label for="nom_produit">Nom de produit</label>
          <input value="<?=  !empty($_GET['id_produit']) ? $produit['nom_produit'] : ""?>"  type="text" name="nom_produit" id="nom_produit" placeholder="veuillez saisir le nom ">
          <input value="<?=  !empty($_GET['id_produit']) ? $produit['id_produit'] : ""?>"  type="hidden" name="id_produit" id="id_produit" >

          
          <label for="id_categorie">Categorie</label>
          <select name="id_categorie" id="id_categorie">

              <?php
                 $categories = getCategorie();
                if(!empty($categories) && is_array($categories)){
                  foreach($categories as $key => $value) {
                   ?>
                    <option <?= !empty($_GET['id_produit']) && $produit['id_categorie'] == $value['id_cat'] ? "selected" : "" ?> value="<?= $value['id_cat'] ?>"><?= $value['libelle_cat'] ?></option>
                  <?php
                }
              }
              ?>
            </select>

          <label for="quantite">Quantite</label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['quantite'] : "" ?>"   type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite ">
       
       
          <label for="prix_unitaire">Prix unitaire</label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['prix_unitaire'] : "" ?>"   type="number" name="prix_unitaire" id="prix_unitaire" placeholder="veuillez saisir le prix">
       
          <label for="date_F">Date de fabrication</label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['date_F'] : "" ?>"   type="datetime-local" name="date_F" id="date_F">

          
          <label for="date_E">Date d'expiration</label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['date_E'] : "" ?>"   type="datetime-local" name="date_E" id="date_E">

          <label for="images">Image</label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['date_E'] : "" ?>"   type="file" name="images" id="images">

          <button type="submit">Valider</button>


          <?php
            if (!empty($_SESSION['message']['text'])) {
          ?>

                <div class="alert <?= $_SESSION['message']['type'] ?>">
                   <?= $_SESSION['message']['text'] ?>
                </div>
         <?php
        }
        ?>
       
       </form>
    </div>

    <div  class="box">
      <table class="mtable">
        <tr>
          <th>nom produit</th>
          <th>categorie</th>
          <th>qtt</th>
          <th>prix_U</th>
          <th>date fab</th>
          <th>date exp</th>
          <th>image</th>
           <th>action</th> 

        </tr>
       
        <?php
          $produit = getProduit();

          if(!empty($produit) && is_array($produit)) {
            foreach ($produit as $key => $value) {
              ?>
              <tr>
                <td><?= $value['nom_produit'] ?></td>
                <td><?= $value['libelle_cat'] ?></td>
                <td><?= $value['quantite'] ?></td>
                <td><?= $value['prix_unitaire'] ?></td>
                <td><?= $value['date_F'] ?></td>
                <td><?= $value['date_E'] ?></td>
                <td><img width="75" height="75"  src="<?= $value['images'] ?>" alt="<?= $value['nom_produit'] ?>"></td>
               <td><a href="?id_produit=<?= $value['id_produit'] ?>"><i class='bx bx-edit-alt'></i></a></td> 
              </tr>
              <?php
            }
          }
        ?>

      </table>
    </div>
 </div>
</div>
</section>

<?php
include 'pied.php';
?>