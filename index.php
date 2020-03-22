<?php

  require("./View/View.php");
  require('./Controller/ControllerAccueil.php');

  $routes = [
    '/projetwebsse/' => [
      'controller' => 'ControllerAccueil',
      'action' => 'index'
    ],
    '/projetwebsse/home' => [
      'controller' => 'ControllerAccueil',
      'action' => 'index'
    ],
    '/projetwebsse/connect' => [
      'controller' => 'ControllerAccueil',
      'action' => 'connect'
    ],
    '/projetwebsse/register' => [
      'controller' => 'ControllerAccueil',
      'action' => 'register'
    ]
  ];

  $route = $routes[$_SERVER['REQUEST_URI']];
  // Initialisation du contrôleur
  $controller = new $route['controller']();
  // Appel de la méthode
  $test = $route['action'];
  $controller->$test();

  /*$found = false;
  foreach ($routes as $route) {
    if ($route['uri'] === $_SERVER['REQUEST_URI'] && $route['method'] === $method) {
      // Bonne méthode
      $found = true;
    }
  }
  if (!$found) {
    // Pas de route trouvée, on affiche une page d'erreur (404)
  }*/

 ?>
