


<!--CATALOG OF EVERY BASKETS DONE ON THE SITE-->


<?php 

    if (isset($_COOKIE['pseudo']))    //URL PROTECTION !! TO PREVENT UNLOGGED PERSON TO COPY/PASTE THE URL AND ACCESS THIS PAGE

    {
                require_once ('../model/ModelBasket.php');
                require_once ('../model/ModelUser.php');
                require_once ('../model/ModelCandy.php');

                include ('header.php'); ?>


                <!--TOP OF THE PAGE-->

                <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

                <div class="page">

                <div class="global-image">  
                    <h1>Baskets History</h1>
                </div>   



        		<div class="catalogue">
                    <table class="table table-bordered">

                    <tr>
                        <th>USERNAME</th>
                        <th>BASKET ID</th>
                        <th>CANDIES</th>
                    </tr>


            		<?php 

                        $baskets = ModelBasket::getAllBaskets(); //Call the function to return the informations about all DB baskets

                        foreach($baskets as $basket)  //For each user, print each piece of information
                        {
                            if (ModelBasket::getDate($basket[0])[0] != NULL)
                            {
                                echo "<tr>
                    			<td>",ModelUser::getUsername($basket[1])[0],"</td>
                    			<td>",$basket[0],"</td>";

                                $purchases = ModelBasket::getPurchaseByBasket(array( 'id' => $basket[0]));

                                $totalPrice = 0;

                                foreach ($purchases as $purchase)
                                {
                                    echo"<td>",ModelCandy::getCandyName($purchase['idBonbon'])[0],
                                         " x",$purchase[3],
                                         " ",ModelCandy::getCandyPrice($purchase['idBonbon'])[0]," €</td>";

                                    $totalPrice = $totalPrice + ( ModelCandy::getCandyPrice($purchase['idBonbon'])[0] * $purchase[3] ); //Increase the total price value
                                }

                                echo "<td> TOTAL PRICE : ",$totalPrice," €</td></tr>";
                            }
                        }

                	?>

                    </table>
                </div>  <!--End of the catalogue div-->

                </div> <!--End of the page div-->

             <?php include ('footer.php'); ?>

        </body>

    </html>

    <?php
    }
?>
