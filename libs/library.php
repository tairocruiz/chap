<?php

function _include(string $file, string $path = 'includes', string $ext = '.php')
{
    $rootPath = realpath(__DIR__ . '/../'); // Get the absolute path to the root folder
    $filePath = $rootPath . '/' . $path . '/' . str_replace('.', '/', $file) . $ext;
    include_once $filePath;
}

function assets($filename, $type = '', $innerfolder = '', $rootfolder = 'chap')
{

    $subfolder = ($innerfolder !== '') ? $innerfolder . '/' : '';
    echo $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER['HTTP_HOST'] . '/' . $rootfolder . '/assets/' . $subfolder . $filename . '.' . $type;

}

function auth_check(){
    if(empty($_SESSION)){
        header('location:index.php');
    }
}

function message($message, $status = "success"){
    echo "
    <script>
        Swal.fire({
            title: 'htmlTitle',
            icon: '".$status."',
            html: '". $message ."',
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'Ok',
            confirmButtonAriaLabel: 'accept',
            cancelButtonText: 'Cancel',
            cancelButtonAriaLabel: 'decline'
        })
    </script>
    ";
}
function can($sessionkey, $array){
    if (key_exists($sessionkey, $array)) {
        return $sessionkey;
    }else{
        $message = "404! YOU ARE NOT AUTHORIZED.";
        return false;
    }
}

function getPermiId($permi, $dbcon){
    $sql = "SELECT `id` FROM `permissions` WHERE `permission`='$permi';";
    $ques = mysqli_query($dbcon, $sql);
    $res = mysqli_fetch_assoc($ques);
    return $res['id'];
}

function getSessId($sess, $dbcon){
    $sql = "SELECT `id` FROM `logs` WHERE `session`='$sess';";
    $ques = mysqli_query($dbcon, $sql);
    $res = mysqli_fetch_assoc($ques);
    return $res['id'];
}

