<?php
    session_start();
    if($_SESSION['type']!='Clerk')
    {
        header('location:../Login/login.php');
        exit();
    }
    include '../connection.php'
?>
