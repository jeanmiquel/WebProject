

<!--HOME PAGE OF THE WEB SITE-->


<!DOCTYPE html>
<html lang="en">

<?php require_once '../model/ModelCandy.php'; ?>

    <head>
        
    <?php include ('header.php'); ?>

        <title>Test Project</title>

    </head>
                    
		    
    <body>
    
       
        <h1>Achat de friandises en ligne</h1> 
 

	    <!-- Navigation Bar-->

	       <?php include ("nav.php"); ?>

	    <!--Catalogue-->

        <div class="catalogue">
        <table class="table table-bordered">

	    <tr>
        <th>NAME</th>
        <th>UNITARY PRICE</th>
        <th>BRAND</th>
        <th>DESCRIPTION</th>
        </tr>



	    <!-- Print all the candies in the DB with an array form -->  

        <?php 

        $candies = ModelCandy::getAllCandies(); //Call the function to get all the candies in the DB

        foreach($candies as $candy)	//Call each attribute of the Candy Table and echo them with the possibility to add in the user basket
	    {
    	   echo "<tr>
    			<div class='navbar-left'>
    			<td>",$candy['nomBonbon'],
    			"   <||>   Flavor : ",$candy['saveur'];


                //If the user is connected, show the quantity input and the "Add to basket" button
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
    			</div>

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
