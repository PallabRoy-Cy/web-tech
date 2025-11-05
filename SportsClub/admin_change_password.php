<?php  
session_start();
require_once('model/model.php');
$cpsw=$npsw=$cnfpsw="";
$cpswErr=$npswErr=$cnfpswErr="";
$error="";
$message="";
require_once 'controller/profInfo.php';

$profile = fetchProfile($_SESSION['id']);

if(!isset($_SESSION['id']))
{
    header('location:login.php');
    exit();
}

function fetchPass($id){
	return showPass($id);
}

if(isset($_SESSION['id']))
{
    $pass = fetchPass($_SESSION['id']);
}


if (isset($_POST['changePass'])) {

  if (empty($_POST["cpsw"])) {
    $cpswErr = "Enter Current Password";
  } else {
    $cpsw = test_input($_POST["cpsw"]);
    if (!password_verify($_POST['cpsw'], $pass['password'])) {
      $cpswErr = "Invalid Current Password";
      $cpsw="";
    }
  }

  if (empty($_POST["npsw"])) {
    $npswErr = "Enter New Password";
  } else {
    $npsw = test_input($_POST["npsw"]);

    if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$npsw)) {
      $npswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
      $npsw="";
    }
    if (isset($_POST["cpsw"]) && password_verify($_POST['cpsw'], $pass['password']) && strcasecmp($npsw,test_input($_POST["cpsw"]))== 0) {
      $npswErr = "New Password should not be same as the Current Password";
      $npsw="";
    }
  }
  if (empty($_POST["cnfpsw"])) {
    $cnfpswErr = "Enter Confirm Password";
  } else {
    $cnfpsw = test_input($_POST["cnfpsw"]);
   if (strcasecmp($npsw,$cnfpsw) != 0) {
      $cnfpswErr = "New Password must match with the Retyped Password";
      $cnfpsw="";
    }
  }
  if(empty($cpswErr) && empty($npswErr) && empty($cnfpswErr)){

    
  $psw['cnfpsw'] = password_hash($_POST['cnfpsw'], PASSWORD_BCRYPT, ["cost" => 12]);

  if (changePass($_SESSION['id'], $psw)) {
  	$message = 'Successfully updated!!';
   
  } else {
    $error = 'Password Not Changed!!';
  }
}
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<?php include 'header.php'; ?>
<div class="dashboard-container">
    <div class="sidebar">
        <div class="profile-info">
            <img src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>">
            <h3><?php echo ucfirst($_SESSION['name']); ?></h3>
        </div>
        <nav class="dashboard-nav">
            <?php include 'adminmenu.php';?>
        </nav>
    </div>
  <main class="main-content">
        <h2>CHANGE ADMIN PASSWORD</h2>
        <?php
        if(!empty($error))
        {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        if(!empty($message))
        {
            echo '<div class="alert alert-success">'.$message.'</div>';
        }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-group">
                <label for="cpsw">Current Password:</label>
                <input type="password" name="cpsw" id="cpsw" value="<?php echo $cpsw;?>" class="form-control">
                <span class="error" style="color:red;"><?php echo $cpswErr;?></span>
            </div>
            <div class="form-group">
                <label for="npsw">New Password:</label>
                <input type="password" name="npsw" id="npsw" value="<?php echo $npsw;?>" class="form-control">
                <span class="error" style="color:red;"><?php echo $npswErr;?></span>
            </div>
            <div class="form-group">
                <label for="cnfpsw">Confirm Password:</label>
                <input value="<?php echo $cnfpsw ?>" type="password" id="cnfpsw" name="cnfpsw" class="form-control">
                <span class="error" style="color:red;"><?php echo $cnfpswErr;?></span>
            </div>
            <button type="submit" name="changePass" class="btn">Update</button>
        </form>
  </main>
</div>

<style>
.dashboard-container {
    display: flex;
}
.sidebar {
    width: 250px;
    background: #f4f4f4;
    padding: 1rem;
}
.profile-info {
    text-align: center;
    margin-bottom: 2rem;
}
.profile-info img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 1rem;
}
.dashboard-nav ul {
    list-style: none;
    padding: 0;
}
.dashboard-nav ul li a {
    display: block;
    padding: 10px 15px;
    color: #333;
    text-decoration: none;
}
.dashboard-nav ul li a:hover {
    background: #ddd;
}
.main-content {
    flex: 1;
    padding: 1rem;
}
.error{
    color: red;
}
</style>
<?php include 'footer.php'; ?>