<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/formulaires.css">
  </head>
  <body>
    <h1>Se Connecter</h1>
    <?php
    if(isset($_SESSION['error']))
    {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }
    else {
      echo "<form class=\"formConnect\" action=\"\" class=\"formulaires\" method=\"post\">
        <label for=\"login\">Login : </label>
        <br>
        <input type=\"text\" name=\"login\" value=\"\" required>
        <br>
        <label for=\"psswrd\">Mot de passe : </label>
        <br>
        <input type=\"password\" name=\"passwrd\" value=\"\" required>
        <br>
        <button type=\"submit\" name=\"button\" class=\"btn-formulaires\">Se Connecter</button>
      </form>";
    }
     ?>

  </body>
</html>
