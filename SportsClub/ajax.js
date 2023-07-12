<<<<<<< HEAD
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();}
    function myFunction(xhttp) {
        document.getElementById("demo").innerHTML =
        xhttp.responseText;
      }
=======
function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("demo").innerHTML =
        this.responseText;
      }
    };
    xhttp.open("GET", "ajax_info.txt", true);
    xhttp.send();}
    function myFunction(xhttp) {
        document.getElementById("demo").innerHTML =
        xhttp.responseText;
      }
>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
