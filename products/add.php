<?php
session_start();
require_once '../funkcje.php';

$name = $_POST['name'];
$quantity = $_POST['quantity'];
if(isset($name) || isset($quantity)){
    if(!empty($quantity) || !empty($name)){
        try{
            $db = getDB();
            $sql = "INSERT INTO products (name,quantity) VALUES (?,?)";
            $stmt= $db->prepare($sql);
            $stmt->execute([$name, $quantity]);
            redirectWithMessage("Product added succesfully",'../dashboard.php','success');
        }
       catch(Exception $e){
            redirectWithMessage($e->getMessage(),'../dashboard.php','danger');
       }

    }
}
redirectWithMessage('You have to fill Quantity and Name','../dashboard.php','danger');