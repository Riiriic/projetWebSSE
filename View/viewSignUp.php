<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>S'inscrire</h1>
    <form class="formRegister" action="viewGames.php" method="post">
      <label for="login">Login</label>
      <input type="text" name="login" value="" required>
      <br>
      <label for="passwrd">Mot de passe : </label>
      <input type="password" name="passwrd" value="" required>
      <br>
      <label for="passwrdConfirm">Confirmez le mot de passe : </label>
      <input type="password" name="passwrdConfirm" value="" required>
      <br>
      <label for="mail">E-mail</label>
      <input type="email" name="mail" value="" required>
      <br>
      <button type="submit" name="btnRegister">S'inscrire</button>
    </form>
  </body>
</html>
