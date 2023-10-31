<?php
    session_start();
    if($_SESSION['type']!='Director')
    {
        header('location:../Login/login.php');
        exit();
    }
    include '../connection.php'
?>
