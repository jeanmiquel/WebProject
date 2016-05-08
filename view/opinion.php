

<!--PAGE WITH ALL THE OPINIONS ABOUT ONE CANDY-->



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

		<div class="catalogue">
        <table class="table table-bordered">

        <tr>
            <th>USERNAME</th>
            <th>OPINION</th></tr>

		<?php 


		//Use the return of the Model Opinion for each opinions 
		foreach($opinions as $opinion)

		{
    		echo "<tr>
    			<td>",$opinion['pseudoUser'],"</td>
    			<td>",$opinion['contenu'],"</td>
    		  	</tr>";
    	}  

    	?>

    	</table>
    	</div>


		<?php


			//If the user is connected, he can add his opinion about the candy BUT ONLY ONE OPINION CAN BE WRITTEN
			if (isset($_COOKIE['pseudo']))
			{
				
				$user = $_COOKIE['id'];

		    	echo $_COOKIE['pseudo'],
		    	"<form class= 'navbar-form navbar-left' action='../controller/ControllerOpinion.php' method='POST'>
		            <input type='hidden' value='addOpinion' name='action'>
		            <input type='hidden' value=",$candy," name='candy'>
		            <input type='hidden' value=",$user," name='user'>
		            <div class='form-group'>
		                <input type='text' name='opinion' id='opinion' class='form-control' placeholder='Comment here...'>
		            </div>
		            <button type='submit' class='btn btn-default' >Add your opinion</button>
		        </form>";
		    }

	
		include ('footer.php');

		?>

    </body>

</html>