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



  <title>Action livre d'or</title>  

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
        <p>Merci pour ton commentaire !</p>
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
          <a class="fa-icon" href="https://www.instagram.com/" title="">
            <i class="fa fa-instagram"></i>
          </a>
          <a class="fa-icon" href="https://dribbble.com/" title="">
            <i class="fa fa-dribbble"></i>
          </a>
          <a class="fa-icon" href="https://twitter.com/" title="">
            <i class="fa fa-twitter"></i>
          </a>
        </p>
        <p> La Couleur | Website created by Anouk UBO |<a href="./inscription.php" title=""> Inscription</a></p>
      </nav>  
    </div> 
  </nav>
</header>
<main class="" id="main-collapse">

<div class="row">
<?php
if($_POST){
$num=htmlspecialchars(addslashes($_POST['num']));
$mdp=htmlspecialchars(addslashes($_POST['mdp']));
$text=htmlspecialchars(addslashes($_POST['text']));
$nom=htmlspecialchars(addslashes($_POST['nom']));
$prenom=htmlspecialchars(addslashes($_POST['prenom']));
$mail=htmlspecialchars(addslashes($_POST['mail']));

if(!$num==NULL && !$mdp==NULL && !$text==NULL && !$nom==NULL && !$prenom==NULL && !$mail==NULL ){ //si tout les champs rempli 
	$sql="SELECT * FROM T_VISITEUR_VIS WHERE VIS_NUM='".$num."'and VIS_MDP='".$mdp."';";
	$result = $mysqli->query($sql);//requete verifiant si le num ticket et mot de passe associé existe
	if($result!=false && $result->num_rows == 1){

      $sql4="SELECT VIS_NUM FROM T_COMMENTAIRE_COM WHERE VIS_NUM='$num';";
      $result4 = $mysqli->query($sql4);//requete verif pas de commentaire déjà poster
      if($result4 != false && $result4->num_rows == 0){ //pas bon

      		$req="SELECT VIS_NUM from T_VISITEUR_VIS where VIS_NUM='$num' and vis_mdp='$mdp' and NOW()>=vis_dateheure and NOW()<= (select timestampadd(hour,3, vis_dateheure) from T_VISITEUR_VIS where vis_num='$num' and vis_mdp='$mdp');"; //requete verif ben dans les 3 h
      		$result1 = $mysqli->query($req);

      		if($result1!=false && $result1->num_rows == 1){//si le temps est bien inférieur à trois heure
      			$req1="INSERT into T_COMMENTAIRE_COM values (NULL,curdate(),'$text','$num','C');"; //creation commentaire
            $req2="UPDATE T_VISITEUR_VIS set vis_nom ='".$nom."', vis_prenom ='".$prenom."', vis_mail ='$mail' where vis_num ='$num' and vis_mdp ='$mdp' and NOW()>=vis_dateheure and NOW()<= (select timestampadd(hour,3, vis_dateheure) from T_VISITEUR_VIS where vis_num='$num' and vis_mdp ='$mdp');"; //mise à jour données dans vis
            
      			
      			$result2= $mysqli->query($req1);
      			$result3 = $mysqli->query($req2);
      			if ($result3 == false || $result2 == false) //Erreur lors de l’exécution de la requête
      			{
      				// La requête a echoué
      				echo "Un Problème est survenu de notre côté veuillez recommencer \n";
      				$sql5="DELETE from T_COMMENTAIRE_COM WHERE VIS_NUM='$num';";
      				$result7 = $mysqli->query($sql5); //suppresion commentaire si update echoué
      				if ($result7 == false) //Erreur lors de l’exécution de la requête
      				{
      				// La requête a echoué
      				echo "Query: je ne fais pas le delete  " . $sql . "\n";
      				echo "Errno: " . $mysqli->errno . "\n";
      				echo "Error: " . $mysqli->error . "\n";
      				}
      				exit;
      			}
      			else //Requête réussie
      			{?>       <div class="col-xs-12 col-md-6">
      			          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
      			          </div>
      			<div class="col-xs-12 col-md-4 section-container-spacer">
      			            <h1><br></h1>
      			            <h1><br></h1>
      			<p>Bonjour <?php echo htmlspecialchars($_POST['nom']);?> <?php echo htmlspecialchars($_POST['prenom']); ?>. Merci pour ton commentaire !</p>
      			<p><a href="./index.php" class="btn btn-primary" title="">Retour vers l'accueil</a></p>
      			</div>
      			<?php
      			}
      		}
      		else{ //hors de la plage horraire
      			?>
      			<div class="col-xs-12 col-md-6">
      	          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
      	          </div>
      	          <div class="col-xs-12 col-md-4 section-container-spacer">
      	            <h1><br></h1>
      	            <h1><br></h1>
      	          <p>Vous arrivez trop tard les 3 h pour poster votre commentaire son écoulées.</p>
      	          <p><a href="./livredor.php" class="btn btn-primary" title="">Retour vers le livre d'or</a></p>
      	          </div>
      			<?php
      		}
          }else{ //déjà un commentaire posté
            ?>
            <div class="col-xs-12 col-md-6">
                    <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
                    </div>
                    <div class="col-xs-12 col-md-4 section-container-spacer">
                      <h1><br></h1>
                      <h1><br></h1>
                    <p>Vous avez déjà poster un commentaire .</p>
                    <p><a href="./livredor.php" class="btn btn-primary" title="">Retour vers le livre d'or</a></p>
                    </div>
                    <?php
          }
	}
	else{ //mauvaise données mdp et num pas bon?>
		<div class="col-xs-12 col-md-6">
	          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
	          </div>
	          <div class="col-xs-12 col-md-4 section-container-spacer">
	            <h1><br></h1>
	            <h1><br></h1>
	          <p>Le mot de passe et le numéro ne condorde pas. Vous ne pouvez pas poster de commentaire avec ces identifiants.</p>
	          <p><a href="./livredor.php" class="btn btn-primary" title="">Retour vers le livre d'or</a></p>
	          </div>
	          <?php
	}
}
else { //erreur remplissage formulaire ?>
          <div class="col-xs-12 col-md-6">
          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
          </div>
          <div class="col-xs-12 col-md-4 section-container-spacer">
            <h1><br></h1>
            <h1><br></h1>
          <p>Le formulaire n'a pas été rempli correctement. Vous allez être redirigé, si cela n'as pas lieu cliquer sur le bouton ci-dessous.</p>
          <p><a href="./livredor.php" class="btn btn-primary" title="">Retour vers le livre d'or</a></p>
          </div>
  <?php
}
}
else { //formulaire non rempli?>
          <div class="col-xs-12 col-md-6">
          <img class="img-responsive" alt="" src="./assets/images/capucin.jpg">
          </div>
          <div class="col-xs-12 col-md-4 section-container-spacer">
            <h1><br></h1>
            <h1><br></h1>
          <p>Veuillez remplir complètement le formulaire.</p>
          <p><a href="./livredor.php" class="btn btn-primary" title="">Retour vers le livre d'or</a></p>
          </div>
  <?php
}
//Ferme la connexion avec la base MariaDB*/
$mysqli->close();
?>
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