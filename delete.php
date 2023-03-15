<?php
    $pdo = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");
    $id = $_GET['idelem'];
    $cat=$_GET['cat'];
    $sqlState = $pdo->prepare(query:'DELETE FROM produits WHERE id=?');
    $supprime = $sqlState->execute([$id]);
    if ($supprime) { //tester la supression correcte
           header(header:'location: category.php?cat='.$cat.'');    
    }else{
    echo "Database error";
    }

?>