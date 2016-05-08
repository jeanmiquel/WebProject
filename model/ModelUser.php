<?php


class ModelUser {


    /**
    *Param: None
    *Return: The connection with the DB
    **/
    public static function getDB() {

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '',   $pdo_options); //Connection BD

        return $bd;

    }


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
        
        $req = $bd->prepare('INSERT INTO utilisateur ( nomUser, prenomUser, pseudoUser, mdpUser, mailUser) VALUES(:lastname, :firstname, :pseudo, :password, :mail)');

        $req->execute($tab); //Execute the insertion
			

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



    ##############################################################################
    ############################### SETTERS ######################################
    ##############################################################################


    /**
    *Param: array containing the information about the current user
    *Return: Nothing
    **/
    public static function setName($user)
    {
        $bd = self::getDB(); //DB Connection

        $req=$bd->prepare('UPDATE Utilisateur SET nomUser = :name WHERE idUser = :id'); //Prepare the update the lastname of the target user

        $req->execute($user); //Execute the update

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

        $req->closeCursor();

    }

}

?>