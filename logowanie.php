<?php
session_start();
require_once 'funkcje.php';



function checkUserFromDatabase(){
    if(isset($_POST["name"]) && isset($_POST["password"])){  
        $db = getDB();
        $name=$_POST['name'];
        $password=md5($_POST['password']);
        $query = $db->prepare("SELECT * FROM users WHERE name=? AND password=?");// query działa jak nie ma znaków zapytania a prepare jak są 
        $query->execute([$name, $password]); //wrzuca zamienne w znaki zapytania
        return $query->fetch(PDO::FETCH_ASSOC);// pobiera wszytskie rzeczy z bazy danych które pasują do selecta
    }   
}


$databeaseResult = checkUserFromDatabase();
if ($databeaseResult == NULL){
    redirectWithMessage('nieprawidłowe dane logowania','index.php');
}else{
   
    redirectWithMessage('zalogowano poprawnie','dashboard.php');

} 



