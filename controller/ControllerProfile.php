

<!--CONTROLLER TO GET THE INFOS ABOUT THE CURRENT USER (COOKIES)-->


<?php


		//Create an array with all the information about the current user and print the view of his profile

		$profile=array(

        'pseudo' => $_COOKIE['pseudo'],
        'firstname' => $_COOKIE['firstname'],
        'lastname' => $_COOKIE['lastname'],
        'mail' => $_COOKIE['mail'],
        'status' => $_COOKIE['status']

        );

    	include ('../view/profile.php');

?>