<!--AJoute l'utilisateur-->

<?php


class ModeleUtilisateur {

    public static function AjouterUtilisateur($tab){

        try
        {
            include ('../pdo.php');
        
            $req = $bd->prepare('INSERT INTO utilisateur ( nomUser, prenomUser, pseudoUser, mdpUser, mailUser) VALUES(:nom, :prenom, :pseudo, :mdp, :mail)');
            $req->execute($tab);
			
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
            
        }
    }
}

?>