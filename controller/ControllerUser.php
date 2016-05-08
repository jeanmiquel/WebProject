

<!-- CONTROLLER OF THE USER-->

<?php 

require_once '../model/ModelUser.php';



//Get the value of the input action in the view and create an action variable
if(isset($_POST["action"]))
    {
       $action = $_POST["action"];
    }



//Check the value of the action variable and do the specified calls
switch($action) {


    #################################################################################
    ######################### REGISTRATION CASE #####################################
    #################################################################################

    //If the action is a registration
    case 'registration':


        //Creation of variable for all the inputs from the formular
        $pseudo= $_POST['pseudo'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mail= $_POST['mail'];
        $password = $_POST['password'];


        //If all the lines in the formular are filled
        if($pseudo != NULL AND $password != NULL AND $lastname != NULL AND $mail != NULL AND $firstname != NULL AND $mail == $_POST['mail_confirm'])

        {
    		 
             //Creation of an array parameter for the call 'AddUser'
            $tab=array(
                'lastname' => $lastname,
                'firstname' => $firstname,
                'pseudo' => $pseudo,
                'password' => $mdp,
                'mail' => $mail
            );

            ModelUser::AddUser($tab); //Call the model function to create a new user

            header('Location: ../view/index.php'); //Redirect on the index page

        }

        else //If there's an input missing, ask the person to try again and redirect to the registration page
    	{ 
    		$message='<p>Please fill all the lines during your next registration</p>
            <p>Click <a href="../view/registration.php">here</a> to come back</p>';

            echo $message;
    	}

    break;




    #################################################################################
    ######################### MODIFICATION CASE #####################################
    #################################################################################


    //If the action to modify a user
    case 'modification':


        //If the user input a new name
        if(isset($_POST["name"]))
        {
            //Get the value
           $name = $_POST["name"];

           $user=array( //Create the array parameter for the model request
            'name' => $name,
            'id' => $_COOKIE['id']
            );

           ModelUser::setName($user); //Modify it in the DB

        }

        //If the user input a new email address
        if(isset($_POST["mail"]))
        {
            //Get the value
           $mail = $_POST["mail"];

           $user=array( //Create the array parameter for the model request
            'mail' => $mail,
            'id' => $_COOKIE['id']
            );

           ModelUser::setMail($user);   //Modify it in the DB
        }

        
        header('Location: ../controller/disconnection.php');




    #################################################################################
    ######################### CONNECTION CASE #######################################
    #################################################################################


    //If the action is a connection
    case 'connection':


        //Check there's a pseudo and password input then create a variable for each one
        if(isset($_POST["pseudo"]))
        {
           $pseudo = $_POST["pseudo"];
        }
        if(isset($_POST["password"]))
        {
           $password = $_POST["password"];
        }



        if (empty($pseudo) || empty($password) ) //If there's an input missing

        {

            $message = '<p>Please fill all the lines during your next connection</p>
            <p>Click <a href="../view/connection.php">here</a> to come back</p>';

            echo $message;

        }

        else //Check if the password is correct (Access OK)

        {

            //Creation of an array parameter for the call 'connection'
            $tab=array(
                'pseudo' => $pseudo,
                );


            $data=ModelUser::connection($tab); //Call the model function to connect the user


            if ($data['mdpUser'] == $password) //If the resulting password is the same than the input

            {

                //Creation of the user cookie with the received values from the model
                $expire = 3600*24*30;
                setcookie("pseudo",$data[3],time()+ $expire, "/WebProject-masterV1/");
                setcookie("id",$data[0],time()+ $expire, "/WebProject-masterV1/");
                setcookie("mail",$data[5],time()+ $expire, "/WebProject-masterV1/");
                setcookie("lastname",$data[1],time()+ $expire, "/WebProject-masterV1/");
                setcookie("firstname",$data[2],time()+ $expire, "/WebProject-masterV1/");
                setcookie("status",$data[6],time()+ $expire, "/WebProject-masterV1/");

                header('Location: ../view/index.php');

                
            }

            else //If the passwords don't match (Access not ok)

            {

            $message= '<p>Your password may be incorrect, please fix this and try again</p>
            <p>Click <a href="../view/connection.php">here</a> to come back</p>';

            echo $message;

            }


        }

    break; 



}

    

?>