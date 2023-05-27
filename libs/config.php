<?php
// $conn = '';
try {
    $conn = new mysqli('127.0.0.1', 'root', '', 'handshake');
} catch (\Exception $th) {
    $conn = $th->getMessage();
}



?>
