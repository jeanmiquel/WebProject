

<!--USER'S MAIL MODIFICATION PAGE-->

    
    <?php include ('header.php'); ?>

    <!--TOP OF THE PAGE-->

    <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

    <div class="page">

    <div class="global-image">  
        <p>E-Mail Modification</p>
     </div>   


    <!--Modification formular-->

    <form class="form-horizontal" method='POST' action="../controller/ControllerUser.php">

      <div class="form-group">
       <label for="mail" class="col-sm-2 control-label">New E-mail address</label>
      <div class="col-sm-10">
       <input type="text" class="form-control" id="mail" name="mail" style="width:20%">
      </div>
    </div>  

    <div class="form-group" style="margin-top: 20px;">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
        <input type="hidden" value="modificationMail" name="action">
      </div>
    </div>
  </form>

  </div> <!--End of the page div-->

  <?php include("footer.php"); ?>


  </body>
</html>