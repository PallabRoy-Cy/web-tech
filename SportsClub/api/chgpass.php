<?php
require_once('../cors.php');
session_start();
require_once('../model/model.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $cpsw = $data['cpsw'] ?? '';
    $npsw = $data['npsw'] ?? '';
    $cnfpsw = $data['cnfpsw'] ?? '';

    $pass = showPass($id);

    if($pass && password_verify($cpsw, $pass['password'])) {
        if($npsw === $cnfpsw) {
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $npsw)) {
                http_response_code(400);
                echo json_encode(['success' => false, 'error' => 'Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.']);
            } else {
                $psw = ['cnfpsw' => password_hash($cnfpsw, PASSWORD_BCRYPT, ["cost" => 12])];
                if(changePass($id, $psw)) {
                    echo json_encode(['success' => true, 'message' => 'Password changed successfully']);
                } else {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'error' => 'Failed to change password']);
                }
            }
        } else {
            http_response_code(400);
            echo json_encode(['success' => false, 'error' => 'New password and confirm password do not match']);
        }
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'error' => 'Incorrect current password']);
    }
} else {
    http_response_code(401);
    echo json_encode(['success' => false, 'error' => 'User not logged in']);
}
?>
