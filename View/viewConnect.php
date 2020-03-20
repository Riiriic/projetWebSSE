<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/formulaires.css">
  </head>
  <body>
    <?php
      include("../Controller/controllerConnect.php");
      echo "<h1>Se Connecter</h1>";

      if(isset($_SESSION['login']))
      {
        header('Location : viewGames.php');
      }
      else {
        if (isset($_POST['login']) && isset($_POST['passwrd'])) {
          $row = getUser($_POST['login']);
          if($row != -1)
          {
            if(!testMdp($_POST['passwrd'], $row[1]))
            {
              echo "Le mot de passe ne correspond pas au login saisi.";
            }
            else {
              session_start();
              $_SESSION['login'] = $row[0];
              $_SESSION['role'] = $row[3];
              header('Location: viewGames.php');
            }
          }
          else {
            echo "Le login saisi n'existe pas.";
          }
        }
      }
    ?>
    <form class="formConnect" action="" class="formulaires" method="post">
      <label for="login">Login : </label>
      <br>
      <input type="text" name="login" value="" required>
      <br>
      <label for="psswrd">Mot de passe : </label>
      <br>
      <input type="password" name="passwrd" value="" required>
      <br>
      <button type="submit" name="button" class="btn-formulaires">Se Connecter</button>
    </form>
  </body>
</html>
