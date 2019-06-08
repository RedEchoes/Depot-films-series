<?php
include('media.class.php');
include('films.class.php');
include('series.class.php');

class ContentManager {
  private $_db;

  public function __construct($db){
    $this->setDb($db);
  } 

  /* LISTER TOUT LES FILMS */
  public function listeFilms(){
    $films = array();
    $req = $this->_db->query('SELECT * FROM films ORDER BY cote DESC, titre ASC');

    while ($arrayfilms = $req->fetch())
    {
      $films[] = new Films ($arrayfilms['id'], $arrayfilms['titre'], $arrayfilms['cote'], $arrayfilms['date_parution'], $arrayfilms['image'], $arrayfilms['like_status']);
    }
    $req->closeCursor();
    return $films;
  }

  /* LISTER TOUTES LES SÉRIES */
  public function listeSeries(){
    $series = array();
    $req = $this->_db->query('SELECT * FROM series ORDER BY cote DESC, nb_saisons DESC, titre ASC');
    
    while ($arrayseries = $req->fetch())
    {
      $series[] = new Series ($arrayseries['id'], $arrayseries['titre'], $arrayseries['cote'], $arrayseries['nb_saisons'], $arrayseries['style'], $arrayseries['image'], $arrayseries['like_status']);
    } 
    $req->closeCursor();
    return $series;
  }
  
  /* LISTER TOUT LES ITEMS DANS LA DATABASE */
  public function listeTout(){
    $tout = array();
    $req = $this->_db->query('SELECT id, titre, date_parution, cote, NULL as nb_saisons, NULL as style, image, like_status FROM films UNION SELECT id, titre, NULL as date_parution, cote, nb_saisons, style, image, like_status FROM series ORDER BY cote DESC, nb_saisons DESC');

    while ($arraytout = $req->fetch())
    {
      $value = NULL;
      if ($arraytout['style'] == $value) {
        $tout[] = new Films ($arraytout['id'], $arraytout['titre'], $arraytout['cote'], $arraytout['date_parution'], $arraytout['image'], $arraytout['like_status']);
      }
      else {
            $tout[] = new Series ($arraytout['id'], $arraytout['titre'], $arraytout['cote'],  $arraytout['nb_saisons'], $arraytout['style'], $arraytout['image'], $arraytout['like_status']);
      }
    } 
    $req->closeCursor();
    return $tout;
  }  

  /* FAIRE UNE RECHERCHE */
  public function listeSearch($mot){
    if(!isset($mot)){
    throw new Exception("Erreur");
    }
    
    $recherche = array();
    $req =$this->_db->prepare('SELECT id, titre, date_parution, cote, NULL as nb_saisons, NULL as style, image, like_status FROM films WHERE titre LIKE :motRecherche UNION SELECT id, titre, NULL as date_parution, cote, nb_saisons, style, image, like_status FROM series WHERE titre LIKE :motRecherche');
    $req->execute(array(':motRecherche'=>''.$mot.'%'));
    
      while($arraysearch = $req->fetch())
      {
        $value = NULL;
        if ($arraysearch['style'] == $value) {
            $recherche[] = new Films ($arraysearch['id'], $arraysearch['titre'], $arraysearch['cote'], $arraysearch['date_parution'], $arraysearch['image'], $arraysearch['like_status']);
        }
        else {
            $recherche[] = new Series ($arraysearch['id'], $arraysearch['titre'], $arraysearch['cote'], $arraysearch['nb_saisons'], $arraysearch['style'], $arraysearch['image'], $arraysearch['like_status']);
        }
      }
    
    $req->closeCursor();
    return $recherche;
    }
    

  /* AJOUTER UN FILM */
  public function insertFilm(Films $unFilm){
  
    $req =$this->_db->prepare('INSERT INTO films (titre, date_parution, cote, image) VALUES (:titre, :date_parution, :cote, :image)');
    $req->execute(array(':titre'=>$unFilm->getTitre(), ':date_parution'=>$unFilm->getDate(), ':cote'=>$unFilm->getCote(),':image'=>$unFilm->getImage()));

    $req->closeCursor();
  }

  /* AJOUTER UNE SÉRIE */
  public function insertSerie(Series $uneSerie){
    
    $req =$this->_db->prepare('INSERT INTO series (titre, cote, nb_saisons, style, image) VALUES (:titre, :cote, :nb_saisons, :style, :image)');
    $req->execute(array(':titre'=>$uneSerie->getTitre(),':cote'=>$uneSerie->getCote(),':nb_saisons'=>$uneSerie->getSaisons(), ':style'=>$uneSerie->getStyle(), ':image'=>$uneSerie->getImage()));

    $req->closeCursor();
  }

  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}
?>