<?php
session_start();
if($_SESSION['customerid']==""){
    header('location:../Guest/Login.php');
}
?>