<?php
session_start();
if(!empty($_SESSION)){
    if ($_SESSION['role'] == 'admin') {
        header('location:dashboard.php');
    }else {
        header('location:../403.php');
        var_dump($_SESSION);
    }
}else {
    header('location:../index.php');
}

?>