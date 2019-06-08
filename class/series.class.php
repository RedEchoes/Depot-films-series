<?php
require_once('media.class.php');

/**
 * Ce fichier contient la déclaration de la classe Series
 *
 * @author Maude Laroche et Vincent Desrosiers
 */

class Series extends Media{
  //Propriétés
  private $_saisons;
  private $_style;

  // ***************************************************************************
  // Description : 
  //   Constructeur d'initialisation.
  //
  // Paramètres :
  //   $titre             Le titre du média.
  //	 $cote              La cote du média sur 10.
  //	 $image             L'image du média.
  //	 $saisons           Le nombre de saisons de la série.
  //	 $style             L'image du le style de la série.
  //
  // Précondition :
  //   - Aucun champ ne doit être vide.
  //
  // Retourne :
  //   Rien.
  // ***************************************************************************
  public function __construct($id, $titre, $cote, $saisons, $style, $image, $like_status){
    parent::setId($id);
    parent::setTitre($titre);
    parent::setCote($cote);
    parent::setImage($image);
    $this->setSaisons($saisons);
    $this->setStyle($style);
    parent::set_like_status($like_status);
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie le nombre de saisons.
  //
  // Paramètres :
  //   $saisons      Nouveau nombre de saisons.
  // 
  // Précondition :
  //  - Le nombre de saisons ne doit pas être vide.
  //  - Le nombre de saisons doit être entre 1 et 100.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setSaisons($saisons){
    if(!Utilitaire::validerChampObligatoire($saisons) && !Utilitaire::validerNombre($nbr, 1 , 100)){
        trigger_error("Vous devez entrer un nombre valide entre 1 et 100");
    }
    else{
        $this->_saisons = $saisons;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne le nombre de saisons.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   Le nombre de saisons.    
  // ***************************************************************************
  public function getSaisons(){
    return $this->_saisons;
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie le style.
  //
  // Paramètres :
  //   $style      Nouveau style.
  // 
  // Précondition :
  //  - Le style ne doit pas être vide.
  //  - Le style doit être entre 1 et 5.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setStyle($style){
    if(!Utilitaire::validerChampObligatoire($style) && !Utilitaire::validerSelect($style)){
        trigger_error("Vous devez choisir une option");
    }
    else{
        $this->_style = $style;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne le style.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   Le style.    
  // ***************************************************************************
  public function getStyle(){
    return $this->_style;
  }

}
?>