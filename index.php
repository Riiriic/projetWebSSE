<?php

  require("./View/View.php");
  require_once('./Controller/ControllerAccueil.php');
  require_once('./Controller/ControllerConnect.php');
  require_once('./Controller/ControllerSignUp.php');
  require_once('./Controller/ControllerGames.php');
    require_once('./Controller/ControllerDisconnect.php');
  session_start();

  $routes = [
    'accueil1' => [
      'url' => "/projetwebsse/",
      'method' => 'GET',
      'controller' => 'ControllerAccueil',
      'action' => 'index'
    ],
    'accueil2' => [
      'url' => '/projetwebsse/home',
      'method' => 'GET',
      'controller' => 'ControllerAccueil',
      'action' => 'index'
    ],
    'connect' => [
      'url' => '/projetwebsse/connect',
      'method' => 'GET',
      'controller' => 'ControllerConnect',
      'action' => 'connect'
    ],
    'testConnect' => [
      'url' => '/projetwebsse/connect',
      'method' => 'POST',
      'controller' => 'ControllerConnect',
      'action' => 'test'
    ],
    'register' => [
      'url' => '/projetwebsse/register',
      'method' => 'GET',
      'controller' => 'ControllerSignUp',
      'action' => 'register'
    ],
    'testRegister' => [
      'url' => '/projetwebsse/register',
      'method' => 'POST',
      'controller' => 'ControllerSignUp',
      'action' => 'test'
    ],
    'games' => [
      'url' => '/projetwebsse/games',
      'method' => 'GET',
      'controller' => 'ControllerGames',
      'action' => 'hubGames'
    ],
    'disconnect' => [
      'url' => '/projetwebsse/disconnect',
      'method' => 'GET',
      'controller' => 'ControllerDisconnect',
      'action' => 'disconnect'
    ]
  ];

  $found = false;
  foreach ($routes as $route) {
    if ($route['url'] === $_SERVER['REQUEST_URI'] && $route['method'] === $_SERVER['REQUEST_METHOD']) {
      // Bonne route
      $found = true;
      $controller = new $route['controller']();
      // Appel de la méthode
      $action = $route['action'];
      echo $controller->$action();
    }
  }
  if (!$found) {
    // Pas de route trouvée, on affiche une page d'erreur (404)
  }

 ?>
