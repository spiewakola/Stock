<?php 
session_start();

require_once '../funkcje.php';

if(isset($_POST['productId'])){
    $db = getDB();
    $sql = "DELETE FROM products WHERE id = ?";
    $query= $db->prepare($sql);
    $result = $query->execute([$_POST['productId']]);
    if($result){
        redirectWithMessage("Gratulacje! Usnięto wpis z listy","../dashboard.php");
    }else{
        redirectWithMessage("Niestety! Nie udało się usunąć wpisu z listy","../dashboard.php");
    }
}