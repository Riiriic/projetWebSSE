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
    session_start();
    if(!isset($_SESSION['login'])){
        header('Location: viewConnect.php');
        exit;
    }
    else {
      include("./header.php");
      include("../Controller/controllerGames.php");
      $parties = getParties();
      echo "<center>
      <div id=\"listGames\">";
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

        if($_SESSION['role'] == "maitreJeu")
        {
          echo "<tr>
          <td>
          <button>Rejoindre</button>
          </td><td><button>
          Supprimer
          </button>
          </td>";
        }
        else {
          echo "<tr>
          <td colspan=\"2\">
          <button>Rejoindre</button>
          </td>";
        }
        echo " </tr>
          </tbody></table>";
      }
      echo "      </div>
            <div id=\"Créer une partie\">

            </div>
          </center>
";
    }
    ?>
  </body>
</html>
