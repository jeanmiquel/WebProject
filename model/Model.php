<?php


class Model {

	//PDO CONNECTION TO THE DATABASE THAT WILL BE USED IN EVERY MODELS//

		/**
	    *Param: None
	    *Return: The connection with the DB
	    **/
	    public static function getDB() {

	       $bd = new PDO("mysql:host=127.2.228.2:3306;dbname=sweetcandy;charset=UTF8", "adminaj9VanD", "q56JSrNMK1u3"); //Connection BD

	        return $bd;

	    }
	}


?>