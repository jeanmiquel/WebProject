

<!--THE CONTROLLER OF THE CANDIES-->


<?php

	require '../model/ModelCandy.php';


	//Get the value of the input action in the view and create an action variable
	if(isset($_POST["action"]))
	{
	     $action = $_POST["action"];
	}


	//Check the value of the action variable and do the specified calls
	switch($action) {



		#################################################################################
   	 	######################### ADD CANDY CASE ########################################
    	#################################################################################


		//If the action is to add a new candy by the admin
		case 'addCandy':

		//Creation of variable for all the inputs from the formular
	        $name= $_POST['name'];
	        $flavor = $_POST['flavor'];
	        $brand = $_POST['brand'];
	        $price= $_POST['price'];
	        $descr = $_POST['descr'];


	        //If all the lines in the formular are filled
	        if($name != NULL AND $flavor != NULL AND $brand != NULL AND $price != NULL AND $descr != NULL)

	        {


	    		 
	             //Creation of an array parameter for the call 'AddCandy'
	            $tab=array(
	                'name' => $name,
	                'flavor' => $flavor,
	                'brand' => $brand,
	                'price' => $price,
	                'descr' => $descr
	            );

	            ModelCandy::addCandy($tab); //Call the model function to create a new candy

	            header('Location: ../view/index.php'); //Redirect on the index page

	        }

	        else //If there's an input missing, ask the person to try again and redirect to the new candy formular page
	    	{ 
	    		$message='<p>Please fill all the lines to add a new candy</p>
	            <p>Click <a href="../view/newCandy.php">here</a> to come back</p>';

	            echo $message;
	    	}

	    break;



	    #################################################################################
   	 	######################### NAME RESEARCH CASE ####################################
    	#################################################################################


       	//If the action is to search by name, create a parameter for the model and call the name research of the model
	   	case 'nameSearch':

    	   $name = $_POST['name']; //Get the input value

    	   $tab=array(		//Create an array that will be the parameter for the request in the model
                'name' => $name,
        	   );

    	   $candies = ModelCandy::searchByName($tab);	//Call the model function

    	   include ('../view/catalog.php');	//Show the catalog with the model return

	   	break;



	   	#################################################################################
   	 	######################### BRAND RESEARCH CASE ###################################
    	#################################################################################


       	//If the action is to search by brand, create a parameter for the model and call the brand research of the model
	   	case 'brandSearch':

    	   $brand = $_POST['brand']; //Get the input value

    	   $tab=array(		//Create an array that will be the parameter for the request in the model
                'brand' => $brand,
        	   );

    	   $candies = ModelCandy::searchByBrand($tab);	//Call the model function

    	   include ('../view/catalog.php');	//Show the catalog with the model return

	   	break;




	   	#################################################################################
   	 	######################### FLAVOR RESEARCH CASE ##################################
    	#################################################################################


        //If the action is to search by flavor, create a parameter for the model and call the flavor research of the model
	   	case 'flavorSearch':

    	   $flavor = $_POST['flavor'];	//Get the input value

    	   $tab=array(		//Create an array that will be the parameter for the request in the model
                'flavor' => $flavor,
        	   );

    	   $candies = ModelCandy::searchByFlavor($tab);	//Call the model function

    	   include ('../view/catalog.php');	//Show the catalog with the model return

	   	break;

	}

?>


