<?php
// session_start();
include_once '../libs/config.php';
include_once '../libs/library.php';
$message = '';

// users 
if (isset($_POST['delete_user'])) {
    if(can('delete_users', $_SESSION['permissions'])){
        $userid = $_POST['del_id'];
        $permi = getPermiId('delete_users', $conn);
        $sessid = getSessId($_SESSION['id'], $conn);


        $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('".$sessid."', '".$permi."');";
        // echo $actlog;

        $sql = "DELETE FROM `users` WHERE `id`='" . $userid . "';";
        try {
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $message = "Record deleted successfuly";
                mysqli_query($conn, $actlog);
            }
        } catch (\Exception $d) {
            $message = $d->getMessage();
        }
    }
   
}

if (isset($_POST['add_user'])) {
    if(can('create_users', $_SESSION['permissions'])){
        $userid = $_POST['del_id'];
        $permi = getPermiId('create_users', $conn);
        $sessid = getSessId($_SESSION['id'], $conn);


        $actlog = "INSERT INTO `activity_log` (`log_id`, `permission_id`) VALUES('".$sessid."', '".$permi."');";
            
        $username = $_POST['name'];
        $email = $_POST['mail'];
        $gender = $_POST['gender'];
        $password = md5($_POST['password']);
        $role = $_POST['role'];

        $sql = "INSERT INTO `users` (`name`, `email`, `password`, `role_id`, `gender`) VALUES('" . $username . "', '" . $email . "', '" . $password . "', '" . $role . "', '" . $gender . "');";

        try {
            $query = mysqli_query($conn, $sql);
            if ($query) {
                $message = "Record added successfuly";
                mysqli_query($conn, $actlog);
            }
        } catch (\Exception $d) {
            $message = $d->getMessage();
        }
    }
}

if (isset($_POST['update_user'])) {
    $tagid = $_POST['update_user'];
    $username = $_POST['name'];
    $email = ($_POST['mail'] == '') ? "example@mail.com" : $_POST['mail'];
    $password = ($_POST['password'] == '')?$_POST['oldpas']:$_POST['password'];
    $role = $_POST['role'];

    $sql = "UPDATE `users` SET `name`='" . $username . "', `email`='" . $email . "', `password`='" . $password . "', `role_id`='" . $role . "' WHERE `users`.`id`='" . $tagid . "';";

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

    $sql = "INSERT INTO `permissions` (`permission`) VALUES('" . $name . "');";

    try {
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $message = "Record on permission added successfuly";
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}


//  roles
if (isset($_POST['add_role'])) {
    extract($_POST);

    $name = $_POST['name'];
    $selectedPermissions = array_keys($_POST);

    $sql = "INSERT INTO `roles` (`name`) VALUES('" . $name . "');";
    try {
        $query = mysqli_query($conn, $sql);

        $roleId = mysqli_insert_id($conn);

        // Insert role-permission mappings into role_permission table
        foreach ($selectedPermissions as $permissionId) {
            if ($permissionId !== 'name' && $permissionId !== 'add_role') {
                $trig = "SELECT `id` FROM `permissions` WHERE `permission`='" . $permissionId . "';";
                $que = mysqli_query($conn, $trig);
                $res = mysqli_fetch_assoc($que);
                $insertRolePermissionQuery = "INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES ('$roleId', '" . $res['id'] . "')";
                mysqli_query($conn, $insertRolePermissionQuery);
            }
        }
        if ($query) {
            $message = "Record on roles added successfuly";
        }
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}


if (isset($_POST['update_role'])) {
    extract($_POST);

    $roleId = $_POST['update_role'];
    $name = $_POST['name'];
    $selectedPermissions = array_keys($_POST);

    $sql = "UPDATE `roles` SET `name` = '$name' WHERE `id` = '$roleId';";
    try {
        $query = mysqli_query($conn, $sql);

        // Remove existing role-permission mappings for the role
        $deleteRolePermissionsQuery = "DELETE FROM `role_permission` WHERE `role_id` = '$roleId';";
        mysqli_query($conn, $deleteRolePermissionsQuery);

        // Insert updated role-permission mappings into role_permission table
        foreach ($selectedPermissions as $permissionId) {
            if ($permissionId !== 'name' && $permissionId !== 'update_role') {
                $trig = "SELECT `id` FROM `permissions` WHERE `permission`='" . $permissionId . "';";
                $que = mysqli_query($conn, $trig);
                $res = mysqli_fetch_assoc($que);
                $insertRolePermissionQuery = "INSERT INTO `role_permission` (`role_id`, `permission_id`) VALUES ('$roleId', '" . $res['id'] . "')";
                mysqli_query($conn, $insertRolePermissionQuery);
            }
        }

        $message = "Role updated successfully";
    } catch (\Exception $d) {
        $message = $d->getMessage();
    }
}

if (isset($_POST['delete_role'])) {
    $roleId = $_POST['delete_role'];

    try {
        // Remove role-permission mappings for the deleted role
        $deleteRolePermissionsQuery = "DELETE FROM `role_permission` WHERE `role_id` = '$roleId';";
        $es = mysqli_query($conn, $deleteRolePermissionsQuery);
        if ($es) {
            // Delete role from roles table
            $deleteRoleQuery = "DELETE FROM `roles` WHERE `id` = '$roleId';";
            $query = mysqli_query($conn, $deleteRoleQuery);
            $message = "Role deleted successfully";
        }

    } catch (\Exception $e) {
        $message = $e->getMessage();
    }
}
