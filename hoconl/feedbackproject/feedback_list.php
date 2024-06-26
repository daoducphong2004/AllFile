<?php
require "components/header.php";

$sql="SELECT name ,email ,body from feedback";

if($connection!==NULL){
try{
    $statement = $connection->prepare($sql);
    $statement->execute();
    $result=$statement->setFetchMode(PDO::FETCH_ASSOC);
    $feedbacks=$statement->fetchAll();
    foreach($feedbacks as $feedback){
        $name=$feedback['name']??'';
        $email=$feedback['email']??'';
        $body=$feedback['body']??'';
        echo "$name,$email,$body<br>";
    }
    
}catch(PDOException $e){
echo "hoho";
}
}
include "components/footter.php";
?>