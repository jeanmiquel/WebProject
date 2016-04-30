<!DOCTYPE html>
<html lang="en">
  <head>
    
    <?php include ('header.php'); ?>

    <title>Connexion</title>

  </head>
  <body>

   <h1>Achat de friandises en ligne</h1>

  <?php include ("nav.php"); ?>


    <!--Formulaire de connexion pris sur Bootstrap-->

    <form class="form-horizontal">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Nom d'utilisateur</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Nom d'utilisateur" style="width:20%">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe" style="width:20%">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Se souvenir de moi
        </label>
      </div>
    </div>
  </div>
  <a class="inscriptionLink" href="inscription.php">Tu n'as pas de compte ? Inscris-toi !</a>
  <div class="form-group" style="margin-top: 20px;">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Se connecter</button>
    </div>
  </div>
</form>

<?php include("footer.php"); ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="view/js/bootstrap.min.js"></script>
  </body>