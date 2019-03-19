<?php
function getDB(){
    $host = '127.0.0.1'; //localhost
    $db   = 'magazyn';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $connectionDetails = "mysql:host=$host;dbname=$db;charset=$charset";

    $pdo = new PDO($connectionDetails, $user, $pass);
    return $pdo;
}

function redirectWithMessage($message, $pageName,$status = "info"){
    $_SESSION['message'] = $message;
    $_SESSION['messageStatus'] = $status;
    header("Location: ./$pageName");
    die();
    
}

function getAllProducts(){
    $db = getDB();
    $query = $db->query("SELECT * FROM products");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function getOneProduct($id){
    $db = getDB();
    $sql = "SELECT * FROM products WHERE id=?";
    $stmt= $db->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getAllClients(){
    $db = getDB();
    $query = $db->query("SELECT * FROM clients");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}