<<<<<<< HEAD
<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:login.php");
	
}

else{
	header("location:login.php");
}

=======
<?php 

session_start();

if (isset($_SESSION['uname'])) {
	session_destroy();
	header("location:login.php");
	
}

else{
	header("location:login.php");
}

>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
 ?>