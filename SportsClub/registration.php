<?php  
session_start();
 $message = '';
 $error = '';
 $username=$psw=$password=$email=$image="";
 $unameErr=$pswErr=$cnfpswErr=$emailErr=$imageErr="";

require_once('model/db_connect.php');
 if(isset($_POST["submit"])) {

    if(empty($_POST["name"])) {
        $error = "<label class='text-danger'>Enter Name</label>";
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    }
    else {
        $email = trim($_POST['email']);
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            $email="";
        }
    }
    if (empty($_POST["username"])) {
        $unameErr = "Name is required";
    }
    else {
        $username = trim($_POST['username']);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' 0-9]*$/",$username)) {
            $unameErr = "alpha numeric characters, period,dash or underscore only";
            $username="";
            
        }if(str_word_count($username)<2)
        {
            $unameErr="Less then two Word";
            $username="";
            
        }
    }
    if (empty($_POST["psw"])) {
        $pswErr = "Password is required";
        
    }
    else {
        $psw = test_input($_POST["psw"]);
        // check if name only contains letters and whitespace
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$psw)) {
            $pswErr = "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
            $psw="";
            
        }
    }
    if (empty($_POST["password"])) {
        $cnfpswErr = "Confirm Password is required";
    }
    else {
        $password = trim($_POST['password']);
        $options = array("cost"=>4);
        $hashPassword = password_hash($password,PASSWORD_BCRYPT,$options);
        
        
        if($psw != $password){
            $cnfpswErr = "Password must match with the Retyped Password";
            $password="";
        }
    }

    if(empty($_POST["gender"]))  
    {
        $error = "<label class='text-danger'>Gender,Name,e-mail cannot be empty</label>";  
    }
    if ($_FILES["image"]["error"] != 0) {
        $imageErr = "file required";
    }
    else {
        $targetDir = "uploads/";
        $fileName = basename($_FILES['image']['name']);
        $file_tmp =$_FILES['image']['tmp_name'];
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        move_uploaded_file($file_tmp,$targetFilePath);
    }
    if (empty($error) && empty($emailErr) && empty($unameErr) && empty($pswErr) && empty($cnfpswErr) && empty($imageErr)) {

        $name = trim($_POST['name']);
        $gender = trim($_POST['gender']);
        $dob = trim($_POST['dob']);
        

        $conn = db_conn();
        $sql = 'select * from member where email = :email';
        $stmt = $conn->prepare($sql);
        $p = ['email'=>$email];
        $stmt->execute($p);
        
        if($stmt->rowCount() == 0)
        {
            $sql = "insert into member (name, username, email, password, gender, dateofbirth, image) values(:name,:username,:email,:pass,:gender,:dob,:image)";
        
            try{
                $handle = $conn->prepare($sql);
                $params = [
                    ':name'=>$name,
                    ':username'=>$username,
                    ':email'=>$email,
                    ':pass'=>$hashPassword,
                    ':gender'=>$gender,
                    ':dob'=>$dob,
                    ':image'=>$fileName
                ];
                
                $handle->execute($params);
                
                $success = 'User has been created successfully';
                
            }
            catch(PDOException $e){
                $errors[] = $e->getMessage();
            }
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
<div class="container">
    <div class="login-form"> <!-- Using login-form for consistent styling -->
        <h2>Registration</h2>
        <?php 
        if(isset($success))
        {
            
            echo '<div class="alert alert-success">'.$success.'</div>';
        }
        if(isset($error))
        {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }
        
        ?>

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">  
            <div class="form-group">
                <label for="name">Name</label>  
                <input type="text" name="name" class="form-control" value="<?php if(isset($name)) echo $name;?>" />
            </div>  
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email;?>">
                <span class="error">* <?php echo $emailErr;?></span>
            </div> 
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" name = "username" value="<?php echo $username;?>" class="form-control" />
                <span class="error">* <?php echo $unameErr;?></span>
            </div>
            <div class="form-group">
                <label for="psw">Password</label>
                <input type="password" name = "psw" value="<?php echo $psw;?>" class="form-control" />
                <span class="error">* <?php echo $pswErr;?></span>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" name = "password" value="<?php echo $password;?>" class="form-control" />
                <span class="error">* <?php echo $cnfpswErr;?></span>
            </div>
            <fieldset class="form-group">
    <legend>Gender</legend>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="male" name="gender" value="male"
            <?php if (isset($gender) && $gender === 'male') echo 'checked'; ?>>
        <label class="form-check-label" for="male">Male</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="female" name="gender" value="female"
            <?php if (isset($gender) && $gender === 'female') echo 'checked'; ?>>
        <label class="form-check-label" for="female">Female</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="radio" id="other" name="gender" value="other"
            <?php if (isset($gender) && $gender === 'other') echo 'checked'; ?>>
        <label class="form-check-label" for="other">Other</label>
    </div>
</fieldset>


            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" class="form-control" value="<?php if(isset($dob)) echo $dob;?>"> 
                <span class="error">* <?php if(isset($dobErr)) echo $dobErr;?></span>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" />
                <span class="error">* <?php echo $imageErr;?></span>
            </div>
            <button type="submit" name="submit" class="btn">Submit</button>                   
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
.alert-success{
    color: green;
}
.alert-danger{
    color: red;
}
.error{
    color: red;
}
</style>
<?php include 'footer.php'; ?>