

<!--HOME PAGE OF THE WEB SITE-->


<?php require_once '../model/ModelCandy.php';
	  require_once '../model/ModelBasket.php'; ?>

   <body>
    <?php include ('header.php'); ?>


        <!--TOP OF THE PAGE-->

        <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

        <div class="page">

        <div class="global-image">  
            <h1>Welcome to Candies U Need</h1>
        </div>   

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
    			<td><div class='navbar-left candy'>"   /**print the name and the flavor**/
                ,$candy['nomBonbon'],"
    			 ",$candy['saveur'];


                //If the user is logged in, show the quantity input and the "Add to basket" button
                if (isset($_COOKIE['pseudo']))

                
                {

                	$nbBaskets = ModelBasket::NbrBaskets();	//Take the number of current basket of the current user

                	if ($nbBaskets[0] == 1)	//If the user has only one current basket
                	{

                        if ((ModelBasket::NbCandy($candy['idBonbon'])[0]) == 0)  //If the candy isn't in the basket, a new table 'ACHETER ' will be created
                        {
                            echo
                            "<form class='candy' method='POST' action='../controller/ControllerBasket.php'>
    	        				<input type='number' name='quantity' step='1' class='form-control'>
    	        				<input type='hidden' name='action' value='addQuantity'>
    	        				<input type='hidden' name='idCandy' value=",$candy['idBonbon'],">
    	        				<button type='submit' class='btn btn-default'>Add</button>
    	        			</form>";
                        }
                        else //If the candy is already in the basket, add will update the basket
                        {
                            echo
                                "<form class='candy' method='POST' action='../controller/ControllerBasket.php'>
                                <input type='number' name='quantity' step='1' class='form-control'>
                                <input type='hidden' name='action' value='modifyQuantity'>
                                <input type='hidden' name='idCandy' value=",$candy['idBonbon'],">
                                <button type='submit' class='btn btn-default'>Add</button>
                            </form>";
                        }
	        		}
                }
                        // Opinion button, sending value the candy's ID for the Controller
    			echo 
                "<form action='../controller/ControllerOpinion.php' method='POST'>
                    <input type='hidden' value='showOpinion' name='action'>
    				<button type='submit' name='idCandy' value=",$candy['idBonbon']," class='btn btn-default'>Opinions</button>
    			</form>
    			</div>

                </div>

    			</td>
    			<td>",$candy['prixUnit']," €</td>
    			<td>",$candy['marque'],"</td>
    			<td>",$candy['description'],"</td>";

                if (isset($_COOKIE['status']))  //If the user is logged in
                {
                    if ($_COOKIE['status'] == 'admin')  //Check if the user is an administrator
                    {
                                    //Add the DELETE button and send the candy's ID for the Controller
                        echo "<td>
                            <form action='../controller/ControllerCandy.php' method='POST' class='formbutton'>
                                <input type='hidden' value='deleteCandy' name='action'>
                                <button type='submit' name='idCandy' value=",$candy['idBonbon']," class='btn btn-default'>Delete</button>
                            </form>
                        </td>";
                    }
                }

    		    echo "</tr>";     /**End of the table line**/
        }

        ?>
    
   
        </table>
        </div>


        </div> <!--End of the page div-->


        <?php include("footer.php"); ?>
        

    </body>
</html>
