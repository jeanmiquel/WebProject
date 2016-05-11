<?php


class Model {

	//PDO CONNECTION TO THE DATABASE THAT WILL BE USED IN EVERY MODELS//

		/**
	    *Param: None
	    *Return: The connection with the DB
	    **/
	    public static function getDB() {

	        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	        $bd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '',   $pdo_options); //Connection BD

	        return $bd;

	    }
	}


?>