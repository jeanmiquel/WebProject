

<!-- CONTROLLER OF THE BASKET-->


<?php 

require_once '../model/ModelBasket.php';
require_once '../model/ModelCandy.php';



//Get the value of the input action in the view and create an action variable
if(isset($_POST["action"]))
    {
       $action = $_POST["action"];
    }



//Check the value of the action variable and do the specified calls
switch($action) {




    #################################################################################
    ######################### CREATION CASE #########################################
    #################################################################################


    //If the action is a creation
    case 'addBasket':


            //Create the array parameter of the model function
            $user=array(
                'id' => $_COOKIE['id']
                );

            ModelBasket::addBasket($user); //Call the model function to create an empty basket

                
            header('Location: ../view/index.php');


    break;





    #################################################################################
    ######################### ADD QUANTITY CASE #####################################
    #################################################################################


    //If the action is to add the quantity of a candy
    case 'addQuantity':


            //Create an user table for the getID call
            $user=array('id' => $_COOKIE['id'] );


            
            //Create all the variables used for the array parameter
            $idUser = $_COOKIE['id'];
            $idCandy = $_POST['idCandy'];
            $idBasket = ModelBasket::getID($user);  //Get the ID of the current basket of the current user
            $quantity = $_POST['quantity'];


            //Create the array parameter of the model function with the input values in the index page
            $tab=array(
                'idUser' => $idUser,
                'idCandy' => $idCandy,
                'idBasket' => $idBasket[0],
                'quantity' => $quantity
                );

        ModelBasket::addPurchase($tab); //Call the function to add a new purchase in the DB

        echo "<script>alert(\"Candies added\")</script>";   //Tell the user that the candies are in his basket

        include "../view/index.php";

    break;




    #################################################################################
    ######################### MODIFY QUANTITY CASE ##################################
    #################################################################################


    //If the action is to add the quantity of a candy
    case 'modifyQuantity':


            //Create an user table for the getID call
            $user=array(
                'id' => $_COOKIE['id'] 
                );


            
            //Create all the variables used for the array parameter
            $idUser = $_COOKIE['id'];
            $idCandy = $_POST['idCandy'];
            $idBasket = ModelBasket::getID($user);  //Get the ID of the current basket of the current user
            $quantity = $_POST['quantity'];


            //Create the array parameter of the model function with the input values in the index page
            $tab=array(
                'idUser' => $idUser,
                'idCandy' => $idCandy,
                'idBasket' => $idBasket[0],
                'quantity' => $quantity
                );

        ModelBasket::modifyPurchase($tab); //Call the function to add a new purchase in the DB

        echo "<script>alert(\"Candies added\")</script>"; //tell that the candies are added 

        include '../view/index.php';

    break;




    #################################################################################
    ######################### SHOW CASE #############################################
    #################################################################################


    //If the action is to show the basket
    case 'showBasket':

        $idUser = $_COOKIE['id'];

        $user = array ( 'idUser' => $idUser ); //Creation the array parameter

        $purchases = ModelBasket::getPurchaseByUser($user); //Get all the purchases non commited that the user did (or is doing)

        include ('../view/basket.php');

    break;




    #################################################################################
    ######################### VALIDATE CASE #########################################
    #################################################################################


    //If the action is to validate the basket
    case 'validBasket':

        $idUser = $_COOKIE['id'];

        $user = array ( 'idUser' => $idUser ); //Creation the array parameter

        ModelBasket::validBasket($user); //Get all the purchases non commited that the user did (or is doing)

        echo "<script>alert(\"Thanks for your purchase! You'll receive your delivery very soon!\")</script>";

        include '../view/index.php';

    break;



    #################################################################################
    ######################### CANCEL CASE ###########################################
    #################################################################################


    //If the action is to cancel the basket
    case 'cancelBasket':

        $idUser = $_COOKIE['id'];

        $user = array ( 'idUser' => $idUser ); //Creation the array parameter

        ModelBasket::cancelBasket($user); //Get all the purchases non commited that the user did (or is doing)

        header('Location: ../view/index.php');

    break;



}