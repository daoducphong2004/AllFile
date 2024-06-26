<?php
function addlienhe($name,$email,$message){
    pdo_execute("INSERT INTO `lienhe`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");
}
function loadalllienhe(){
    $listlienhe=pdo_query("SELECT * FROM `lienhe` WHERE 1");
    return $listlienhe; 
}
function deletelienhe($id){
    pdo_execute("DELETE FROM `lienhe` WHERE `id`=".$id);
}
?>