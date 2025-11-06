<?php
require_once('../cors.php');
session_start();
require_once('../model/model.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $name = $data['name'] ?? '';
    $email = $data['email'] ?? '';
    $username = $data['username'] ?? '';
    $gender = $data['gender'] ?? '';
    $dob = $data['dob'] ?? '';

    $payload = [
        'name' => $name,
        'email' => $email,
        'username' => $username,
        'gender' => $gender,
        'dateofbirth' => $dob
    ];

    if(updateProfile($id, $payload)) {
        echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'error' => 'Failed to update profile']);
    }
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}
?>
