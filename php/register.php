<?php
    require_once 'connection.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_REQUEST['name']);
        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if(empty($name) || empty($email) || empty($password)) {
            echo 'empty';
        }
        else {
            $password = password_hash($password,PASSWORD_BCRYPT);
            $data = [
                'name' => $name,
                'email' => $email,
                'pass' => $password
            ]; 
    
            $sql = "INSERT INTO admins (name, email, pass) VALUES (:name, :email, :pass)";
            $stmt= $conn->prepare($sql);
            try {
                $stmt->execute($data);
                echo 'success';
            } catch(PDOException $e) {
                echo 'error';
            }
        }             
    }
    else {
        header("Location: ../regist.php");
    }