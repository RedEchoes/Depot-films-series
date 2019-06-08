<?php
include('connexion.php');
include('class/tp3Manager.class.php');
$mot = $_GET['search'];

$req = $db->prepare('SELECT titre FROM films WHERE titre LIKE :motRecherche UNION SELECT titre FROM series WHERE titre LIKE :motRecherche');
$req->execute(array(':motRecherche'=>''.$mot.'%'));
$arraySearch = $req->fetchAll(PDO::FETCH_OBJ);

$req->closeCursor();
header ('200', true, 200);
echo JSON_encode($arraySearch);
?>