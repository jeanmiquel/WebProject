

<!--CONTROLLER OF THE OPINIONS-->


<?php

require_once '../model/ModelOpinion.php';


	//Get the value of the input action in the view and create an action variable
	if(isset($_POST["action"]))
    {
	   $action = $_POST["action"];
    }


    //Check the value of the action variable and do the specified calls
    switch($action) {




        #################################################################################
        ######################### SHOW OPINION CASE #####################################
        #################################################################################

    	//If the action is to show the opinions,check the post and create a parameter for the model and call the opinions getters of the model
    	case 'showOpinion':

			if(isset($_POST["idCandy"])) //Get the input value
			{
				$candy = $_POST["idCandy"];
			}


    		$tab=array(   //Create the array parameter for the model request
        		'candy' => $candy,
    		);

    		$opinions = ModelOpinion::getAllOpinions($tab); //Load all the opinions from the model function

            

    	break;





        #################################################################################
        ######################### ADD OPINION CASE ######################################
        #################################################################################

    	//If the action is to add an opinion,check the post and create a parameter for the model and call the opinion add of the model
    	case 'addOpinion':

    		if(isset($_POST["opinion"]))  //Get the input values
			{
				$opinion = $_POST["opinion"];
                $candy = $_POST["candy"];
			}	

			$tab=array(      //Create the array parameter for the model request
        		'opinion' => $opinion,
                'user' => $_POST['user'],
                'candy' => $_POST['candy']

    		);

    		$newOpinion = ModelOpinion::addOpinion($tab); //Add the opinions from the model function

            $opinions = ModelOpinion::getAllOpinions($tab); //Reload all the opinions

            
        break;


    }

    include ('../view/opinion.php'); //Show the opinion page with the corresponding cases return 

    

?>