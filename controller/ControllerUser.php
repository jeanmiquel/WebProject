

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
        $pseudo= htmlspecialchars($_POST['pseudo']));  
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $mail= $_POST['mail'];
        $password = sha1($_POST['password']);   //Crypt the pwd


        //If all the lines in the formular are filled
        if($pseudo != NULL AND $password != NULL AND $lastname != NULL AND $mail != NULL AND $firstname != NULL AND $mail == $_POST['mail_confirm'])
        {

            if (ModelUser::checkUsername($pseudo)[0] == 0)  //If the username isn't already taken
            {
    		 
                 //Creation of an array parameter for the call 'AddUser'
                $tab=array(
                    'lastname' => $lastname,
                    'firstname' => $firstname,
                    'pseudo' => $pseudo,
                    'password' => $password,
                    'mail' => $mail
                );

                ModelUser::AddUser($tab); //Call the model function to create a new user

                echo "<script>alert(\"Registration done, click on OK then log yourself in\")</script>";   //Tell the user that the registration is OK and ask him to log in

                include '../view/connection.php'; //Redirect on the connection page
            }
            else
            {
                $message='<p>Username already taken, please try another one</p>
                <p>Click <a href="../view/registration.php">here</a> to come back</p>';

                echo $message;
            }

        }

        else //If there's an input missing, ask the person to try again and redirect to the registration page
    	{ 
    		$message='<p>Please fill all the lines during your next registration</p>
            <p>Click <a href="../view/registration.php">here</a> to come back</p>';

            echo $message;
    	}

    break;


    #################################################################################
    ######################### DELETE CASE ###########################################
    #################################################################################

    //If the action is to delete the user
    case 'deleteUser':

        $idUser = $_POST['idUser']; //Get the post value of the user from the form

        $user=array(            //Create array parameter for the model function to delete
            'id' => $idUser
            );

        ModelUser::deleteUser($user);   //Call the function from the model

        echo "<script>alert(\"User deleted\")</script>";   //Tell the user that the user is deleted

        include '../view/allProfiles.php'; //Redirect to the profiles

    break;




    #################################################################################
    ######################### MAIL MODIFICATION CASE ################################
    #################################################################################


    //If the action is to modify mail
    case 'modificationMail':

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

           header('Location: ../controller/ControllerProfile.php');
        }
        else //If there's no input
        {
            $message='<p>Please fill all the lines during your next try</p>
            <p>Click <a href="../view/pwdModif.php">here</a> to come back</p>';

            echo $message;
        }

    break;

        


    #################################################################################
    ######################### PSWRD MODIFICATION CASE ###############################
    #################################################################################


    //If the action is to modify password
    case 'modificationPassword':


        //If the user input a new pwd and the confirm
        if(isset($_POST["password"]) and isset($_POST["confirm"]))
        {
            //Get the value
           $password = $_POST["password"];
           $confirm = $_POST["confirm"];

           if ($password == $confirm)
           {
               $pwd=array( //Create the array parameter for the model request
                'password' => $password,
                'id' => $_COOKIE['id']
                );

               ModelUser::setPwd($pwd); //Modify it in the DB

               header('Location: ../controller/ControllerProfile.php');
           }
           else //If the confirm isnt equal to the password
            {
                $message='<p>The password confirm doesnt match</p>
                <p>Click <a href="../view/pwdModif.php">here</a> to come back</p>';

                echo $message;
            }
        }
        else //If there's an input missing
        {
            $message='<p>Please fill all the lines during your next try</p>
            <p>Click <a href="../view/pwdModif.php">here</a> to come back</p>';

            echo $message;
        }
    break;

        
        

    #################################################################################
    ######################### CONNECTION CASE #######################################
    #################################################################################


    //If the action is a connection
    case 'connection':

        //Check there's a pseudo and password input then create a variable for each one
        if(isset($_POST["pseudo"]))
        {
           $pseudo = htmlspecialchars($_POST["pseudo"]);
        }
        if(isset($_POST["password"]))
        {
           $password = sha1($_POST["password"]);
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
                setcookie("pseudo",$data[3],time()+ $expire, "/", null,false,true);
                setcookie("id",$data[0],time()+ $expire, "/", null,false,true);
                setcookie("mail",$data[5],time()+ $expire, "/", null,false,true);
                setcookie("lastname",$data[1],time()+ $expire, "/", null,false,true);
                setcookie("firstname",$data[2],time()+ $expire, "/", null,false,true);
                setcookie("status",$data[6],time()+ $expire, "/", null,false,true);

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