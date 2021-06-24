<?php  
 $message = '';  
 $error = '';  
 
 if(isset($_POST["submit"]))  
 {  
    if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter an e-mail</label>";  
      }
    }
    ?> 
<!DOCTYPE HTML>
<html>  
<head>  
           <title></title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body style="background-color:rgb(192, 245, 232);">
      <br />  
           <div class="container" style="width:500px;">  
                <h3 align="">FORGOT PASSWORD</h3><br />

<form action="login.php" method="post">
<?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     
<br />


E-mail: <input type="text" name="email" class="form-control" /><br />
<button type="submit" value="fpass">Submit</button><br />
<?php  
                     if(isset($message))  
                     {  
                          echo $message;
                     }  
                     ?> 
</form>

</body>
</html>
