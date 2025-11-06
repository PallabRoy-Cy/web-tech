<?php
session_start();
require_once('../model/db_connect.php');

$conn = db_conn();

if (isset($_POST['updatePP'])) {
    $id = $_POST['id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid('IMG-', true) . '.' . $imageExtension;
        $imageDestination = '../uploads/' . $newImageName;

        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            $sql = "UPDATE member SET image = :image WHERE id = :id AND isAdmin = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image', $newImageName);
            $stmt->bindParam(':id', $id);

            try {
                $stmt->execute();
                $_SESSION['image'] = $newImageName;
                header('Location: ../admin_change_pp.php?success=Profile picture updated successfully');
                exit();
            } catch (PDOException $e) {
                header('Location: ../admin_change_pp.php?error=Error updating profile picture');
                exit();
            }
        } else {
            header('Location: ../admin_change_pp.php?error=Error moving uploaded file.');
            exit();
        }
    } else {
        header('Location: ../admin_change_pp.php?error=Please select an image to upload.');
        exit();
    }
}

header('Location: ../admin_change_pp.php');
exit();
?>
