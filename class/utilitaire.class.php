<?php

class Utilitaire{

  // ***************************************************************************
  // Description : 
  //   Validation de champ vide.
  //
  // Paramètres :
  //   $champ             La valeur dans le champ.
  //
  // Fonction: 
  //   - Si le champ est vide, retourne une erreur.
  //
  // ***************************************************************************
  public static function validerChampObligatoire($champ){
    if($champ == ""){
      return false;
        trigger_error("champ vide");
    }
    else{
      return true;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Validation de champ vide.
  //
  // Paramètres :
  //   $champ             La valeur dans le champ.
  //
  // Fonction: 
  //   - Si le champ est vide, retourne une erreur.
  //
  // ***************************************************************************
  public static function validerNombre($nbr, $min, $max){
    if($nbr < $min || $nbr > $max || !is_numeric($nbr)){
      return false;
    }
    else{
      return true;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Validation de la date.
  //
  // Paramètres :
  //   $date             Date entrée par l'utilisateur.
  //
  // Fonction: 
  //   - Si la date est supérieure a la date d'aujourd'hui, retourne une erreur.
  //
  // ***************************************************************************
  public static function validerDate($date){
    $dateAujourdhui = date_create(date('d-m-Y'));
    $datetime = date_create($date);
    if($datetime > $dateAujourdhui){
      return false;
    }
    else{
      return true;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Validation du input type="select".
  //
  // Paramètres :
  //   $style             La valeur du style choisi.
  //
  // Fonction: 
  //   - Si le style n'a pas été choisi(option value="0"), retourne une erreur.
  //
  // ***************************************************************************
  public static function validerSelect($style){
    if($style == 0){
      return false;
    }
    else{
      return true;
    }
  }
}
?>