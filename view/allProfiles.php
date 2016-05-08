


<!--CATALOG OF EVERY USERS REGISTRED IN THE SITE-->



<!DOCTYPE html>
<html lang="en">

    <?php require_once ('../model/ModelUser.php'); ?>

    <head>
        
    <?php include ('header.php'); ?>

        <title>Test Project</title>

    </head>
                 

		    
    <body>


        <h1>Achat de friandises en ligne</h1> 


        <!-- Navigation Bar-->

		<?php include ("nav.php"); ?>

		<div class="catalogue">
            <table class="table table-bordered">

            <tr>
                <th>USERNAME</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>E-MAIL ADDRESS</th>
                <th>STATUS</th></tr>


    		<?php 

                $profiles = ModelUser::getProfiles(); //Call the function to return the informations about all DB user

                foreach($profiles as $profile)  //For each user, print each piece of information
                {
                        echo "<tr>
            			<td>",$profile['pseudoUser'],"</td>
            			<td>",$profile['prenomUser'],"</td>
                        <td>",$profile['nomUser'],"</td>
                        <td>",$profile['mailUser'],"</td>
                        <td>",$profile['statusUser'],"</td>
            		  	</tr>"; 
                }

        	?>

            </table>
        </div>

        <?php include ('footer.php'); ?>

    </body>

</html>