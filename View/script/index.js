function changeContent() {
  let div = document.getElementById('test');
  let content = "<table id=\"testTableau\"><tr><th>Se connecter</th><th>S'inscrire</th></tr><tr><td><form class=\"formConnect\" action=\"viewGames.php\" method=\"post\"><label for=\"login\">Login : </label><input type=\"text\" name=\"login\" value=\"\" required><br /><label for=\"psswrd\">Mot de passe : </label><input type=\"password\" name=\"psswrd\" value=\"\" required><br /><button type=\"submit\" name=\"button\" class=\"btn-formulaires\">Se Connecter</button></form></td><td><form class=\"formRegister\" action=\"viewGames.php\" method=\"post\"><label for=\"login\">Login : </label><input type=\"text\" name=\"login\" required><br><label for=\"passwrd\">Mot de passe : </label><input type=\"password\" name=\"passwrd\" required><br><label for=\"passwrdConfirm\">Confirmez le mot de passe : </label><input type=\"password\" name=\"passwrdConfirm\" required><br><label for=\"mail\">E-mail</label><input type=\"email\" name=\"mail\" required><br><button type=\"submit\" name=\"btnRegister\" class=\"btn-formulaires\">S'inscrire</button></form></td></tr></table>";
  fade(div, content);
}

function prompt(element){
  var op = 0.1;  // initial opacity
  var timer = setInterval(function () {
      if (op >= 1){
          clearInterval(timer);
      }
      element.style.opacity = op;
      element.style.filter = 'alpha(opacity=' + op * 100 + ")";
      op += op ;
  }, 50);
}

function fade(element, content) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.innerHTML = content;
            prompt(element);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 50);
}
