<?php
$dsn = 'mysql:host=db;dbname=ph2_app;charset=utf8;';
$user = 'eiki';
$password = 'password';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch(PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
    exit();
}

