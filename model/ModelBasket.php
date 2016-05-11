<?php

	require_once 'Model.php';


	class ModelBasket extends Model {


	

		########################################################################################
		################################## ON 'PANIER' TABLE ###################################
		########################################################################################


		/**
		*Param: none
		*Return: nothing, just create a new basket in the DB
		**/
		public static function addBasket($user) {

			$bd = self::getDB();	//Connection

			$req = $bd->prepare('INSERT INTO panier (idUser) VALUES (:id)');	//insertion with a NULL value for the purchase date

			$req->execute($user);

			$req->closeCursor();
		}



		/**
		*Param: none
		*Return: All the baskets in the site
		**/
		public static function getAllBaskets() {

			$bd = self::getDB();	//Connection

			$req = $bd->query('SELECT * FROM panier');	//Select every baskets in the DB

			$data = $req->fetchAll();

			return $data;
		}



		/**
		*Param: None
		*Return: Count the number of non purchased baskets
		**/
		public static function NbrBaskets() {

			$bd = self::getDB();	//Connection

			$user=array( 'id' => $_COOKIE['id']); //Create the parameter

			$req = $bd->prepare('SELECT COUNT(*) FROM panier WHERE dateAchat IS NULL AND idUser = :id');	//Prepare the selection of the number

			$req->execute($user);	//Execute with the current user

			$data = $req->fetch();

			return $data;

		}



		/**
		*Param; Array of an user
		*Return: Nothing, only update the basket date value to the current date
		**/
		public static function validBasket($user) {

			$bd = self::getDB();	//Connection

			$req = $bd->prepare('UPDATE panier SET dateAchat = NOW() WHERE idUser = :idUser'); //Modify the "NULL" date of purchase by the current date

			$req->execute($user);

			$req->closeCursor();
		}


		/**
		*Param; Array of an user
		*Return: Nothing, only delete the basket of the user
		**/
		public static function cancelBasket($user) {

			$bd = self::getDB();	//Connection

			$req = $bd->prepare('DELETE FROM panier WHERE idUser = :idUser'); //Delete the current basket of the user

			$req->execute($user);

			$req->closeCursor();
		}


		/**
		*Param: Array of a user
		*Return: the ID of his current basket
		**/
		public static function getID($user) {

			$bd = self::getDB();	//Connection

			$req = $bd->prepare('SELECT idPanier FROM panier WHERE idUser = :id AND dateAchat IS NULL'); //Prepare the selection

			$req->execute($user);

			$data = $req->fetch();

			return $data;
		}


		/**
		*Param: Array of the basket ID
		*Return: the date of validation of this basket
		**/
		public static function getDate($id) {

			$tab=array( 'id' => $id ); //Array parameter

			$bd = self::getDB();	//Connection

			$req = $bd->prepare('SELECT dateAchat FROM panier WHERE idPanier = :id'); //Prepare the selection

			$req->execute($tab);

			$data = $req->fetch();

			return $data;
		}



		########################################################################################
		################################## ON 'ACHETER' TABLE ##################################
		########################################################################################

		/**
		*Param: Array with all the needed information about a buy
		*Return: Nothing
		**/
		public static function addPurchase($tab) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('INSERT INTO acheter VALUES (:idUser, :idBasket, :idCandy, :quantity) ');	//Prepare the insertion in the purchase table in the DB

			$req->execute($tab); //Execution

			$req->closeCursor();
		}


		/**
		*Param: Array with all the needed information about a purchase
		*Return: Nothing
		**/
		public static function modifyPurchase($tab) {

			try 
			{	

				$bd = self::getDB(); //Connection

				$req = $bd->prepare('UPDATE acheter SET quantite = quantite + :quantity WHERE idPanier = :idBasket AND idBonbon = :idCandy AND idUser = :idUser');	//Prepare the update in the purchase table in the DB

				$req->execute($tab); //Execution

				$req->closeCursor();

			}
			catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}


		/**
		*Param: Array of an user
		*Return: all the information about all his current basket purchases
		**/
		public static function getPurchaseByUser($user) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM acheter WHERE idUser = :idUser'); //Prepare the selection of all information about the current user basket purchases

			$req->execute($user);

			$data = $req->fetchAll();

			return $data;
		}

		/**
		*Param: Array of a basket
		*Return: all the information about all current basket purchases
		**/
		public static function getPurchaseByBasket($basket) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM acheter WHERE idPanier = :id'); //Prepare the selection of all information about the current basket purchases

			$req->execute($basket);

			$data = $req->fetchAll();

			return $data;
		}

		/**
		*Param: candy ID
		*Return: count the number of lines for a specified candy ID
		**/
		public static function NbCandy($candy) {


			//Array parameter
			$user=array( 'id' => $_COOKIE['id'] );

			$tab=array( 'idCandy' => $candy,
						'idUser' => $_COOKIE['id'],
						'idBasket' => self::getID($user)[0] ); //Using another function which also need an array as param

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT COUNT(*) FROM acheter WHERE  idBonbon = :idCandy AND idPanier = :idBasket AND idUser = :idUser' ); //Prepare the selection of all information about the current basket purchases

			$req->execute($tab);

			$data = $req->fetch();

			return $data;

		}


	}