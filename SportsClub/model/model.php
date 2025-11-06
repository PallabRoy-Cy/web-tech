<?php

require_once __DIR__ . '/../model/db_connect.php';

function updateProfile($id, $data){
    $conn = db_conn();

    $fields = ['`name` = ?', 'email = ?', 'username = ?', 'gender = ?', 'dateofbirth = ?'];
    $params = [$data['name'], $data['email'], $data['username'], $data['gender'], $data['dateofbirth']];

    if (isset($data['image']) && $data['image'] !== null && $data['image'] !== '') {
        $fields[] = '`image` = ?';
        $params[] = $data['image'];
    }
    $params[] = $id;

    $sql = "UPDATE member SET " . implode(', ', $fields) . " WHERE id = ?";
    try{
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $conn = null;
        return true;
    }catch(PDOException $e){
        $conn = null;
        return false;
    }
}

function updatePP($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE member set `image`=? where id = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['image'], $id
        ]);
    }catch(PDOException $e){
        // log error in production
    }
    
    $conn = null;
    return true;
}

function showProfile($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `member` where id = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        return null;
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row ?: null;
}

function showAllProfiles(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `member` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        return [];
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function showPass($id){
	$sql = "SELECT password FROM member WHERE id = :id";
    $conn = db_conn();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}
    
function changePass($id, $psw){
    $conn = db_conn();
    $sql = "UPDATE member SET password = :password WHERE id = :id";
    try{
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':password', $psw['cnfpsw']);
      $stmt->execute();
    } catch(PDOException $e){
        // log error in production
    }
    $conn = null;
    return true;
}

function showAdminPass($id){
	$sql = "SELECT password FROM member WHERE id = :id AND isAdmin = 1";
    $conn = db_conn();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function changeAdminPass($id, $psw){
    $conn = db_conn();
    $sql = "UPDATE member SET password = :password WHERE id = :id AND isAdmin = 1";
    try{
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':password', $psw['cnfpsw']);
      $stmt->execute();
    } catch(PDOException $e){
      // log error in production
    }
    $conn = null;
    return true;
}

?>
