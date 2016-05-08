

<!--CATALOG AFTER EACH RESEARCH DONE WITH THE NAVIGATION BAR-->


<!DOCTYPE html>
<html lang="en">


    <head>
        
    <?php include ('header.php'); ?>

        <title>Test Project</title>
                    
	</head>

	<body>
    
        <h1>Achat de friandises en ligne</h1> 
 

	<!-- Navigation Bar-->

	<?php include ("nav.php"); ?>

	<!--Catalog-->

    <div class="catalogue">
    <table class="table table-bordered">

        <tr>
            <th>NAME</th>
            <th>UNITARY PRICE</th>
            <th>BRAND</th>
            <th>DESCRIPTION</th></tr>


    <!--Show all the information resulting from the Controller Catalog -->

	<?php foreach($candies as $candy)
	{
    	echo "<tr>
    			<td>",$candy['nomBonbon'],
    			"   <||>   Saveur : ",$candy['saveur'];


                //If the user is connected, show the quantity input and the button "Add"
                if (isset($_COOKIE['pseudo']))
                {

                    echo 
                    "<form method='POST' action='../controller/ControllerOpinion.php'>
                        <input type='number'>
                        <button type='submit' class='btn btn-default'>Add</button>
                    </form>";
                }
                
                echo 
                "<form action='../controller/ControllerOpinion.php' method='POST'>
                <input type='hidden' value='showOpinion' name='action'>
                <button type='submit' name='idCandy' value=",$candy['idBonbon']," class='btn btn-default'>Opinions</button>
                </form>

                </td>
    			<td>",$candy['prixUnit']," €</td>
    			<td>",$candy['marque'],"</td>
    			<td>",$candy['description'],"</td>
    		  </tr>";
    }  
    ?>

    </table>
    </div>

	<!--Pagination-->
    
	<nav>
  	<ul class="pager">
    	<li><a href="#">Next page</a></li>
    	<li><a href="#">Previous page</a></li>
  	</ul>
	</nav>

	<?php include("footer.php"); ?>
        
    </body>
</html>

