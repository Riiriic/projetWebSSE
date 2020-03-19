<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/formulaires.css">
  </head>
  <body>
    <?php
      include("../bdd/connexion.php");
    ?>
    <h1>S'inscrire</h1>
    <?php
      if(isset($_SESSION['login']))
      {
        header('Location : viewGames.php');
      }
      else {
        if (isset($_POST['login']) && isset($_POST['passwrd']) && isset($_POST['mail']) && isset($_POST['passwrdConfirm']) && isset($_POST['role'])) {
          $mdp = password_hash($_POST['passwrd'], PASSWORD_DEFAULT);
          if(password_verify($_POST['passwrdConfirm'], $mdp))
          {
            try {

              $stm = $dbh->prepare("INSERT INTO UTILISATEURS VALUES (:login, :mdp, :mail, :role)");
              $stm->bindParam(':login', $login);
              $login = $_POST['login'];
              $stm->bindParam(':mdp', $mdp);
              $mdp = $mdp;
              $stm->bindParam(':mail', $mail);
              $mail = $_POST['mail'];
              $stm->bindParam(':role', $role);
              $role = $_POST['role'];
              $stm->execute();
              header('Location: viewConnect.php');
            } catch (Exception $e) {
              echo $e->getMessage();
            }

          }
          else {
            echo "Les mots de passe ne correspondent pas.";
          }
        /*  $stm = $dbh->prepare("INSERT INTO UTILISATEURS VALUES (:login, :mdp, :mail, :role)");
          $stm->bindParam(':login', $login);
          $login = $_POST['login'];
          if($stm->execute()>0)
          {
            $row = $stm->fetch();
            echo $row[1];
            if($row[1]!=$_POST['passwrd'])
            {
              header('Location: viewConnect.php');
            }
            else {
              session_start();
              $_SESSION['login'] = $row[0];
              $_SESSION['role'] = $row[3];
              header('Location: viewGames.php');
            }
          }*/
        }
      }
    ?>
    <form class="formRegister" class="formulaires" action="" method="post">
      <label for="login">Login</label>
      <br>
      <input type="text" name="login" value="" required>
      <br>
      <label for="passwrd">Mot de passe : </label>
      <br>
      <input type="password" name="passwrd" value="" required>
      <br>
      <label for="passwrdConfirm">Confirmez le mot de passe : </label>
      <br>
      <input type="password" name="passwrdConfirm" value="" required>
      <br>
      <label for="mail">E-mail</label>
      <br>
      <input type="email" name="mail" value="" required>
      <br>
      <label for="role">Rôle</label>
      <br>
      <select class="selectRole" name="role" required>
        <option value="" disabled selected value>Selectionnez un rôle</option>
        <option value="maitreJeu">Maître du Jeu</option>
        <option value="chefPompier">Chef des pompiers</option>
        <option value="chefPolice">Chef de la police</option>
        <option value="chefSAMU">Chef du SAMU</option>
        <option value="medecinTrieur">Médecin Trieur</option>
        <option value="medecinRepartiteur">Médecin Répartiteur</option>
        <option value="centre">Centre 15</option>
      </select>
      <br>
      <button type="submit" name="btnRegister" class="btn-formulaires">S'inscrire</button>
    </form>
  </body>
</html>
