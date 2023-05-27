<?php
include '../libs/config.php';

session_start();
$session = $_SESSION['id'];
$str = "UPDATE `logs` SET `logout`=CURRENT_TIMESTAMP WHERE `session`='$session';";
$go = mysqli_query($conn, $str);

session_unset();
session_destroy();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('location:'.$_SERVER["REMOTE_ADDR"]."/handshake/");
}
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

var_dump($_SESSION);
header('location:../index.php');

?>