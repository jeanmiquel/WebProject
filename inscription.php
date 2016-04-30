<!DOCTYPE html>

<html lang="en">

	<?php include ('header.php'); ?>

	<head>

    	<title>Inscription</title>

	</head>

	<body>
    
  	 <h1>Achat de friandises en ligne</h1>
  

    <!-- Navigation Bar-->

    <?php include ("nav.php"); ?>


	<h1 style="margin-left: -220px;">Inscription</h1>


    <!--Formulaire-->

    <form method="POST" action="controller/controllerUtilisateur.php">

  		<div class="form-group">
    		<label for="pseudo">Nom d'utilisateur</label>
    		<input type="text" name="pseudo" class="form-control" id="pseudo" style="width:20%">
  		</div>

 		 <div class="form-group">
    		<label for="nom">Nom</label>
    		<input type="text" name="nom" class="form-control" id="nom" style="width:20%">
  		</div>

 		<div class="form-group">
    		<label for="prenom">Prénom</label>
    		<input type="text" name="prenom" class="form-control" id="prenom" style="width:20%">
  		</div>

  		<div class="form-group">
    		<label for="mdp">Mot de passe</label>
    		<input type="password" name="mdp" class="form-control" id="mdp" style="width:20%">
  		</div>

		<div class="form-group">
    		<label for="mail">Adresse mail</label>
    		<input type="email" name="mail" class="form-control" id="mail" style="width:20%">
  		</div>

  		<div class="form-group">
    		<label for="mail_confirm">Confirmation mail</label>
    		<input type="email" name="mail_confirm" class="form-control" id="mail_confirm" style="width:20%">
  		</div>
 
  		<button type="submit" class="btn btn-default">Valider</button>

	</form>

	<?php include("footer.php"); ?>

	</body>

</html>