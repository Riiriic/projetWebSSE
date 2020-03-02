<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/formulaires.css">
  </head>
  <body>
    <h1>Se connecter</h1>
    <form class="formConnect" action="viewGames.php" class="formulaires" method="post">
      <label for="login">Login : </label>
      <input type="text" name="login" value="" required>
      <br>
      <label for="psswrd">Mot de passe : </label>
      <input type="password" name="psswrd" value="" required>
      <br>
      <button type="submit" name="button" class="btn-formulaires">Se Connecter</button>
    </form>
  </body>
</html>
