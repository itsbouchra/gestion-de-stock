<?php
include 'entete.php';

if (!empty($_GET['id_admin'])) {
$admins = getAdmin(($_GET['id_admin']));
} 

?>

<div class="home-content">
    <div class="overview-boxes">
    <div class="box">
        <form action=" <?=  !empty($_GET['id_admin']) ? "../model/modifAdmin.php" : "../model/ajoutAdmin.php" ?> " method="post">
        <label for="nom">Username</label>
          <input value="<?=  !empty($_GET['id_admin']) ? $admins['username'] : ""?>"  type="text" name="username" id="username" placeholder="veuillez saisir votre userame ">
          <input value="<?=  !empty($_GET['id_admin']) ? $admins['id_admin'] : ""?>"  type="hidden" name="id_admin" id="id_admin" >
          
          <label for="nom">Mot de passe</label>
          <input value="<?=  !empty($_GET['id_admin']) ? $admins['mdp'] : ""?>"  type="text" name="mdp" id="mdp" placeholder="veuillez saisir le mot de passe ">

          
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
          <th>Username</th>
          <th>mot de passe</th>
          <th>action</th>

        </tr>
       
        <?php
          $admins = getAdmin();

          if(!empty($admins) && is_array($admins)) {
            foreach ($admins as $key => $value) {
              ?>
              <tr>
                <td><?= $value['username'] ?></td>
                <td><?= $value['mdp'] ?></td>
                <td><a href="?id_admin=<?= $value['id_admin'] ?>"><i class='bx bx-edit-alt'></i></a></td>
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