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
