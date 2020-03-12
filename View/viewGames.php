<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style/header.css">
    <link rel="stylesheet" href="style/main.css">
  </head>
  <body>
    <?php
    include("./header.php");
    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: index.php');
        exit;
    }
    ?>
    <center>
      <div id="listGames">
    <?php
    $parties = Simplexml_load_file('../bdd/parties.xml');
    foreach($parties->partie as $partie)
    {
      echo "<table class=\"tabPartie\">
      <thead>
      <th colspan=\"2\">
      Partie ".$partie['id']."
      </th>
      </thead><tbody>
      ";
      $participants = $partie->participants;
      foreach($participants->participant as $participant)
      {
        echo "<tr><td colspan=\"2\">".$participant."</td></tr>";
      }
      echo "<tr>
      <td>
      <button>Rejoindre</button>
      </td><td><button>
      Supprimer
      </button>
      </td>
      </tr>
      </tbody></table>";
    }

     ?>



      </div>
      <div id="Créer une partie">

      </div>
    </center>

    </script>
  </body>
</html>
