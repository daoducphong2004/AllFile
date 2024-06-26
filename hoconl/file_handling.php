<?php
 $file_path="./demso.txt";
if(file_exists($file_path)){
    // echo readfile($file_path);
    $file_handle=fopen($file_path ,'r');
    echo $file_content;
    }else{
        $file_handle=fopen($file_path,'w');
        $file_content='so mot tram'.PHP_EOL.'so mot nghin'.PHP_EOL;
        fwrite($file_handle,$file_content);
    }
    fclose($file_handle);
?>