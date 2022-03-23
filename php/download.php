<?php
    if(isset($_GET['file'])) {
        $filename = basename($_GET['file']);
        $name = $_GET['name'];
        $file = $_SERVER['DOCUMENT_ROOT'].'/php/uploads/'.$filename;

        if (!file_exists($file)) { 
            die('Файл '.$file.' не найден.');
        } else {
            header('Content-Disposition: attachment; filename=' . $name);  
            readfile($file); 
            exit;
        }
    }
    