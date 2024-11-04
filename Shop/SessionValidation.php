<?php
session_start();
if($_SESSION['shopid']==""){
    header('location:../Guest/Login.php');
}
?>