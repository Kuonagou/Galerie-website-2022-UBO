<!DOCTYPE html>
<html lang="en">

<?php $mysqli = new mysqli('your own database information');
    if ($mysqli->connect_errno)
    {
    // Affichage d'un message d'erreur
    echo "Error: Problème de connexion à la BDD \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    // Arrêt du chargement de la page
    exit();
    }?>

<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
  <link href="./assets/favicon.ico" rel="icon">



  <title>Acceuil</title>  

<link href="./main.82cfd66e.css" rel="stylesheet"></head>

<body>

 <!-- Add your content of header -->
<header class="">
  <div class="navbar navbar-default visible-xs">
    <button type="button" class="navbar-toggle collapsed">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="./index.php" class="navbar-brand">La Couleur</a>
  </div>

  <nav class="sidebar">
    <div class="navbar-collapse" id="navbar-collapse">
      <div class="site-header hidden-xs">
          <a class="site-brand" href="./index.php" title="">
            <img class="img-responsive site-logo" alt="" src="./assets/images/mashup-logo.svg">
           La Couleur
          </a>
        <p>Bienvenue !</p>
      </div>
      <ul class="nav">
        <li><a href="./galerie.php" title="">Galerie</a></li>
        <li><a class="active" href="./index.php" title="">Accueil</a></li>
        <li><a href="./galerie_exposant.php" title="">Nos Exposants</a></li>
        <li><a href="./livredor.php" title="">Livre d'or</a></li>
        <li><a href="./connexion.php" title="">Connexion</a></li>

      </ul>

      <nav class="nav-footer">
        <p class="nav-footer-social-buttons">
          <a class="fa-icon" title="">
            <i class="fa-solid fa-palette"></i>
          </a>
          <a class="fa-icon" title="">
            <i class="fa-solid fa-paint-roller"></i>
          </a>
          <a class="fa-icon"  title="">
            <i class="fa-solid fa-brush"></i>
          </a>
        </p>
        <p> La Couleur | Website created by Anouk UBO |<a href="./inscription.php" title=""> Inscription</a></p><!-- lien vers inscription seul page sur laquelle ceci est présent -->
      </nav>  
    </div> 
  </nav>
</header>
<main class="" id="main-collapse">

<div class="row">
  <div class="col-xs-12 col-md-6">
    <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
  </div>
  <div class="col-xs-12 col-md-6">
    
    <?php           
          $requete="select cfg_intitule, cfg_datedebut, cfg_datefin, cfg_presentation, cfg_lieu, cfg_textebienvenue from T_CONFIGURATION_CFG;";
          $result1 = $mysqli->query($requete); //requete récupération info de l'exposition

          if ($result1 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
          $confi = $result1->fetch_assoc() //affichage des info de l'expositions
          ?>
    <h1>Exposition : <?php echo $confi['cfg_intitule']?></h1>
    <p></p>
    
    <h3>Dates importantes </h3>

    <p>Notre exposition débutera le <?php echo $confi['cfg_datedebut']?> et prendra fin le <?php echo $confi['cfg_datefin']?></p>

    <h3>Présentation</h3>
    
    <p><?php echo $confi['cfg_presentation']?></p>
            
    <h3>L'exposition aura lieu à <?php echo $confi['cfg_lieu']?>  </h3><p><a href="https://goo.gl/maps/MobUP4sJQd39MbRy7" title=""><img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/20/000000/external-map-pin-basic-ui-elements-flatart-icons-outline-flatarticons.png"/></a> Here For Map Location</p> <!-- lien vers la lieu sur maps-->
    
    <p><?php echo $confi['cfg_textebienvenue']?></p>
    <?php
          }
        ?>
        <?php           
          $requete="SELECT ABS(Datediff(CFG_DATEVERNISSAGE,now())) as Vernissage from T_CONFIGURATION_CFG;";//requete calcul de la différence de date en jour pour le vernissage
          $result1 = $mysqli->query($requete);

          if ($result1 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
          $vernissage = $result1->fetch_assoc();
          }
          ?>
        <h3>Vernissage</h3>
        <p>Le vernissage a eu lieu, il y a <?php echo $vernissage['Vernissage'] ?> jours .</p>

 </div>
</div>

<div class="row">
    <div class="col-xs-12 section-container-spacer"> <!-- affichage des actualités -->
        <h1>Actualités</h1>
        <p>Venez vous renseignez ici sur les choses à venir et les différents évênement de notre exposition</p>
    </div>
    <table class="table table-hover">
              <tr>
              <th>Titre :</th>
              <td>Texte :</td>
              <td>Actualitée du </td>
              <td> Par :<td>
              </tr>
        
        <?php           
          $requete="select act_num, act_titre, act_texte, act_datepublication, cpt_pseudo from T_ACTUALITE_ACT order by act_num DESC limit 7;";
          $result1 = $mysqli->query($requete); //requette des actualités 7 plus récentes

          if ($result1 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          { 
            while($actu = $result1->fetch_assoc()){
              ?>
              <tr>
              <th><?php echo $actu['act_titre'];?></th>
              <td><?php echo $actu['act_texte'];?></td>
              <td><?php echo $actu['act_datepublication'];?></td>
              <td><?php echo $actu['cpt_pseudo'];?></td>
              </tr>
            <?php
            }
          }
        ?>
        </table>
  </div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function (event) {
  navbarToggleSidebar();
  navActivePage();
});
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID 

<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script>

--> <script type="text/javascript" src="./main.85741bff.js"></script></body>

</html>