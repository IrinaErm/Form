<?php
    require_once 'connection.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fname = trim($_REQUEST['fname']);
        $name = trim($_REQUEST['name']);
        $lname = trim($_REQUEST['lname']);
        $gender = $_REQUEST['gender'];
        $email = trim($_REQUEST['email']);
        $experience = isset($_REQUEST['experience']) ? implode(" ", $_REQUEST['experience']) : '';
        $branch = trim($_REQUEST['city']);
        $filename = basename($_FILES["file"]["name"]);
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $info = trim($_REQUEST['info']);

        if(empty($fname) || empty($name) || empty($gender) || empty($email)) {
            echo 'empty';
        }
        else {
            $target_dir = "uploads/";
            $file_dir = isset($_FILES["file"]) && !empty($_FILES["file"]["name"]) ? uniqid("", true).'.'.$extension : '';

            $data = [
                'fname' => $fname,
                'name' => $name,
                'lname' => $lname,
                'gender' => $gender,
                'email' => $email,
                'experience' => $experience,
                'branch' => $branch,
                'file_name' => basename($_FILES["file"]["name"]),
                'file_path' => $file_dir,
                'info' => $info
            ]; 

            $sql = "INSERT INTO users_info (first_name, name, last_name, gender, email, experience, branch_city, file_name, file_path, info)
            VALUES (:fname, :name, :lname, :gender, :email, :experience, :branch, :file_name, :file_path, :info)";
            $stmt= $conn->prepare($sql);
            try {
                $stmt->execute($data);
                if($file_dir != '') {
                    move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$file_dir);               
                } 

                echo 'success';
            } catch(PDOException $e) {
                echo 'error';
            }
        }
              
    }

    