<<<<<<< HEAD
<?php  
 $message = '';  
 $error = '';  
 $uname=$psw=$cnfpsw="";
 $unameErr=$pswErr=$cnfpswErr="";
 if(isset($_POST["submit"]))  
 {  if(file_exists('data.json')) 
  {  
       $current_data = file_get_contents('data.json');  
       $array_data = json_decode($current_data, true);  
       $extra = array('img' =>  $_POST['fileToUpload']);
       $array_data[] = $extra;  
       $final_data = json_encode($array_data);  
       if(file_put_contents('data.json', $final_data))  
       {  
            $message = "<label class='text-success'>File Appended Success fully</p>";  
       }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<meta charset="utf-8">
	<title>Profile Picture</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:rgb(6, 197, 255);">	
<form action="upload.php" method="post" enctype="multipart/form-data">
  <img src="user.png" alt="PP" width="270" height="300"><br>
  <div class="form-row">
  <div>Choose Image file:</div>
  <div>
  <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  </div>
  <input type="submit" value="Submit" name="submit">
</form>

</body>
=======
<?php  
 $message = '';  
 $error = '';  
 $uname=$psw=$cnfpsw="";
 $unameErr=$pswErr=$cnfpswErr="";
 if(isset($_POST["submit"]))  
 {  if(file_exists('data.json')) 
  {  
       $current_data = file_get_contents('data.json');  
       $array_data = json_decode($current_data, true);  
       $extra = array('img' =>  $_POST['fileToUpload']);
       $array_data[] = $extra;  
       $final_data = json_encode($array_data);  
       if(file_put_contents('data.json', $final_data))  
       {  
            $message = "<label class='text-success'>File Appended Success fully</p>";  
       }
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
	<meta charset="utf-8">
	<title>Profile Picture</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="background-color:rgb(6, 197, 255);">	
<form action="upload.php" method="post" enctype="multipart/form-data">
  <img src="user.png" alt="PP" width="270" height="300"><br>
  <div class="form-row">
  <div>Choose Image file:</div>
  <div>
  <input type="file" name="fileToUpload" id="fileToUpload">
  </div>
  </div>
  <input type="submit" value="Submit" name="submit">
</form>

</body>
>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
</html>