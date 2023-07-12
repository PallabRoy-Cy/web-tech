<<<<<<< HEAD
<?php 

require_once '../model/model.php';

if (deleteProduct($_GET['id'])) {
    header('Location: ../showAllProducts.php');
}

=======
<?php 

require_once '../model/model.php';

if (deleteProduct($_GET['id'])) {
    header('Location: ../showAllProducts.php');
}

>>>>>>> 93537d5fd1bdedd9072bda08597969ef6c18cbd6
 ?>