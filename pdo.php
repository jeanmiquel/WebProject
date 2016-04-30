<?php 
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bd = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '',   $pdo_options);
?>