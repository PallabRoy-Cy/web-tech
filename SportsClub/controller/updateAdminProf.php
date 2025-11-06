<?php
session_start();
require_once('../model/db_connect.php');

$conn = db_conn();

if (isset($_POST['updateProfile'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $sql = "UPDATE member SET name = :name, email = :email, username = :username WHERE id = :id AND isAdmin = 1";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        $_SESSION['name'] = $name;
        header('Location: ../admin_view_profile.php?success=Profile updated successfully');
        exit();
    } catch (PDOException $e) {
        header('Location: ../admin_edit_profile.php?error=Error updating profile');
        exit();
    }
}

header('Location: ../admin_edit_profile.php');
exit();
?>
