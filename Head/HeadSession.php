<?php
   session_start();
   if(!isset($_SESSION['type']) || $_SESSION['type'] !== 'Head')
   {
       header('location:../Login/login.php');
       exit();
   }
   include '../connection.php';
?>

