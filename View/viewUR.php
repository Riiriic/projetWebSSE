<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="uxpin_pma.css">
  </head>
  <body>
  <div id="elt">
		 <div id= "morgue">
			  <p id="titre">UR</p>
        <!--bouton pour aller à la page UR-->
        <form action="viewUA.php" method="POST">
        <input type="submit" value="UA" class="btn_UR"/>
        </form>
        <!-- bouton pour aller à la page Psycho-->
			  <form action="viewPsycho.php" method="POST">
        <input type="submit" value="Psycho" class="btn_Psy"/>
        </form>
			  <div id="tableau">
				      <div id="icon-humain-1"></div>
				      <div id="icon-humain-2"></div>
				      <div id="icon-humain-3"></div>
				      <div id="carre-1"></div>
				      <div id="carre-2"></div>
				      <div id="carre-3"></div>
			</div>
		 </div>

  </div>
  </body>
</html>
