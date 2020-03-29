<?php
/**
 *
 */


class View
{

  public static function render($filename,$var=[]) {
    ob_start();
    if(count($var))
    {
      extract($var);
    }
    require "./View/view" . $filename . ".php";
    $content = ob_get_clean();
    return $content;
  }
}


 ?>
