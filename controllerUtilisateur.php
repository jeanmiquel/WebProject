<?php 

define('ROOT', dirname(__FILE__));
define('DS', dirname(DIRECTORY_SEPARATOR));
define('MODEL_PATH', ROOT . DS . 'model' . DS);
define('VIEW_PATH', ROOT . DS . 'view' . DS);

require_once '../model/ModeleUtilisateur.php';


    $pseudo= $_POST['pseudo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail= $_POST['mail'];
    $mdp = $_POST['mdp'];


    if($pseudo != NULL AND $mdp != NULL AND $nom != NULL AND $mail != NULL AND $prenom != NULL AND $mail == $_POST['mail_confirm'])

    {
		 
        $tab=array(
            'nom' => $nom,
            'prenom' => $prenom,
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'mail' => $mail
        );

        ModeleUtilisateur::AjouterUtilisateur($tab);

        header('Location: ../accueil.php');

    }

    else
	{ 
		$message='Formulaire mal rempli';
        echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}

    

?>