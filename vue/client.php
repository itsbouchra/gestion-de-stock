<?php
include 'entete.php';

if (!empty($_GET['id_clients'])) {
$clients = getClient(($_GET['id_clients']));
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_clients']) ? "../model/modifClient.php" : "../model/ajoutClient.php" ?> " method="post">
          <label for="nom">Nom</label>
          <input value="<?=  !empty($_GET['id_clients']) ? $clients['nom'] : ""?>"  type="text" name="nom" id="nom" placeholder="veuillez saisir le nom ">
          <input value="<?=  !empty($_GET['id_clients']) ? $clients['id_clients'] : ""?>"  type="hidden" name="id_clients" id="id_clients" >
          
          <label for="nom">Prenom</label>
          <input value="<?=  !empty($_GET['id_clients']) ? $clients['prenom'] : ""?>"  type="text" name="prenom" id="prenom" placeholder="veuillez saisir le prenom ">

          <label for="telephone">Telephone</label>
          <input  value="<?=  !empty($_GET['id_clients']) ? $clients['telephone'] : "" ?>"   type="text" name="telephone" id="telephone" placeholder="veuillez saisir le numero du telephone ">
       
       
          <label for="adresse">Adresse</label>
          <input  value="<?=  !empty($_GET['id_clients']) ? $clients['adresse'] : "" ?>"   type="text" name="adresse" id="adresse" placeholder="veuillez saisir l'adresse ">
       
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
          $client = getClient();

          if(!empty($client) && is_array($client)) {
            foreach ($client as $key => $value) {
              ?>
              <tr>
                <td><?= $value['nom'] ?></td>
                <td><?= $value['prenom'] ?></td>
                <td><?= $value['telephone'] ?></td>
                <td><?= $value['adresse'] ?></td>
                <td><a href="?id_clients=<?= $value['id_clients'] ?>"><i class='bx bx-edit-alt'></i></a></td>
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