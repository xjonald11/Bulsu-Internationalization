<?php
    session_start();
    if($_SESSION['type']!='Students')
    {
        header('location:../Login/login.php');
        exit();
    }
    include '../connection.php'
?>
