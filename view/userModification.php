

<!--USER's MODIFICATION PAGE-->


<!DOCTYPE html>
<html lang="en">


  <head>
    
    <?php include ('header.php'); ?>

    <title>Modification</title>

  </head>


  <body>


    <h1>Achat de friandises en ligne</h1>


    <!--Navigation Bar-->

    <?php include ("nav.php"); ?>



    <!--Modification formular-->

    <form class="form-horizontal" method='POST' action="../controller/ControllerUser.php">

      <div class="form-group">
       <label for="name" class="col-sm-2 control-label">Last Name</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="name" name="name" style="width:20%">
      </div>
    </div>


    <div class="form-group">
      <label for="inputEmail" class="col-sm-2 control-label">E-Mail</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="mail" name="mail" style="width:20%">
      </div>
    </div>
    

    <div class="form-group" style="margin-top: 20px;">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <input type="hidden" value="modification" name="action">
      </div>
    </div>
  </form>



  <?php include("footer.php"); ?>


  </body>
</html>