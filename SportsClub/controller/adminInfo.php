<?php

function fetchAdminProfile($admin_id){
    require_once('../model/db_connect.php');
    $conn = db_conn();
    $sql = "SELECT * FROM member WHERE id = :admin_id AND isAdmin = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':admin_id', $admin_id);
    $stmt->execute();
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);
    return $profile ?: null;
}

?>
