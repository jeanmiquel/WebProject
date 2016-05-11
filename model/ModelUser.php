<?php


require_once 'Model.php';

class ModelUser extends Model {




    /**
    *Param: None
    *Return: Array with the users in DB and their information
    **/
    public static function getProfiles(){

        $bd = self::getDB(); //DB Connection

        $req = $bd->query('SELECT * FROM Utilisateur'); //Select every users in the DB

        $data = $req->fetchAll(); //List the result of the request in an array

        return $data; //Return this array
    }


    /**
    *param: array containing all the inputed infos about the new user 
    *Return: Nothing
    **/
    public static function AddUser($tab){


        $bd = self::getDB(); //Connection
        
        $req = $bd->prepare('INSERT INTO utilisateur ( nomUser, prenomUser, pseudoUser, mdpUser, mailUser) VALUES(:lastname, :firstname, :pseudo, :password, :mail)');  //Prepare the insertion with the array's values

        $req->execute($tab); //Execute the insertion

        $req->closeCursor();
			
    }


    /**
    *param: array containing the id of the user we want to delete 
    *Return: Nothing, just delete the user
    **/
    public static function deleteUser($tab){


        $bd = self::getDB(); //Connection
        
        $req = $bd->prepare('DELETE FROM utilisateur WHERE idUser = :id');  //Delete the user from the DB

        $req->execute($tab); //Execute the delete

        $req->closeCursor();
            

    }


    

    /**
    *Param: array containing the username of the person who to connect
    *Result: All his informations
    **/
    public static function connection($connection){


        $bd = self::getDB(); //DB Connection


        $req=$bd->prepare('SELECT * FROM Utilisateur WHERE pseudoUser = :pseudo'); //Prepare to select all information about the user 
            

        $req->execute($connection); //Execute the selection


        $data=$req->fetch();    //List in an array the result of the request

        return $data;

    }

    /**
    *Param: the username of a user
    *Return: the number of DB users with the same username than the user in parameter
    **/
    public static function checkUsername($name)
    {
        $bd = self::getDB(); //Connection

        $user=array( 'username' => $name ); //Array parameter for the query

        $req=$bd->prepare('SELECT COUNT(*) FROM Utilisateur WHERE pseudoUser = :username'); //Count the users with the same username

        $req->execute($user);

        $data = $req->fetch();  //Array with the result

        return $data;
    }





    ##############################################################################
    ############################### GETTERS ######################################
    ##############################################################################


    public static function getUsername($id) {

        try
            {   
                //Array containing the ID parameter, will be used for the execution as a parameter
                $user=array(
                'id' => $id
                );

                $bd = self::getDB();

                $req = $bd->prepare('SELECT pseudoUser FROM Utilisateur WHERE idUser = :id'); //Preparation of the selection

                $req->execute($user); //Exection of the request

                $data = $req->fetch();

                return $data;

                $req->closeCursor(); 

            }
            catch(Exception $e)
            {
                die('Erreur : '.$e->getMessage()); 
            
            }
    }



    ##############################################################################
    ############################### SETTERS ######################################
    ##############################################################################


    /**
    *Param: array containing the information about the current user
    *Return: Nothing
    **/
    public static function setPwd($pwd)
    {
        $bd = self::getDB(); //DB Connection

        $req=$bd->prepare('UPDATE Utilisateur SET mdpUser = :password WHERE idUser = :id'); //Prepare the update the lastname of the target user

        $req->execute($pwd); //Execute the update

        $req->closeCursor();

    }

    /**
    *Param: array containing the information about the current user
    *Return: Nothing
    **/
    public static function setMail($user)
    {
        $bd = self::getDB(); //DB Connection

        $req=$bd->prepare('UPDATE Utilisateur SET mailUser = :mail WHERE idUser = :id'); //Prepare the update the mail of the target user

        $req->execute($user); //Execute the update

        setcookie("mail",$user['mail'],time()+ (3600*24*30),"/WebProject-masterV1/"); //Update the cookie

        $req->closeCursor();

    }

}

?>