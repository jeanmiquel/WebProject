

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

            include ('../view/opinion.php'); //Show the opinion page with the corresponding cases return 

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

                $check=array(   
                    'idUser' => $_POST['user'],
                    'idCandy' => $_POST['candy']
                    );
	

		         if (ModelOpinion::checkOpinion($check)[0] == 0)  //If the user hasn't alreayd posted a comment for this candy
                {
                    $tab=array(      //Create the array parameter for the model request addOPinion
                    'opinion' => $opinion,
                    'user' => $_POST['user'],
                    'candy' => $_POST['candy']
                    );

                    $idCandy=array(   //Create array parameter for the getAllOpinion
                        'candy' => $_POST['candy']
                        );

                    ModelOpinion::addOpinion($tab); //Add the opinion on the DB

                    echo "<script>alert(\"Opinion added\")</script>"; //Tell the user that the opinion is added


                    $opinions=ModelOpinion::getAllOpinions($idCandy); //Reload all the opinions fir the candy

                    include '../view/opinion.php';  //Show the page of the opinions
                }
                else //Tell him he can't post again and redirect him to the index
                {
                     $message='<p>You have already posted an opinion for this candy</p>
                    <p>Click <a href="../view/index.php">here</a> to come back to the catalog</p>';

                    echo $message;
                }
            }
            else //Tell him the comment is missing and redirect him
            {
                 $message='<p>Comment missing</p>
                    <p>Click <a href="../view/index.php">here</a> to come back to the catalog</p>';

                    echo $message;
            }
        break;


        #################################################################################
        ######################### DELETE OPINION CASE ###################################
        #################################################################################

        //If the action is to delete an opinion
        case 'deleteOpinion':


            $check=array(
                    'idUser' => $_POST['user'],
                    'idCandy' => $_POST['candy']
                    );

            if (ModelOpinion::checkOpinion($check)[0] == 1)  //If the user has alreayd posted a comment for this candy
            {       

                $idCandy = array( 'candy' => $_POST['candy'] );   //Array parameter to reload every opinions

                ModelOpinion::deleteOpinion($check);    //Delete the opinion

                echo "<script>alert(\"Opinion deleted\")</script>"; //Tell the user that the opinion is deleted

                $opinions=ModelOpinion::getAllOpinions($idCandy); //Reload all the opinions for the candy

                include '../view/opinion.php';
            }
            else
            {
                 $message='<p>There s no opinion to delete</p>
                    <p>Click <a href="../view/index.php">here</a> to come back to the catalog</p>';

                    echo $message;
            }

        break;
    }

    

    

?>