<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/main.css">
    <title></title>
  </head>
  <body>
    <?php
      include("../bdd/connexion.php");
     ?>
     <?php
       if(isset($_POST['login']) && isset($_POST['passwrd']))
       {
         $stm = $dbh->prepare("SELECT * FROM UTILISATEURS WHERE LOGIN=:login");
         $stm->bindParam(':login', $login);
         $login = $_POST['login'];
         if($stm->execute()>0)
         {
           $row = $stm->fetch();
           if($row[1]!=$_POST['passwrd'])
           {
             echo "<script>alert(\"Mot de passe incorrect\")</script>";
           }
           else {
             header('Location: viewGames.php');
             session
           }
         }
       }
       else {
         echo "non";
       }
      ?>
    <h1 id="mainTitle">Bienvenue sur la simulation du plan ORSEC NOVI</h1>
    <div id="test">
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
      <button type="button" name="buttonPlay" id="btn-play" onclick="changeContent()">Jouer</button>
    </div>

    <script type="text/javascript" src="script/index.js"></script>
  </body>
</html>
