<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'connection.php';
        session_start();

        $email = trim($_REQUEST['email']);
        $password = trim($_REQUEST['password']);

        if(empty($email) || empty($password)) {
            unset($_SESSION['auth']);
            header("Location: ../login.php?auth=false");
        }
        else {       
            $data = [
                'email' => $email,
            ]; 

            $sql = "SELECT * FROM admins where email=:email";
            $stmt= $conn->prepare($sql);
            $stmt->execute($data);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($password, $user['pass'])) {
                $_SESSION['auth'] = true;
                header("Location: ../info.php");
            }
            else if (!password_verify($password, $user['pass'])) {
                unset($_SESSION['auth']);
                header("Location: ../login.php?auth=false");
            } 
            else {
                unset($_SESSION['auth']);
                header("Location: ../login.php");
            }
        }
    }
    else {
        header("Location: ../login.php");
    }
    
  