<?php 
include_once '../libs/library.php'; 
include_once '../libs/config.php';
$message = '';

// users 
if(isset($_POST['delete_user'])){
    $userid = $_POST['del_id'];

    $sql = "DELETE FROM `users` WHERE `id`='".$userid."';";
    try {
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $message = "Record deleted successfuly";
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}

if (isset($_POST['add_user'])) {
    $username = $_POST['name'];
    $email = $_POST['mail'];
    $gender = $_POST['gender'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    $sql = "INSERT INTO `users` (`name`, `email`, `password`, `role_id`, `gender`) VALUES('".$username."', '".$email."', '".$password."', '".$role."', '".$gender."');";
    
    try {
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $message = "Record added successfuly";
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}
if (isset($_POST['update_user'])) {
    $tagid = $_POST['update_user'];
    $username = $_POST['name'];
    $email = ($_POST['mail'] == '') ? "example@mail.com": $_POST['mail'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `name`='".$username."', `email`='".$email."', `password`='".$password."', `role_id`='".$role."' WHERE `users`.`id`='".$tagid."';";

    try {
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $message = "Record Updated successfuly";
           message("Record Updated successfuly");
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}



/**
 * @method Model/Permission Permission
 */

 if (isset($_POST['add_permission'])) {
    $name = $_POST['permission'];

    $sql = "INSERT INTO `permissions` (`permission`) VALUES('".$name."');";
    
    try {
        $query = mysqli_query($conn, $sql);
        if ($query) {
           $message = "Record on permission added successfuly";
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
 }