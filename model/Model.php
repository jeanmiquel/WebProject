<?php


class Model {

	//PDO CONNECTION TO THE DATABASE THAT WILL BE USED IN EVERY MODELS//

		/**
	    *Param: None
	    *Return: The connection with the DB
	    **/
	    public static function getDB() {

	        
	        $bd = new PDO("mysql:host=127.3.128.130:3306;dbname=sweetypleasure;charset=UTF8", "adminEYqiZhJ", "Nn-mRyykPCGc"); //Connection BD

	        return $bd;

	    }
	}


?>
