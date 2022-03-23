<?php
    require_once 'connection.php';
    session_start();

    unset($_SESSION['auth']);
    header("Location: ../index.html");  