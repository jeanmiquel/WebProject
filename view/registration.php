

<!--REGISTRATION PAGE TO ADD A NEW USER-->


	<?php include ('header.php'); ?>


    <!--TOP OF THE PAGE-->

    <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

    <div class="page">

    <div class="global-image">  
        <h1>Sweety registration</h1>
    </div>   


    <!--Formular-->

    <form class ="formregist" method="POST" action="../controller/ControllerUser.php">

  		<div class="form-group">
    		<label for="pseudo">Username</label>
    		<input type="text" name="pseudo" class="form-control" id="pseudo" style="width:20%">
  		</div>

 		 <div class="form-group">
    		<label for="nom">Last Name</label>
    		<input type="text" name="lastname" class="form-control" id="lastname" style="width:20%">
  		</div>

 		<div class="form-group">
    		<label for="prenom">First Name</label>
    		<input type="text" name="firstname" class="form-control" id="firstname" style="width:20%">
  		</div>

  		<div class="form-group">
    		<label for="mdp">Password</label>
    		<input type="password" name="password" class="form-control" id="password" style="width:20%">
  		</div>

		<div class="form-group">
    		<label for="mail">E-Mail Address</label>
    		<input type="email" name="mail" class="form-control" id="mail" style="width:20%">
  		</div>

  		<div class="form-group">
    		<label for="mail_confirm">E-Mail Confirmation</label>
    		<input type="email" name="mail_confirm" class="form-control" id="mail_confirm" style="width:20%">
  		</div>
 
  		<button type="submit" class="btn btn-default">Submit</button>
      <input type="hidden" value="registration" name="action">

	</form>

  </div> <!--End of the page div-->

	<?php include("footer.php"); ?>

	</body>

</html>