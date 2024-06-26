<?php
function addlienhe($name,$email,$message){
    insert("INSERT INTO `lienhe`(`name`, `email`, `message`) VALUES ('$name','$email','$message')");
}
function loadalllienhe(){
    $listlienhe=getdata("SELECT * FROM `lienhe` WHERE 1");
    return $listlienhe; 
}
function deletelienhe($id){
    delete("DELETE FROM `lienhe` WHERE `id`=".$id);
}
?>