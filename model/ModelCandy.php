<?php


	class ModelCandy {


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
		*Param: array containing the inputed infos for the new candy
		*Return: Nothing
		**/
		public static function addCandy($candy) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('INSERT INTO Bonbon (nomBonbon, saveur, marque, prixUnit, description) VALUES (:name, :flavor, :brand, :price, :descr)');

			$req->execute($candy);

			$req->closeCursor();

		}

		/**
		* Param: None
		* Return: all the candies in the DB
		**/
		public static function getAllCandies() {

			$bd = self::getDB(); //Connection

			$req = $bd->query('SELECT * FROM Bonbon ORDER BY nomBonbon'); //Selection of the total candies counting

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the first value of the list

			$req->closeCursor();

		}


		/**
		*Param: name used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByName($search) {

			$bd = self::getDB(); //Conneciton

			$req = $bd->prepare('SELECT * FROM Bonbon WHERE nomBonbon LIKE "%":name"%" '); //Prepare the selection

			$req->execute($search); //Execution of the request

			$data = $req->fetchAll(); //List all the result in array

			return $data; //Return the array

			$req->closeCursor();
		}

		/**
		*Param: brand used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByBrand($search) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM Bonbon WHERE marque LIKE "%":brand"%" '); //Preparation of the selection

			$req->execute($search); //Execution

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the array

			$req->closeCursor();
		}

		/**
		*Param: flavor used to search in the DB
		*Return: Array with all the datas about target candies
		**/
		public static function SearchByFlavor($search) {

			$bd = self::getDB(); //Connection

			$req = $bd->prepare('SELECT * FROM Bonbon WHERE saveur LIKE "%":flavor"%" '); //Preparation of the selection

			$req->execute($search); //Execution

			$data = $req->fetchAll(); //List result in array

			return $data; //Return the array

			$req->closeCursor();
		}


		/*****************************************
		*****************GETTERS******************
		*****************************************/


		public static function getCandyName($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		); 

				$bd = self::getDB();

				$req = $bd->prepare('SELECT nomBonbon FROM Bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				echo $data['nomBonbon']; //Print

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyFlavor($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		);

				$bd = self::getDB(); 

				$req = $bd->prepare('SELECT saveur FROM Bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Execution of the request
				$data = $req->fetch();

				echo $data['saveur']; //Print

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyBrand($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		); 

				$bd = self::getDB();

				$req = $bd->prepare('SELECT marque FROM Bonbon WHERE idBonbon = :id'); //Preparation of the selection 

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				echo $data['marque']; //Print

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyPrice($id) {

			try
        	{	
        		//Array containing the ID parameter, will be used for the execution as a parameter
        		$tab=array(
            	'id' => $id
        		);

				$bd = self::getDB();

				$req = $bd->prepare('SELECT prixUnit FROM Bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				echo $data['prixUnit']; //Print

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

		public static function getCandyDesc($id) {

			try
        	{	

        		$tab=array(
            	'id' => $id
        		); //Array containing the ID parameter, will be used for the execution as a parameter

				$bd = self::getDB();

				$req = $bd->prepare('SELECT description FROM Bonbon WHERE idBonbon = :id'); //Preparation of the selection

				$req->execute($tab); //Exection of the request
				$data = $req->fetch();

				echo $data['description']; //Print

				$req->closeCursor(); 

			}
        	catch(Exception $e)
        	{
            	die('Erreur : '.$e->getMessage()); 
            
        	}
		}

	}