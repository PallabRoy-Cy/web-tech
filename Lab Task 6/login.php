<?php
session_start();
$message = '';
$error = '';
$unameErr=$pswErr="";
// $username="";

require_once('model/db_connect.php');


if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
 
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
     		$conn=db_conn();
			$sql = "select * from member where email = :email";
			$handle = $conn->prepare($sql);
			$params = ['email'=>$email];
			$handle->execute($params);
			if($handle->rowCount() > 0)
			{
				$getRow = $handle->fetch(PDO::FETCH_ASSOC);
				if(password_verify($password, $getRow['password']))
				{
					unset($getRow['password']);
					$_SESSION = $getRow;
					header('location:dashboard.php');
					exit();
				}
				else
				{
					$errors[] = "Wrong Email or Password";
				}
			}
			else
			{
				$errors[] = "Wrong Email or Password";
			}
			
		}
		else
		{
			$errors[] = "Email address is not valid";	
		}
 
	}
	else
	{
		$errors[] = "Email and Password are required";	
	}
 
}
?>

<!DOCTYPE html>
<html>
    <head>
    <style>
    .error {color: #FF0000;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
        <title>LOGIN</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body style="background-color:rgb(97, 105, 116);">
<div class="menu">
      <?php include 'menu.php';?>
      </div>
<br />
<!-- <div class="menu">
	<?php include 'promenu.php';?>
</div> -->
<br />
<div class="container" style="width:500px;">
<p><span class="error">* required field</span></p>
<?php 
	if(isset($errors) && count($errors) > 0)
		{
			foreach($errors as $error_msg)
			{
				echo '<div class="alert alert-danger">'.$error_msg.'</div>';
			}
		}
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

<br />
<fieldset>
<legend>Login</legend>
  <label for="email">Email:</label><br>
  <input type="text" id="email" name="email" class="form-control"><br />
  <span class="error">* <?php echo $unameErr;?></span><br>
  <label for="username">Password:</label><br>
  <input type="password" id="password" name="password" class="form-control"><br />
  <span class="error">* <?php echo $pswErr;?></span><br>
  <label>
    <input type="checkbox" checked="checked" name="remember"> Remember me<br />
  </label><br>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <span class="password"><a href="fpass.php">Forgot password?</a></span><br />
   
</fieldset>
<?php  
  if(isset($msg))  
   {  
     echo $msg;
    }  
?> 
</form>
</div> <br />  
</body>
</html>