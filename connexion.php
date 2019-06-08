<?php
   try { //Essaye de te connecter avec mySQL
    $db = new PDO('mysql:host=localhost;dbname=tp1_maudelaroche_vincentdesrosiers','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8"));
    // Pour lancer les exceptions lorsqu'il y des erreurs PDO.
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
 }
   catch (PDOException $e) {
    exit( "Erreur lors de la connexion à la BD".$e->getMessage());
   }
?>