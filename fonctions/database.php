<?php 
$host = 'localhost';
    $user = "root";
    $password = '';
    $dbName = 'blog';
    
    try{
        $db = new PDO("mysql:host=" . $host . ";dbname=" . $dbName, $user, $password);
        // $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMOD_EXEPTION);
        // echo "conecté ";
    } catch(PDOExeption $e){
        echo $e;
    }
    ?>