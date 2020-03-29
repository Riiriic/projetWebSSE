<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="./View/style/header.css">
    <link rel="stylesheet" href="./View/style/main.css">

  </head>
  <body>
    <?php
      include("./View/header.php");
      foreach($var['datas'] as $key => $game)
      {
        echo "<table class=\"tabPartie\"><thead>
        <tr>
        <th colspan=\"2\">";
        echo $game->getId();
        echo"</th>
        </tr>
        </thead>";
        echo "<tbody><tr>
        <td colspan=\"2\">".count($game->getJoueurs())."/6
        </td>
        </tr><tr>
        <td>
        <button ";
        if(in_array($_SESSION['login'],$game->getJoueurs()) || count($game->getJoueurs()) == 6 || $_SESSION['inGame'])
        {
          echo "disabled";
        }
        echo ">Rejoindre</button></td>
        <td><button ";
        if(!in_array($_SESSION['login'], $game->getJoueurs()) || $game->getEtat() == "enCours")
        {
          echo "disabled";
        }
        echo ">Quitter</button>
        </td>
        </tr>";
        $i = 1;
        foreach($game->getJoueurs() as $role => $player){
          echo "<tr id=\"j".$i."\">
          <td>";
          echo $role;
          echo "</td><td>".$player."
          </td>
          </tr>";
          $i++;
        }
        echo "</tbody>
        </table>";
      }
    ?>
  </body>
</html>
