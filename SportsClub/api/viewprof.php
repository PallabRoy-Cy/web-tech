<?php
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Credentials: true");
require_once('../cors.php');
session_start();
require_once('../model/db_connect.php');
require_once('../controller/profInfo.php');

header('Content-Type: application/json');

if(isset($_SESSION['id'])) {
    $profile = fetchProfile($_SESSION['id']);
    if($profile) {
        echo json_encode(['success' => true, 'profile' => $profile]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Profile not found']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}
?>