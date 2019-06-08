<?php
include_once('utilitaire.class.php');
/**
 * Ce fichier contient la déclaration de la classe Media
 *
 * @author Maude Laroche et Vincent Desrosiers
 */

class Media {
  //Propriétés
  private $_id;
  private $_titre;
  private $_cote;
  private $_image;
  private $_like_status;

  // ***************************************************************************
  // Description : 
  //   Constructeur d'initialisation.
  //
  // Paramètres :
  //   $titre             Le titre du média.
  //	 $cote              La cote du média sur 10.
  //	 $image             L'image du média.
  //
  // Précondition :
  //   - Aucun champ ne doit être vide.
  //
  // Retourne :
  //   Rien.
  // ***************************************************************************
  public function __construct($id, $titre, $cote, $image, $like_status){
    $this->setId($id);
    $this->setTitre($titre);
    $this->setCote($cote);
    $this->setImage($image);
    $this->set_like_status($like_status);
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie le titre.
  //
  // Paramètres :
  //   $titre      Nouveau titre.
  // 
  // Précondition :
  //  - Le titre ne doit pas être vide.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setTitre($titre){
    if(!Utilitaire::validerChampObligatoire($titre)){
         trigger_error("Vous devez remplir le champ");
    }
    else{
    $this->_titre = $titre;
    }
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne le titre.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   Le titre.    
  // ***************************************************************************
  public function getTitre(){
    return $this->_titre;
  }
  

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie la cote.
  //
  // Paramètres :
  //   $cote      Nouvelle cote.
  // 
  // Précondition :
  //  - La cote ne doit pas être vide.
  //  - La cote doit être entre 1 et 10.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setCote($cote){
   if(!Utilitaire::validerChampObligatoire($cote) && !Utilitaire::validerNombre($nbr, 1 , 10)){
       trigger_error("Vous devez entrer un nombre valide entre 1 et 10");
   }
   else{
    $this->_cote = $cote;
   }
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne la cote.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   La cote.    
  // ***************************************************************************
  public function getCote(){
    return $this->_cote;
   }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie l'image'.
  //
  // Paramètres :
  //   $image      Nouvelle image.
  // 
  // Précondition :
  //   Aucune.
  //
  // Retourne :
  //   Rien.    
  // ***************************************************************************
  public function setImage($image){
    $this->_image = $image;
 }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne l'image.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   L'image'.    
  // ***************************************************************************
  public function getImage(){
    return $this->_image;
  }

  // ***************************************************************************
  // Description : 
  //   Cette méthode modifie l'id.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   L'id'.    
  // ***************************************************************************
  public function setId($id){
    $this->_id = $id;
 }

  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne l'id.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   L'id'.    
  // ***************************************************************************
  public function getId(){
    return $this->_id;
  }

// ***************************************************************************
  // Description : 
  //   Cette méthode modifie le like_status.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   Le like_status'.    
  // ***************************************************************************
  public function set_like_status($like_status)
  {
    $this->_like_status = $like_status;
  }
  // ***************************************************************************
  // Description : 
  //   Cette méthode retourne le like_status.
  //
  // Paramètres :
  //   Aucun.
  // 
  // Retourne :
  //   Le like_status'.    
  // *************************************************************************** 
  public function get_like_status()
  {
    return $this->_like_status;
  }
}
?>