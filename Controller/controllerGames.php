<?php
  include('../Controller/loadXML.php');

  function getParties()
  {
    return load("parties.xml");
  }

?>
