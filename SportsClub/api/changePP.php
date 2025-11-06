<?php
require_once('../cors.php');
session_start();
require_once('../model/db_connect.php');

header('Content-Type: application/json');

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];

    if(isset($_FILES['image'])) {
        $targetDir = "../uploads/";
        $origName = basename($_FILES['image']['name']);
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if(in_array($ext, $allowTypes)) {
            $fileName = uniqid('IMG-', true) . '.' . $ext;
            $targetFilePath = $targetDir . $fileName;
            if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                $conn = db_conn();
                $sql = "UPDATE member SET image = :image WHERE id = :id";
                $handle = $conn->prepare($sql);
                $params = [':image' => $fileName, ':id' => $id];
                if($handle->execute($params)) {
                    echo json_encode(['success' => true, 'message' => 'Profile picture updated successfully', 'image' => $fileName]);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'error' => 'Failed to update profile picture in database']);
                }
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'error' => 'Failed to upload image']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'Only JPG, JPEG, PNG, GIF files are allowed']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'No image file selected']);
    }
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}
?>
