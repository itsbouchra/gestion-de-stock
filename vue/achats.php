<?php
include 'entete.php';

if (!empty($_GET['id_produit'])) {
$produit = getAchats($_GET['id_produit']);
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_produit']) ? "../model/modifAchats.php" : "../model/ajoutAchats.php" ?> " method="post">
         <input value="<?=  !empty($_GET['id_produit']) ? $produit['id_produit'] : ""?>"  type="hidden" name="id_produit" id="id_produit" >

          
          <label for="id_produit">Produit</label>
          <select name="id_produit" id="id_produit">
            <?php
             $produits = getProduit();

             if (!empty($produits) && is_array($produits)) {
              foreach ($produits as $key => $value) {
             ?>
                <option data-prix="<?= $value['prix_unitaire'] ?>" value="<?= $value['id_produit'] ?>"><?= $value['nom_produit'] . " - " . $value['quantite'] . "disponible" ?></option>
             <?php
              }
             }
            ?>
          </select>

          
          <label for="id_Fourn">Fournisseur</label>
          <select name="id_Fourn" id="id_Fourn">
            <?php
             $clients = getFournisseur();

             if (!empty($clients) && is_array($clients)) {
              foreach ($clients as $key => $value) {
             ?>
                <option value="<?= $value['id_Fourn']?>"><?= $value['nom']. " ". $value['prenom'] ?></option>
             <?php
              }
             }
            ?>
          </select>





          <label for="quantite">quantite</label>
          <input oninput="setPrix()" value="<?=  !empty($_GET['id_produit']) ? $produit['quantite'] : "" ?>"   type="number" name="quantite" id="quantite" placeholder="veuillez saisir la quantite ">
       
       
          <label for="prix">prix </label>
          <input  value="<?=  !empty($_GET['id_produit']) ? $produit['prix'] : "" ?>"   type="number" name="prix" id="prix" placeholder="veuillez saisir le prix">
       
         
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
          <th>Produit</th>
          <th>Client</th>
          <th>Quantite</th>
          <th>Prix</th>
          <th>Date </th>
           <!-- <th>Action</th>  -->
        </tr>
       
        <?php
           //affichage     
         $achats = getAchats();
          if(!empty($achats) && is_array($achats)) {
            foreach ($achats as $key => $value) {
              ?>
               <tr>
                <td><?= $value['nom_produit'] ?></td>
                <td><?= $value['nom']." ".$value['prenom'] ?></td>
                <td><?= $value['quantite'] ?></td>
                <td><?= $value['prix'] ?></td>
                <td><?= $value['date_achat'] ?></td>
                <!-- <td><a href="?id_produit=<?= $value['id_produit'] ?>"><i class='bx bx-edit-alt'></i></a></td>  -->
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

<script>
   function setPrix() {
      var produit = document.querySelector('#id_produit');
      var quantite = document.querySelector('#quantite');
      var prix = document.querySelector('#prix');

      var prixUnitaire = produit.options[produit.selectedIndex].getAttribute('data-prix');

      prix.value = Number(quantite.value) * Number(prixUnitaire); 
   }
</script>
