<?php
session_start();
require_once '../funkcje.php';

$id = $_POST['productId'];
$quantity = $_POST['quantity'];
if(isset($quantity) ){
    if(!empty($quantity)){
        try{
            $db = getDB();
            $sql = "UPDATE products SET quantity=? WHERE id=?";
            $stmt= $db->prepare($sql);
            $stmt->execute([$quantity, $id]);
            redirectWithMessage("Quantity changed succesfully",'../dashboard.php','success');
        }
       catch(Exception $e){
            redirectWithMessage($e->getMessage(),'../dashboard.php','danger');
       }

    }
}
redirectWithMessage('You have to fill Quantity','../dashboard.php','danger');