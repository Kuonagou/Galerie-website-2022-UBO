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



  <title>Livre d'or</title>  

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
        <p>Donne nous ton avis !</p>
      </div>
      <ul class="nav">
       <!--<li><a href="./P_Apropos.php" title="">Notre Galerie</a></li>-->
        <li><a href="./galerie.php" title="">Galerie</a></li>
        <li><a href="./index.php" title="">Accueil</a></li>
        <li><a href="./galerie_exposant.php" title="">Nos Exposants</a></li>
        <li><a class="active" href="./livredor.php" title="">Livre d'or</a></li>
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
        <p> La Couleur | Website created by Anouk UBO</p>
      </nav>  
    </div> 
  </nav>
</header>
<main class="" id="main-collapse">

<div class="col-xs-12 section-container-spacer">
    <h1>Vos Commentaires : </h1> 
  </div>

<table class="table table-hover">
              <tr>
              <th>Posté le</th>
              <th>Commentaire</th>
              <td>Nom</td>
              <td>Prenom</td>
              <td>Mail<td>
              </tr>
        <?php           
          $requete="select com_text, com_dateheure, vis_nom, vis_prenom, vis_mail from T_COMMENTAIRE_COM natural join T_VISITEUR_VIS where com_etat='P'";
          $result1 = $mysqli->query($requete);//requette affichage commentaire posté et valide

          if ($result1 == false) //Erreur lors de l’exécution de la requête
          { // La requête a echoué
          echo "Error: La requête a echoué \n";
          echo "Errno: " . $mysqli->errno . "\n";
          echo "Error: " . $mysqli->error . "\n";
          exit();
          }
          else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
          {
            while ($com = $result1->fetch_assoc())
            {?>
              <tr>
              <th><?php echo $com['com_dateheure'];?></th>
              <td><?php echo $com['com_text'];?></td>
              <td><?php echo $com['vis_nom'];?></td>
              <td><?php echo $com['vis_prenom'];?></td>
              <td><?php echo $com['vis_mail'];?></td>
              </tr> 
            <?php
            }
          }
          $mysqli->close();
          ?>
        </table>

<div class="row">
  <div class="col-xs-12">
    <div class="section-container-spacer"> <!-- formulaire pour saisir son commentaire-->
      <h1>Poster un commentaire</h1>
      <p>Pour pouvoir poster un commentaire vous avez trois heures à partir de votre heure d'entrée dans notre musée, <br>il vous faudra aussi vous munir de votre numéro de visiteur et du mot de passe associé tout deux présent sur votre ticket d'entrée .</br></p>
    </div>
    <div class="section-container-spacer">
       <form action="action_livr.php" class="reveal-content" method="post">
          <div class="row">
            <div class="col-md-5">
              <p>Tout les champs sont obligatoires</p>
              <div class="form-group">
                <p>Nom</p>
                <input type="text" class="form-control" name="nom" placeholder="Richard">
              </div>
              <div class="form-group">
                <p>Prenom</p>
                <input type="text" class="form-control" name="prenom" placeholder="Mathieu">
              </div>
              <div class="form-group">
                <p>Mail</p>
                <input type="email" class="form-control" name="mail" placeholder="mathieu.richard@hotmail.fr">
              </div>
              </div>
              <div class="col-md-6">
                <p><br> </p>
              <div class="form-group">
                <p>Numéro de Visiteur</p>
                <input type="text" class="form-control" name="num" placeholder="15">
              </div>
              <div class="form-group">
                <p>Mot de Passe</p>
                <input type="text" class="form-control" name="mdp" placeholder="00541606064">
              </div>
              <div class="form-group">
                <p>Texte du commentaire</p>
                <input type="text" class="form-control" name="text" placeholder="...">
              </div>
              <button type="submit" class="btn btn-primary btn-lg">Poster</button>
            </div>
           </div>
          </div>
        </form>
    </div>
  </div>
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