<?php
session_start();
if($_SESSION['adminid']==""){
    header('location:../Guest/Login.php');
}
?>