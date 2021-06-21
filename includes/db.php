<?php
    $dsn="mysql:host=localhost;dbname=bainhom";

    try{
        $pdo = new PDO($dsn, 'root', '');

    }
    catch(PDOException $e){
        echo $e -> getMessage();
    }

?>