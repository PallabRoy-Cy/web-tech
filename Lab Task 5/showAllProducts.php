<<<<<<< HEAD
<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProducts();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<fieldset style="border: 5px solid #5eff00; width: 10px">
  			<legend style="background-color:rgb(6, 135, 255);">DISPLAY </legend>
<table>
	<thead>
		
		<tr>
			
			<th>Equipment</th>
			<th>Model</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
	
		<?php foreach ($products as $i => $product): ?>
			<tr>
			
				<td><a href="showProduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Equipment'] ?></a></td>
				<td><?php echo $product['Model'] ?></td>
				<td><?php echo $product['Quantity'] ?></td>
				<td><?php echo $product['Price'] ?></td>
				<td><a href="editProduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="deltProduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
				
			</tr>
		<?php endforeach; ?>
		
		

	</tbody>
	

</table>
</fieldset>

</body>
=======
<?php  
require_once 'controller/productInfo.php';

$products = fetchAllProducts();


    include "nav.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<fieldset style="border: 5px solid #5eff00; width: 10px">
  			<legend style="background-color:rgb(6, 135, 255);">DISPLAY </legend>
<table>
	<thead>
		
		<tr>
			
			<th>Equipment</th>
			<th>Model</th>
			<th>Quantity</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
	
		<?php foreach ($products as $i => $product): ?>
			<tr>
			
				<td><a href="showProduct.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Equipment'] ?></a></td>
				<td><?php echo $product['Model'] ?></td>
				<td><?php echo $product['Quantity'] ?></td>
				<td><?php echo $product['Price'] ?></td>
				<td><a href="editProduct.php?id=<?php echo $product['ID'] ?>">Edit</a>&nbsp<a href="deltProduct.php?id=<?php echo $product['ID'] ?>">Delete</a></td>
				
			</tr>
		<?php endforeach; ?>
		
		

	</tbody>
	

</table>
</fieldset>

</body>
>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
</html>