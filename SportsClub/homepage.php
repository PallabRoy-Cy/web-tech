<<<<<<< HEAD
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="style.css">
    <title>Sports Club</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  </head>
  <body style="background-color: rgb(97, 105, 116)">
  <!-- <p id="demo">Let AJAX change this text.</p> -->
  <!-- <button type="button" onclick="loadDoc()">Change Content</button> -->

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}
</script>
    <div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      
      </div>
      <p id="demo"></p>
</div>
      <a href="homepage.php"><img src="splogo.png" alt="logo" class="img" width="250px" height="100px"></a>
      <h1 align="" style="text-align: center" class="aside">Welcome To Sports Club!</h1>
    </div>
    <div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>
  </body>
=======
<!DOCTYPE html> 
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <link rel="stylesheet" href="style.css">
    <title>Sports Club</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  </head>
  <body style="background-color: rgb(97, 105, 116)">
  <!-- <p id="demo">Let AJAX change this text.</p> -->
  <!-- <button type="button" onclick="loadDoc()">Change Content</button> -->

<script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}
</script>
    <div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      
      </div>
      <p id="demo"></p>
</div>
      <a href="homepage.php"><img src="splogo.png" alt="logo" class="img" width="250px" height="100px"></a>
      <h1 align="" style="text-align: center" class="aside">Welcome To Sports Club!</h1>
    </div>
    <div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>
  </body>
>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
</html>