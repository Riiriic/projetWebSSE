window.onload = init;

function init() {
  var connect = new XMLHttpRequest();
  connect.open("GET","../bdd/parties.xml", false);
  connect.setRequestHeader("Content-Type", "text/xml");
  connect.send(null);
  let div = document.getElementById("listGames");
  // Place the response in an XML document.
  var TheDocument = connect.responseXML;
  // Place the root node in an element.
  let games = TheDocument.childNodes[0];
  // Retrieve each customer in turn.
  for (var i = 0; i < games.children.length; i++)
  {
    let table = document.createElement("TABLE");
    let header = table.createTHead();
    let rowH = header.insertRow(0);
    let cellH = rowH.insertCell(0);
    var game = games.children[i];
    // Access each of the data values.
    var date = game.getElementsByTagName("date");
    var nb = i+1;
    cellH.innerHTML = "Partie "+nb+" : "+date[0].textContent.toString();
    let participants = game.getElementsByTagName("participants");

      for(var j=0; j<participants[0].children.length; j++)
      {
        var nb2 = j+1;
        let row = table.insertRow();
        let cell = row.insertCell();
        cell.innerHTML = "Joueur " + nb2 + " : " + participants[0].children[j].textContent.toString();
      }

    /*// Write the data to the page.
    document.write("<tr><td>");
    document.write(Name[0].textContent.toString());
    document.write("</td><td>");
    document.write(Age[0].textContent.toString());
    document.write("</td><td>");
    document.write(Color[0].textContent.toString());
    document.write("</td></tr>");*/
    div.appendChild(table);
  }
}
