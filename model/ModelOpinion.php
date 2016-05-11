<?php

	class ModelOpinion {


		/**
		* Param: None
		* Return: variable containing the DB Connection
		**/
		public static function getDB() {

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION; //About errors
			$bd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '',   $pdo_options); //Connection BD

			return $bd;

		}


		/**
		* Param: idCandy of the targeted candy
		* Return: all the opinions about the specified candy in the DB
		**/
		public static function getAllOpinions($idCandy) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT contenu,pseudoUser FROM Avis A, Utilisateur U WHERE A.idUser = U.idUSer AND idBonbon = :candy'); //Select all the opinions and the username of the person who commented about a candy

			$req->execute($idCandy); //Execute with the specified idCandy

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the first value of the list

			$req->closeCursor();

		}


		/**
		*Param: Array containing idUser, idCandy and the body of the opinion we want to add
		*Return: Nothing
		**/ 
		public static function addOpinion($newOpinion){

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('INSERT INTO Avis VALUES (:user, :candy, :opinion)'); //Insert the new comment in the DB

			$req->execute($newOpinion); //Execute the request with the parameter opinion

			$req->closeCursor();
		}

		/**
		*Param: ID of a user
		*Return: The number of opinions that the user posted for the specified candy
		**/
		public static function checkOpinion($tab){

			$bd = self::getDB();	//DB Connection

			$req = $bd->prepare('SELECT COUNT(*) FROM Avis WHERE idUser = :idUser AND idBonbon = :idCandy');	//Count how many opinion were posted on this candy by the same user

			$req->execute($tab);

			$data = $req->fetch();

			return $data;
		}


	}

?>

