<?php 
$valide = true;
require_once('class/utilitaire.class.php');
include('class/tp3Manager.class.php');
include("connexion.php");
require ('vendor/autoload.php');
$manager = new ContentManager($db);

?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP3</title>
  <meta name="description" content="">
  <link rel="shortcut icon" href="#" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container mt-3">
    <h1>TP3 Maude Laroche et Vincent Desrosiers</h1>
    <div class="row">
      <div class="container">
      <!-- BOUTONS FORMULAIRES -->
        <button id="ajoutFilm" type="button" class="btn btn-primary mb-3 mr-3" data-toggle="modal" data-target="#modalFilm">
        Ajouter un film
        </button>
        <button id="ajoutSerie" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalSerie">
        Ajouter une série
        </button>
      </div>
    </div>
      <!-- RECHERCHE -->
      <div class="row">
        <div class="container">
      <form method="GET" action="recherche.php" class="form input-group" autocomplete="off">
        <input id="search" name="search" class="form-control pb-2 mr-3 col-md-3 col-sm-6" type="text" placeholder="Search" aria-label="Search">
        <button value="Soumettre" class="btn btn-primary" type="submit">Rechercher</button>
      </form>
      <span id="search-results"></span>
    </div>
    </div>
    <!-- FORMULAIRE FILM -->
    <div class="modal fade" id="modalFilm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Film</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <form method="POST" action="index.php?code=ajoutFilm">
              <div class="form-group">
                <label for="titre">Titre:</label>
                <p class="erreur">
                  <?php 
                  
                  if(isset($_GET['code'])){ 
                      if($_GET['code'] == 'ajoutFilm'){ 
                        if (!Utilitaire::validerChampObligatoire($_POST['titre'])) {
                          echo ("Vous devez entrer un titre obligatoirement");
                          $valide= false;
                        }
                      } 
                    } 
                 

              ?>
                </p>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="">
              </div>

              <div class="form-group">
                <label for="cote">Cote entre 1 et 10:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){ 
                      if($_GET['code'] == 'ajoutFilm'){
                        if (!Utilitaire::validerNombre($_POST['cote'],1,10)) {
                          echo ("Vous devez entrer un cote entre 1 et 10 obligatoirement");
                          $valide= false;
                        }
                      } 
                    } 
              ?>
                </p>
                <input type="text" class="form-control" id="cote" type="number" name="cote" placeholder="">
              </div>

              <div class="form-group">
                <label for="date">Date de parution:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){
                      if($_GET['code'] == 'ajoutFilm'){
                        if (!Utilitaire::validerDate($_POST['date'])) {
                          echo ("Vous devez entrer une date valide");
                          $valide= false;
                        }
                      } 
                    } 
                    
              ?>
                </p>
                <input type="date" class="form-control" id="date" name="date" placeholder="">
              </div>
              <button id="btnSubmit" value="Soumettre" class="btn btn-primary" type="submit">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
  if($valide == true){
  if(isset($_GET['code'])){
    if($_GET['code'] == 'ajoutFilm'){
      $txtTitre = $_POST['titre'];
      $txtCote = $_POST['cote'];
      $txtDate = $_POST['date'];
      $txtImage = 'img/na.jpg'; 
      $unFilm = new Films($txtTitre, $txtCote, $txtImage, $txtDate);
      $manager->insertFilm($unFilm);
    }
    
  }
}
  ?>



    <!-- FORMULAIRE SÉRIE -->
    <div class="modal fade" id="modalSerie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Série</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action="index.php?code=ajoutSerie">
              <div class="form-group">
                <label for="titre">Titre:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){
                      if($_GET['code'] == 'ajoutSerie'){
                        if (!Utilitaire::validerChampObligatoire($_POST['titre'])) {
                          echo ("Vous devez entrer un titre obligatoirement");
                          $valide = false;
                        }
                      } 
                    } 
              ?>
                </p>
                <input type="text" class="form-control" id="titre" name="titre" placeholder="">
              </div>
              <div class="form-group">
                <label for="cote">Cote entre 1 et 10:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){
                        if($_GET['code'] == 'ajoutSerie'){
                          if (!Utilitaire::validerNombre($_POST['cote'],1,10)) {
                            echo ("Vous devez entrer un cote entre 1 et 10 obligatoirement");
                            $valide = false;
                          }
                        } 
                      } 
                ?>
                </p>
                <input type="text" class="form-control" id="cote" type="number" name="cote" placeholder="">
              </div>
              <div class="form-group">
                <label for="saisons">Nombre de saisons:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){
                        if($_GET['code'] == 'ajoutSerie'){
                          if (!Utilitaire::validerNombre($_POST['saisons'],1,100)) {
                            echo ("Vous devez entrer un nombre de saisons");
                            $valide = false;
                          }
                        } 
                      } 
                  ?>
                </p>
                <input type="text" class="form-control" id="saisons" type="number" name="saisons" placeholder="">
              </div>

              <div class="form-group">
                <label for="style">Style:</label>
                <p class="erreur">
                  <?php if(isset($_GET['code'])){
                      if($_GET['code'] == 'ajoutSerie'){
                        if (!Utilitaire::validerSelect($_POST['style'])) {
                          echo ("Vous devez choisir un style");
                          $valide = false;
                        }
                      } 
                    } 
              ?>
                </p>
                <select id="style" name="style" class="browser-default custom-select">
                  <option value="0">Style</option>
                  <option value="1">Drame</option>
                  <option value="2">Comédie</option>
                  <option value="3">Horreur</option>
                  <option value="4">SciFi</option>
                  <option value="5">Autre</option>
                </select>
              </div>
              <button value="Soumettre" class="btn btn-primary" type="submit">Soumettre</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php
  if($valide == true){
  if(isset($_GET['code'])){
    if($_GET['code'] == 'ajoutSerie'){
      $txtTitre = $_POST['titre'];
      $txtCote = $_POST['cote'];
      $txtSaisons = $_POST['saisons'];
      $txtStyle = $_POST['style'];
      $txtImage = 'img/na.jpg';
      $uneSerie = new Series($txtTitre, $txtCote, $txtImage, $txtSaisons, $txtStyle);
      $manager->insertSerie($uneSerie);
    }
  }
}
?>

    <!-- Tabs -->
    <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="tous-tab" data-toggle="tab" href="index.php?recherche=tous"  data-target="#tous" role="tab" aria-controls="tous"
          aria-selected="true">Tous</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="films-tab" data-toggle="tab" href="index.php?recherche=films" data-target="#films" role="tab" aria-controls="films"
          aria-selected="false">Films</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="series-tab" data-toggle="tab" href="index.php?recherche=films" data-target="#series" role="tab" aria-controls="series" aria-selected="false">Séries
          Télé</a>
      </li>
    </ul>

    <!-- Content -->
    <div class="tab-content" id="myTabContent">

      <!-- Tous les items -->
      <div class="col-auto tab-pane d-flex flex-wrap fade show active" id="tous" role="tabpanel" aria-labelledby="tous-tab">
        <?php
          $tout = $manager->listeTout();
          foreach ($tout as $item) {
            if($item instanceof Series){
        ?>
        <div class="card col-sm-4">

          <?php echo '<img class="card-img-top m-auto" src="img/'.$item->getImage().'" alt="Card image cap">' ?>
          <div class="card-body">
            <div data-type="series" data-id="<?php echo $item->getId(); ?>" 
            <?php 
            if ($item->get_like_status() == 0) {
              echo 'class="no-like"';
              }
            elseif ($item->get_like_status() == 1) {
              echo 'class="like"';
            }
            ?> > </div>

            <h5 class="card-title">
              <?php echo $item->getTitre(); ?>
            </h5>
            <p class="card-text">Cote:
              <?php echo $item->getCote(); ?> / 10
            </p>
            <p class="card-text">Nombre de saisons:
              <?php echo $item->getSaisons(); ?>
            </p>
            <p class="card-text">Style:
              <?php
              switch ($item->getStyle()) {
                case 1:
                  echo "Drame";
                break;

                case 2;
                 echo "Comédie";
                break;

                case 3:
                 echo "Horreur";
                break;
                
                case 4:
                  echo "SciFi";
                break;

                case 5:
                  echo "Autre";
                break;

              default;
              }
              ?>
            </p>
          </div>
        </div>
        <?php } ?>

        <?php
          if($item instanceof Films){
        ?>
        <div class="card col-sm-4">
          <?php echo '<img class="card-img-top m-auto" src="img/'.$item->getImage().'" alt="Card image cap">' ?>
          <div class="card-body">
            <div data-type="films" data-id="<?= $item->getId() ?>" 
              <?php 
              if ($item->get_like_status() == 0) {
                echo 'class="no-like"';
              }
              elseif ($item->get_like_status() == 1) {
                echo 'class="like"';
              }
              ?> > </div>

            <h5 class="card-title">
              <?php echo $item->getTitre(); ?>
            </h5>
            <p class="card-text">Cote:
              <?php echo $item->getCote(); ?> / 10
            </p>
            <p class="card-text">Date de parution:
              <?php echo $item->getDate(); ?>
            </p>
          </div>
        </div>
        <?php } ?>
        <?php } ?>
      </div>

      <!-- Tous les films -->
      <div class="tab-pane fade d-flex flex-wrap" id="films" role="tabpanel" aria-labelledby="films-tab">
        <?php
        $films = $manager->listeFilms();
        foreach ($films as $film) {
          ?>
        <div class="card col-sm-4">
          <?php echo '<img class="card-img-top m-auto" src="img/'.$film->getImage().'" alt="Card image cap">' ?>
          <div class="card-body">
            <div data-type="films" data-id="<?= $film->getId() ?>" 
              <?php 
              if ($film->get_like_status() == 0) {
                echo 'class="no-like"';
              }
              elseif ($film->get_like_status() == 1) {
                echo 'class="like"';
              }
              ?> > </div>

            <h5 class="card-title">
              <?php echo $film->getTitre(); ?>
            </h5>
            <p class="card-text">Cote:
              <?php echo $film->getCote(); ?> / 10
            </p>
            <p class="card-text">Date de parution:
              <?php echo $film->getDate(); ?>
            </p>
          </div>
        </div>
        <?php } ?>
      </div>

      <!-- Toutes les séries -->
      <div class="tab-pane fade d-flex flex-wrap" id="series" role="tabpanel" aria-labelledby="series-tab">
        <?php
        $series = $manager->listeSeries();
        foreach ($series as $serie) {
          ?>
        <div class="card col-sm-4">
          <?php echo '<img class="card-img-top m-auto" src="img/'.$serie->getImage().'" alt="Card image cap">' ?>
          <div class="card-body">
            <div data-type="series" data-id="<?= $serie->getId() ?>" 
              <?php 
              if ($serie->get_like_status() == 0) {
                echo 'class="no-like"';
              }
              elseif ($serie->get_like_status() == 1) {
                echo 'class="like"';
              }
              ?> > </div>

            <h5 class="card-title">
              <?php echo $serie->getTitre(); ?>
            </h5>
            <p class="card-text">Cote:
              <?php echo $serie->getCote(); ?> / 10
            </p>
            <p class="card-text">Nombre de saisons:
              <?php echo $serie->getSaisons(); ?>
            </p>
            <p class="card-text">Style:
              <?php
              switch ($serie->getStyle()) {
                case 1:
                  echo "Drame";
                break;

                case 2;
                 echo "Comédie";
                break;

                case 3:
                 echo "Horreur";
                break;
                
                case 4:
                  echo "SciFi";
                break;

                case 5:
                  echo "Autre";
                break;
                
              default;
              }
              ?>
            </p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

  </div>
  <script src="js/vendor/modernizr-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="js/vendor/jquery-3.3.1.min.js"><\/script>')
  </script>
  <script src="js/vendor/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
</body>

</html>