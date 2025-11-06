<?php
require_once('../cors.php');
session_start();
require_once('../model/db_connect.php');

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'] ?? null;
$password = $data['password'] ?? null;

if(isset($email, $password) && !empty($email) && !empty($password)) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $conn = db_conn();
        $sql = "SELECT * FROM member WHERE email = :email LIMIT 1";
        $handle = $conn->prepare($sql);
        $handle->execute(['email' => $email]);

        if($row = $handle->fetch(PDO::FETCH_ASSOC)) {
            if(password_verify($password, $row['password'])) {
                // Build a safe user payload
                $user = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'gender' => $row['gender'] ?? null,
                    'dateofbirth' => $row['dateofbirth'] ?? null,
                    'image' => $row['image'] ?? null,
                    'usertype' => (!empty($row['isAdmin']) && (int)$row['isAdmin'] === 1) ? 'admin' : 'user'
                ];

                // Minimal session
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['usertype'] = $user['usertype'];

                echo json_encode(['success' => true, 'user' => $user]);
            } else {
                http_response_code(401);
                echo json_encode(['success' => false, 'error' => 'Wrong Email or Password']);
            }
        } else {
            http_response_code(401);
            echo json_encode(['success' => false, 'error' => 'Wrong Email or Password']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'error' => 'Email address is not valid']);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Email and Password are required']);
}
?>
