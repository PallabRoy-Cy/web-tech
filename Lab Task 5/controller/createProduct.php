<<<<<<< HEAD
<?php
require_once '../model/model.php';

if (isset($_POST['addproduct'])) {
	$data['seqm'] = $_POST['seqm'];
	$data['model'] = $_POST['model'];
	$data['quantity'] = $_POST['quantity'];
	$data['price'] = $_POST['price'];

  if (addproduct($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

=======
<?php
require_once '../model/model.php';

if (isset($_POST['addproduct'])) {
	$data['seqm'] = $_POST['seqm'];
	$data['model'] = $_POST['model'];
	$data['quantity'] = $_POST['quantity'];
	$data['price'] = $_POST['price'];

  if (addproduct($data)) {
  	echo 'Successfully added!!';
  }
} else {
	echo 'You are not allowed to access this page.';
}

>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
?>