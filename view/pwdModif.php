

<!--USER'S PASSWORD MODIFICATION PAGE-->


    <?php include ('header.php'); ?>

    <!--TOP OF THE PAGE-->

    <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

    <div class="page">

    <div class="global-image">  
        <h1>Password Modification</h1>
    </div>   

    <!--Modification formular-->

    <form class="form-horizontal" method='POST' action="../controller/ControllerUser.php">

      <div class="form-group">
       <label for="password" class="col-sm-2 control-label">New password</label>
      <div class="col-sm-10">
       <input type="password" class="form-control" id="password" name="password" style="width:20%">
      </div>
    </div>


    <div class="form-group">
      <label for="confirm" class="col-sm-2 control-label">Confirm password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="confirm" name="confirm" style="width:20%">
      </div>
    </div>
    

    <div class="form-group" style="margin-top: 20px;">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <input type="hidden" value="modificationPassword" name="action">
      </div>
    </div>
  </form>

  </div> <!--End of the page div-->

  <?php include("footer.php"); ?>


  </body>
</html>