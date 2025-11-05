<?php
session_start();
$message = '';
$error = '';
$unameErr=$pswErr="";
require_once('model/db_connect.php');
if(isset($_POST['submit']))
{
	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST["remember"])&& ($_POST['framework'])=="2" )
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		setcookie ("email",$_POST['email'],time()+ 10);
        setcookie ("password",$_POST['password'],time()+ 10);

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
					$_SESSION['usertype'] = 'user';
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
		$errors[] = "Email ,Password and User are required";	
		setcookie("email","");
        setcookie("password","");
        echo "Cookies Not Set. I will forget you !!!!";
	}

	if(isset($_POST['email'],$_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST["remember"])&& ($_POST['framework'])=="1" )
	{
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		setcookie ("email",$_POST['email'],time()+ 10);
        setcookie ("password",$_POST['password'],time()+ 10);

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
					$_SESSION['usertype'] = 'admin';
					header('location:admindashboard.php');
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
		$errors[] = "Email ,Password and User are required";	
		setcookie("email","");
        setcookie("password","");
        echo "Cookies Not Set. I will forget you !!!!";
	}
	
}
?>
<?php include 'header.php'; ?>
<div class="container">
    <div class="login-form">
        <h2>Login</h2>
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
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" class="form-control">
                <span class="error">* <?php echo $unameErr;?></span>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="form-control">
                <span class="error">* <?php echo $pswErr;?></span>
            </div>
            <div class="form-group">
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>
            <div class="form-group">
                <select name="framework" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>
            <span class="password"><a href="fpass.php">Forgot password?</a></span>
        </form>
    </div>
</div>
<style>
.login-form {
    max-width: 500px;
    margin: 2rem auto;
    padding: 2rem;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
}
.alert-danger{
    color: red;
}
</style>
<?php include 'footer.php'; ?>