<?php

$conn = new mysqli('127.0.0.1','root','','vs');

   session_start();
   
   $user_check = $_SESSION['admin'];
   
   $ses_sql = mysqli_query($conn,"select user from admin where user = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user'];
   
   if(!isset($_SESSION['admin'])){
      header("location:admin.php");
   }
?>