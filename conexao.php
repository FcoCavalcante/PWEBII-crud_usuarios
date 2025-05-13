<?php
$host = 'localhost';
$db   = 'crud_php';
$user = 'root';
$pass = '';

try {
    
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);

    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    echo "Erro na conexão: " . $e->getMessage();
    exit;
}
?>

