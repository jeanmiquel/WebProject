

<!--PAGE TO CREATE A NEW CANDY-->


	<?php 

  if (isset($_COOKIE['pseudo']))    //URL PROTECTION !! TO PREVENT UNLOGGED PERSON TO COPY/PASTE THE URL AND ACCESS THIS PAGE

  {

        include ('header.php'); ?>



      	<h1 style="margin-left: -220px;">Add a new candy</h1>


          <!--Formular-->

          <form method="POST" action="../controller/ControllerCandy.php">

        		<div class="form-group">
          		<label for="pseudo">Name</label>
          		<input type="text" name="name" class="form-control" id="name" style="width:20%">
        		</div>

       		  <div class="form-group">
          		<label for="nom">Flavor</label>
          		<input type="text" name="flavor" class="form-control" id="flavor" style="width:20%">
        		</div>

       		  <div class="form-group">
          		<label for="prenom">Brand</label>
          		<input type="text" name="brand" class="form-control" id="brand" style="width:20%">
        		</div>

        		<div class="form-group">
          		<label for="mdp">Price</label>
          		<input type="number" name="price" class="form-control" step="0.01" id ="price" style="width:20%"/>
        		</div>

      		  <div class="form-group">
          		<label for="mail">Description</label>
          		<input type="text" name="descr" class="form-control" id="descr" style="width:20%">
        		</div>

        		<button type="submit" class="btn btn-default">Submit</button>
            <input type="hidden" value="addCandy" name="action">


      	</form>

      	<?php include("footer.php"); ?>

      	</body>

      </html>

  <?php

}

?>