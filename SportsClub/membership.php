<<<<<<< HEAD
<html>
<style>
    .error {color: #FF0000;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
        <title>MemberShip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background-color:rgb(97, 105, 116);">
    <?php if (isset($success)): ?>
      <div class='success'><?php echo $success; ?></div>
    <?php else: ?>
      <?php if (isset($error)): ?>
        <div class='error'><?php echo $error; ?></div>
      <?php endif ?>       
      

 
<div class="content" style="width:60%;">
<h2 style="text-align:center">MemberShip</h2>
 
<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">$ 9.99 / year</li>
    <li class="grey">
 
        <form action="" method="POST" class="spacing">
        <input name="plan" type="hidden" value="Basic" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="9.99" />         
        <input name="currency" type="hidden" value="usd" />         
        <button type="button" style="color: green" >" Select"</button> 
      </form>
   
 
    </li>
  </ul>
</div>
 
<div class="columns">
  <ul class="price">
    <li class="header">Pro</li>
    <li class="grey">$ 24.99 / year</li>
    <div class="columns"> 
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">$ 49.99 / year</li>
    <li class="grey">
<form action="" method="POST" class="spacing">     
        <input name="plan" type="hidden" value="Premium" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="49.99" />         
        <input name="currency" type="hidden" value="usd" />  
        <button type="button" style="color: green" >" Select"</button> 
      </form>
    </li>
  </ul>
</div>
    </li>
  </ul>
</div>
 
  <?php endif ?>  
 
</div>
  </body>
=======
<html>
<style>
    .error {color: #FF0000;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
        <title>MemberShip</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background-color:rgb(97, 105, 116);">
    <?php if (isset($success)): ?>
      <div class='success'><?php echo $success; ?></div>
    <?php else: ?>
      <?php if (isset($error)): ?>
        <div class='error'><?php echo $error; ?></div>
      <?php endif ?>       
      

 
<div class="content" style="width:60%;">
<h2 style="text-align:center">MemberShip</h2>
 
<div class="columns">
  <ul class="price">
    <li class="header">Basic</li>
    <li class="grey">$ 9.99 / year</li>
    <li class="grey">
 
        <form action="" method="POST" class="spacing">
        <input name="plan" type="hidden" value="Basic" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="9.99" />         
        <input name="currency" type="hidden" value="usd" />         
        <button type="button" style="color: green" >" Select"</button> 
      </form>
   
 
    </li>
  </ul>
</div>
 
<div class="columns">
  <ul class="price">
    <li class="header">Pro</li>
    <li class="grey">$ 24.99 / year</li>
    <div class="columns"> 
  <ul class="price">
    <li class="header">Premium</li>
    <li class="grey">$ 49.99 / year</li>
    <li class="grey">
<form action="" method="POST" class="spacing">     
        <input name="plan" type="hidden" value="Premium" />         
        <input name="interval" type="hidden" value="year" />         
        <input name="price" type="hidden" value="49.99" />         
        <input name="currency" type="hidden" value="usd" />  
        <button type="button" style="color: green" >" Select"</button> 
      </form>
    </li>
  </ul>
</div>
    </li>
  </ul>
</div>
 
  <?php endif ?>  
 
</div>
  </body>
>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
</html>