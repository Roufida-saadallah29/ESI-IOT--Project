<?php
$connect = new PDO("mysql:host=localhost;dbname=esi-iot", "root", "");
$id = $_GET['id'];
$nom = $_POST['name'];
$date = $_POST['purchase'];
$quantity = $_POST['quantity'];
$etat = $_POST['etat'];
$type = $_GET['type'];


$requete = "UPDATE produits SET  dateAchat='".$date."', etat='".$etat."', quantite='".$quantity."', categorie='".$type."' WHERE id='".$id."'";
$statement1 = $connect->prepare($requete);
$statement1 = $connect->exec($requete);
?>