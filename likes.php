<?php
include_once('connexion.php');
$likeType = $_GET['likeType'];
if($likeType == 'films'){
  $req = $db->prepare("UPDATE films SET like_status = NOT like_status WHERE id='".$_GET['likeId']."'");
  $req->execute(array('likeId'=>$_GET['likeId']));
}
if ($likeType == 'series') {
  $req = $db->prepare("UPDATE series SET like_status = NOT like_status WHERE id='".$_GET['likeId']."'");
  $req->execute(array('likeId'=>$_GET['likeId']));
}
$req->closeCursor();
header ('200', true, 200);
?> 