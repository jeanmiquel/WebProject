<?php


class Model {

	//PDO CONNECTION TO THE DATABASE THAT WILL BE USED IN EVERY MODELS//

		/**
	    *Param: None
	    *Return: The connection with the DB
	    **/
	    public static function getDB() {

	        
	        $bd = new PDO("mysql:host=localhost;dbname=projetweb;charset=UTF8", "root", ""); //Connection BD in local

	        return $bd;

	    }
	}


?>
