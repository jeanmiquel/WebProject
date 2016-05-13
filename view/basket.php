

<!--THE CURRENT BASKET OF THE USER-->

        
    <?php include ('header.php'); ?>
    

             <!--TOP OF THE PAGE-->

            <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

            <div class="page">

            <div class="global-image">  
                <h1>Your sweety basket</h1>
            </div>   


        <!--Informations-->

		<div class="catalogue">
            <table class="table table-bordered">

            <tr>
                <th>CANDY NAME</th>
                <th>QUANTITY</th>
                <th>UNITARY PRICE</th>
            </tr>


    		<?php 

                $totalPrice=0; //The price calculated with all the unitary prices of the basket

                foreach ($purchases as $purchase)
                {

                    if (ModelBasket::getDate($purchase[1])[0] == NULL) //Take only the purchases of a basket not validated yet
                    {

                        if ($purchase[3] != 0)  //If the user input a null quantity of candy, doesn't show it in the basket
                        {
                            $Unitprice = ModelCandy::getCandyPrice($purchase['idBonbon'])[0];   //Take the unitary price

                            //Use the purchase variable to show each information and some from the candy table
                    		echo "<tr>
                    			<td>",ModelCandy::getCandyName($purchase['idBonbon'])[0],"</td>
                    			<td>",$purchase[3],"</td>
                                <td>",$Unitprice," €</td>
                    		  	</tr>";

                            $purchasePrice = $Unitprice * $purchase[3]; //Quantity * Unitary Price
                            $totalPrice = $totalPrice + $purchasePrice; //Increase the total price value
                        }
                    }
                }

                echo "<tr>
                      <th>TOTAL PRICE</th>
                       <td>",number_format($totalPrice, 2)," €</td>
                     </tr>";

        	?>

            </table>
        </div>

        <!--Button to commit the basket and purchase the candies-->

            <form class="basketbutton" action='../controller/ControllerBasket.php' method='POST'>
                <input type='hidden' name='action' value='validBasket'>
                <button type="submit" class="btn btn-default">Purchase</button>
            </form>
            <form class="basketbutton" action='../controller/ControllerBasket.php' method='POST'>
                <input type='hidden' name='action' value='cancelBasket'>
                <button type="submit" class="btn btn-default">Cancel</button>
            </form>
        


        </div>  <!--End of the page div-->

        <?php include ('footer.php'); ?>

    </body>

</html>