<?php
include_once('connexion.php');
require_once('class/utilitaire.class.php');
include_once('class/tp3Manager.class.php');
$manager = new ContentManager($db);
$mot = ($_GET['search']);
try{
  $recherche = $manager->listeSearch($mot);
}
catch(Exception $e){
  echo ($e->getMessage());
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>TP3</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <?php
  if(isset($_GET['search'])){
    if (!Utilitaire::validerChampObligatoire($_GET['search'])) {
      echo "erreur";
    }
  }
  ?>

  <div class="container mt-3">

    <h1>TP3 Maude Laroche et Vincent Desrosiers</h1>
    <div class="row">
      <div class="container">
        <a class="btn btn-primary mb-5" href="index.php" role="button">Retour à la page principale</a>
      </div>
    </div>
    <div class="row">
      <div class="container">
        <form method="GET" action="recherche.php" class="form input-group" autocomplete="off">
          <input id="search" name="search" class="form-control pb-2 mr-3 col-md-3 col-sm-6" type="text" placeholder="Search"
            aria-label="Search">
          <button value="Soumettre" class="btn btn-primary" type="submit">Rechercher</button>
        </form>
        <span id="search-results"></span>
      </div>
    </div>
    <h1>Résultats de la recherche</h1>
    <div class="row col-12 flex f-wrap">
      <?php
foreach($recherche as $trouve){
  if($trouve instanceof Films){
  ?>
      <div class="card col-sm-4">
        <?php echo '<img class="card-img-top m-auto" src="img/'.$trouve->getImage().'" alt="Card image cap">' ?>
        <div class="card-body">
        <div data-type="films" data-id="<?= $trouve->getId() ?>" 
              <?php 
              if ($trouve->get_like_status() == 0) {
                echo 'class="no-like"';
              }
              elseif ($trouve->get_like_status() == 1) {
                echo 'class="like"';
              }
              ?> > </div>
          <h5 class="card-title">
            <?php echo $trouve->getTitre(); ?>
          </h5>
          <p class="card-text">Cote:
            <?php echo $trouve->getCote(); ?> / 10
          </p>
          <p class="card-text">Date de parution:
            <?php echo $trouve->getDate(); ?>
          </p>
        </div>
      </div>
      <?php } ?>

      <?php
  if($trouve instanceof Series){
  ?>
      <div class="card col-sm-4">
        <?php echo '<img class="card-img-top m-auto" src="img/'.$trouve->getImage().'" alt="Card image cap">' ?>
        <div class="card-body">
        <div data-type="series" data-id="<?php echo $trouve->getId(); ?>" 
            <?php 
            if ($trouve->get_like_status() == 0) {
              echo 'class="no-like"';
              }
            elseif ($trouve->get_like_status() == 1) {
              echo 'class="like"';
            }
            ?> > </div>
          <h5 class="card-title">
            <?php echo $trouve->getTitre(); ?>
          </h5>
          <p class="card-text">Cote:
            <?php echo $trouve->getCote(); ?> / 10
          </p>
          <p class="card-text">Nombre de saisons:
            <?php echo $trouve->getSaisons(); ?>
          </p>
          <p class="card-text">Style:
            <?php
              switch ($trouve->getStyle()) {
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
      <?php } ?>
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