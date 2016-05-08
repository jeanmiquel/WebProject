

<!--THE PROFILE OF THE CONNECTED USER-->


<!DOCTYPE html>
<html lang="en">


    <head>
        
    <?php include ('header.php'); ?>

        <title>Test Project</title>

    </head>
                 

		    
    <body>


        <h1>Achat de friandises en ligne</h1> 


        <!-- Navigation Bar-->

		<?php include ("nav.php"); ?>


        <!--Informations-->

		<div class="catalogue">
            <table class="table table-bordered">

            <tr>
                <th>USERNAME</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>E-MAIL ADDRESS</th>
                <th>STATUS</th></tr>


    		<?php 

                //Use the profile variable initialized in the Controller Profile
        		echo "<tr>
        			<td>",$profile['pseudo'],"</td>
        			<td>",$profile['firstname'],"</td>
                    <td>",$profile['lastname'],"</td>
                    <td>",$profile['mail'],"</td>
                    <td>",$profile['status'],"</td>
        		  	</tr>"; 

        	?>

            </table>
        </div>


        <!--Button to modify the email address or the lastname-->

        <form action='../view/userModification.php'>
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Modify</button>
        </div>
        </form>

        <?php include ('footer.php'); ?>

    </body>

</html>