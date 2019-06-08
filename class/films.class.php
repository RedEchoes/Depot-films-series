<?php
include_once('media.class.php');

/**
 * Ce fichier contient la déclaration de la classe Films
 *
 * @author Maude Laroche et Vincent Desrosiers
 */


class Films extends Media {
 //Propriétés
  private $_date;
    
  // ***************************************************************************
  // Description : 
  //   Constructeur d'initialisation.
  //
  // Paramètres :
  //   $titre             Le titre du média.
  //	 $cote              La cote du média sur 10.
  //	 $image             L'image du média.
  //	 $date              La date de parution du film.
  //
  // Précondition :
  //   - Aucun champ ne doit être vide.
  //
  // Retourne :
  //   Rien.
  // ***************************************************************************
  public function __construct($id, $titre, $cote, $date, $image, $like_status){
    parent::setTitre($titre);
    parent::setCote($cote);
    parent::setImage($image);
    $this->setDate($date);
    parent::setId($id);
    parent::set_like_status($like_status);
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie la date.
  //
  // Paramètres :
  //   $date      Nouvelle date.
  // 
  // Précondition :
  //  - La date ne doit pas être vide.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setDate($date){
    if(!Utilitaire::validerChampObligatoire($date) || !Utilitaire::validerDate($date)){
        trigger_error("Vous devez entrer une date valide");
    }
    else{
        $this->_date = $date;
     }
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne la date.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   La date.    
  // ***************************************************************************
  public function getDate(){
     return $this->_date;
  }

}
?>