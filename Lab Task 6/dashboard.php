<?php 
    session_start();
  
    if(!$_SESSION['id']){
        header('location:login.php');
    }
 
?>
 <!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:rgb(97, 105, 116);">  
<div class="menu">
      <?php include 'menu.php';?>
      </div>
           <br />  
<h1>Account</h1>

<div class="container mt-4">
<h1>Welcome <?php echo ucfirst($_SESSION['name']); ?></h1>
<hr>
</div>
	

<div class="menu">
<?php include 'promenu.php';?>
</div>


</body>
</html>