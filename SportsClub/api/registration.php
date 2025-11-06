<?php
require_once('../cors.php');
session_start();
require_once('../model/db_connect.php');

header('Content-Type: application/json');

$name = $_POST['name'] ?? '';
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$gender = $_POST['gender'] ?? '';
$dob = $_POST['dob'] ?? '';

$errors = [];

if ($name === '') { $errors[] = "Name is required"; }
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format"; }
if ($username === '') {
    $errors[] = "Username is required";
} else {
    if (!preg_match("/^[a-zA-Z-' 0-9]*$/", $username)) {
        $errors[] = "alpha numeric characters, period,dash or underscore only";
    } elseif (str_word_count($username) < 2) {
        $errors[] = "Username must be at least two words";
    }
}
if ($password === '' || !preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
    $errors[] = "Password must be at least 8 characters and include upper, lower, number and special character";
}
if ($gender === '') { $errors[] = "Gender is required"; }
if ($dob === '') { $errors[] = "Date of birth is required"; }

$fileName = null;
if (isset($_FILES['image'])) {
    $targetDir = "../uploads/";
    $origName = basename($_FILES['image']['name']);
    $fileType = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
    $allowTypes = ['jpg', 'png', 'jpeg', 'gif'];
    if (in_array($fileType, $allowTypes)) {
        $fileName = uniqid('IMG-', true) . '.' . $fileType;
        $targetFilePath = $targetDir . $fileName;
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            $errors[] = "Failed to upload image";
        }
    } else {
        $errors[] = "Only JPG, JPEG, PNG, GIF files are allowed";
    }
} else {
    $errors[] = "No image file selected";
}

if (empty($errors)) {
    $conn = db_conn();
    $sql = 'SELECT 1 FROM member WHERE email = :email LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['email' => $email]);

    if ($stmt->rowCount() == 0) {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);
        $sql = "INSERT INTO member (name, username, email, password, gender, dateofbirth, image) VALUES(:name,:username,:email,:pass,:gender,:dob,:image)";
        try {
            $handle = $conn->prepare($sql);
            $handle->execute([
                ':name' => $name,
                ':username' => $username,
                ':email' => $email,
                ':pass' => $hashPassword,
                ':gender' => $gender,
                ':dob' => $dob,
                ':image' => $fileName
            ]);
            echo json_encode(['success' => true, 'message' => 'User has been created successfully']);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'errors' => ['Server error creating user']]);
        }
    } else {
        http_response_code(409);
        echo json_encode(['success' => false, 'errors' => ['Email already exists']]);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'errors' => $errors]);
}
?>
