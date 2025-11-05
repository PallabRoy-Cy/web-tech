<?php
session_start();
require '../db_conn.php';

if (isset($_POST['updatePP'])) {
    $id = $_POST['id'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newImageName = uniqid('IMG-', true) . '.' . $imageExtension;
        $imageDestination = '../uploads/' . $newImageName;

        // Move the uploaded image to the destination directory
        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            // Update the database with the new image name
            $sql = "UPDATE members SET image = :image WHERE id = :id AND isAdmin = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':image', $newImageName);
            $stmt->bindParam(':id', $id);

            try {
                $stmt->execute();
                $_SESSION['image'] = $newImageName; // Update session
                header('Location: ../admin_change_pp.php?success=Profile picture updated successfully');
                exit();
            } catch (PDOException $e) {
                header('Location: ../admin_change_pp.php?error=Error updating profile picture: ' . $e->getMessage());
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

header('Location: ../admin_change_pp.php'); // Redirect if accessed directly
exit();
?>