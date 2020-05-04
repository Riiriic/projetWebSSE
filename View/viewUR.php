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
        <!--bouton pour aller à la page UA-->
        <form action="viewUA.php" method="POST">
        <input type="submit" value="UA" class="btn_UR"/>
        </form>
        <!-- bouton pour aller à la page Psycho-->
			  <form action="viewPsycho.php" method="POST">
        <input type="submit" value="Psycho" class="btn_Psy"/>
        </form>
			  <div id="tableau">
				    <div id="icon-humain-1">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
				    <div id="icon-humain-2">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
				    <div id="icon-humain-3">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
				    <div id="carre-1">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
				    <div id="carre-2">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
				    <div id="carre-3">
                <div id="myProgress">
                    <div id="myBar">
                    </div>
                </div>
            </div>
			   </div>
		 </div>
  </div>
<!--bouton de progression script:https://www.w3schools.com/howto/tryit.asp?filename=tryhow_js_progressbar_3-->
<button onclick="move()">Click Me</button>

<script>
var i = 0;
function move() {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
      }
    }
  }
}
</script>
  </body>
</html>
