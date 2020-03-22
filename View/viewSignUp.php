<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/formulaires.css">
  </head>
  <body>
    <?php
      include("./Controller/controllerSignUp.php");
    ?>
    <h1>S'inscrire</h1>
    <?php
      if(isset($_SESSION['login']))
      {
        header('Location : viewGames.php');
      }
      else {
        if (isset($_POST['login']) && isset($_POST['passwrd']) && isset($_POST['mail']) && isset($_POST['passwrdConfirm']) && isset($_POST['role'])) {
          if(is_string($_POST['passwrd']))
          {
            $mdp = password_hash($_POST['passwrd'], PASSWORD_DEFAULT);
            if(password_verify($_POST['passwrdConfirm'], $mdp))
            {
              try {
                createUser($mdp);
                header('Location: viewConnect.php');
              } catch (Exception $e) {
                echo $e->getMessage();
              }

            }
            else {
              echo "Les mots de passe ne correspondent pas.";
            }
          }
          else {
            echo "Le mot de passe doit contenir une lettre minimum.";
          }
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
