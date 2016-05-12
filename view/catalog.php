

<!--CATALOG AFTER EACH RESEARCH DONE WITH THE NAVIGATION BAR-->


    <?php include ('header.php'); ?>


        <!--TOP OF THE PAGE-->

        <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

        <div class="page">

        <div class="global-image">  
            <h1>Your sweety research</h1>
        </div>   


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
    			<td>",$candy['nomBonbon'],"
                 ",$candy['saveur'];"</td>";


                //If the user is connected, show the quantity input and the button "Add"
                if (isset($_COOKIE['pseudo']))
                {

                    $nbBaskets = ModelBasket::NbrBaskets(); //Take the number of current basket of the current user

                    if ($nbBaskets[0] == 1) //If the user has only one current basket
                    {

                        if ((ModelBasket::NbCandy($candy['idBonbon'])[0]) == 0)  //If the candy isn't in the basket, a new table 'ACHETER ' will be created
                        {
                            echo
                            "<form method='POST' action='../controller/ControllerBasket.php'>
                                <input type='number' name='quantity' step='1' class='form-control'>
                                <input type='hidden' name='action' value='addQuantity'>
                                <input type='hidden' name='idCandy' value=",$candy['idBonbon'],">
                                <button type='submit' class='btn btn-default'>Add</button>
                            </form>";
                        }
                        else //If the candy is already in the basket, add will update the basket
                        {
                            echo
                            "<form method='POST' action='../controller/ControllerBasket.php'>
                                <input type='number' name='quantity' step='1' class='form-control'>
                                <input type='hidden' name='action' value='modifyQuantity'>
                                <input type='hidden' name='idCandy' value=",$candy['idBonbon'],">
                                <button type='submit' class='btn btn-default'>Add</button>
                            </form>";
                        }
                    }
                }
                
                echo 
                "<form action='../controller/ControllerOpinion.php' method='POST'>
                <input type='hidden' value='showOpinion' name='action'>
                <button type='submit' name='idCandy' value=",$candy['idBonbon']," class='btn btn-default'>Opinions</button>
                </form>

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

                echo "</tr>";
        }
    ?>

    </table>
    </div>  <!--End of the catalog div-->

    </div> <!--End of the page div-->

	<?php include("footer.php"); ?>
        
    </body>
</html>

