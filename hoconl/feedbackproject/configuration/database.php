<?php
define('DATABASE_SEVER','localhost');
define('DATABASE_USER','root');
define('DATABASE_PASSWORD','');
define('DATABASE_NAME','phpapp');
$connection=null;
    try{
        $connection= new PDO(
            "mysql:host=".DATABASE_SEVER.";  dbname=".DATABASE_NAME,DATABASE_USER,DATABASE_PASSWORD  
        );
        $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        echo "connected succsessfully";
    }catch(PDOException $e){
        echo "connection failed<br>".$e->getMessage();
        $connection=null;
    }
