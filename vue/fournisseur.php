<?php
include 'entete.php';

if (!empty($_GET['id_Fourn'])) {
$fournisseurs = getFournisseur(($_GET['id_Fourn']));
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_Fourn']) ? "../model/modifFourn.php" : "../model/ajoutFourn.php" ?> " method="post">
          <label for="nom">Nom</label>
          <input value="<?=  !empty($_GET['id_Fourn']) ? $fournisseurs['nom'] : ""?>"  type="text" name="nom" id="nom" placeholder="veuillez saisir le nom ">
          <input value="<?=  !empty($_GET['id_Fourn']) ? $fournisseurs['id_Fourn'] : ""?>"  type="hidden" name="id_Fourn" id="id_Fourn" >
          
          <label for="nom">Prenom</label>
          <input value="<?=  !empty($_GET['id_Fourn']) ? $fournisseurs['prenom'] : ""?>"  type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom ">

          <label for="telephone">Telephone</label>
          <input  value="<?=  !empty($_GET['id_Fourn']) ? $fournisseurs['telephone'] : "" ?>"   type="text" name="telephone" id="telephone" placeholder="veuillez saisir le numero du telephone ">
       
       
          <label for="adresse">Adresse</label>
          <input  value="<?=  !empty($_GET['id_Fourn']) ? $fournisseurs['adresse'] : "" ?>"   type="text" name="adresse" id="adresse" placeholder="veuillez saisir l'adresse ">
       
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
          <th>nom </th>
          <th>prenom</th>
          <th>telephone</th>
          <th>adresse </th>
          <th>action</th>

        </tr>
       
        <?php
          $fournisseurs = getFournisseur();

          if(!empty($fournisseurs) && is_array($fournisseurs)) {
            foreach ($fournisseurs as $key => $value) {
              ?>
              <tr>
                <td><?= $value['nom'] ?></td>
                <td><?= $value['prenom'] ?></td>
                <td><?= $value['telephone'] ?></td>
                <td><?= $value['adresse'] ?></td>
                <td><a href="?id_Fourn=<?= $value['id_Fourn'] ?>"><i class='bx bx-edit-alt'></i></a></td>
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