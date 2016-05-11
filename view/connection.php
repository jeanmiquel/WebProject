

<!--CONNECTION PAGE-->


    
    <?php include ('header.php'); ?>


    <!--Connection formular-->

    <form class="form-horizontal" method='POST' action="../controller/ControllerUser.php">

      <div class="form-group">
       <label for="username" class="col-sm-2 control-label">Username</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Username" style="width:20%">
      </div>
    </div>


    <div class="form-group">
      <label for="inputPassword" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="width:20%">
      </div>
    </div>


    <!--The user can be redirectd on the registration page if he doesnt have any account-->
    
    <a class="registrationLink" href="registration.php">You don't have any account ? Registration here</a>
    <div class="form-group" style="margin-top: 20px;">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Connect</button>
        <input type="hidden" value="connection" name="action">
      </div>
    </div>
  </form>



  <?php include("footer.php"); ?>


  </body>
</html>