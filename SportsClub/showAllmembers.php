<?php  
require_once 'controller/profInfo.php';

$profiles = fetchAllProfiles();


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="style.css">
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body style="background-color:rgb(97, 105, 116)";>
<div class="header">
    <div class="col-3 col-s-12">
    <div class="menu">
      <?php include 'menu.php';?>
      </div>
</div>
           <br /> 
           <h1>View All Profile</h1>
		   </div>
<br />
<table>
	<thead> 
		<tr>
        <th>Name</th> 
		<th>Username</th>
		<th>Email</th>
		<th>Gender</th>
		<th>Date of Birth</th>
		<th>Image</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($profiles as $i => $profile): ?>
			<tr>
				<td><a href="viewprof.php?id=<?php echo $profile['id'] ?>"><?php echo $profile['name'] ?></a></td>
				<td><?php echo $profile['username'] ?></td>
		        <td><?php echo $profile['email'] ?></td>
		        <td><?php echo $profile['gender'] ?></td>
		        <td><?php echo $profile['dateofbirth'] ?></td>
				<td><img width="100" height="100" src="uploads/<?php echo $profile['image'] ?>" alt="<?php echo $profile['name'] ?>"></td>
				<td><a href="editprof.php?id=<?php echo $profile['id'] ?>">Edit</a>&nbsp<a href="controller/deleteProfile.php?id=<?php echo $profile['id'] ?>" onclick="return confirm('Are you sure want to delete this ?')">Delete</a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table><div class="pofmenu">
<?php include 'promenu.php';?>
</div>
<div class="footer">
    <footer style="text-align: center">&copy; Copyright 2021</footer>
</div>



</body>
</html>