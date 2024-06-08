<?php
include 'entete.php';

if (!empty($_GET['id_cat'])) {
$produit = getCategorie(($_GET['id_cat']));
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_cat']) ? "../model/modifCategorie.php" : "../model/ajoutCategorie.php" ?> " method="post">
          <label for="libelle_cat">Libelle</label>
          <input value="<?=  !empty($_GET['id_cat']) ? $produit['libelle_cat'] : ""?>"  type="text" name="libelle_cat" id="libelle_cat" placeholder="veuillez saisir le nom ">
          <input value="<?=  !empty($_GET['id_cat']) ? $produit['id_cat'] : ""?>"  type="hidden" name="id_cat" id="id_cat" >

          
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
          <th>libelle</th>
          <th>action</th>

        </tr>
       
        <?php
          $categories = getCategorie();

          if(!empty($categories) && is_array($categories)) {
            foreach ($categories as $key => $value) {
              ?>
              <tr>
                <td><?= $value['libelle_cat'] ?></td>
                <td><a href="?id_cat=<?= $value['id_cat'] ?>"><i class='bx bx-edit-alt'></i></a></td>
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