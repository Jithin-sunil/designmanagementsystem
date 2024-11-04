<?php
session_start();
if($_SESSION['designerid']==""){
    header('location:../Guest/Login.php');
}
?>