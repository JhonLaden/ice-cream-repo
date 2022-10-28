<?php
    session_start();
    if(isset($_SESSION['logged-in'])){
        header('location: admin/dashboard.php');
    }else{
        header('location: login/login.php');
    }
?>  