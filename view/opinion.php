

<!--PAGE WITH ALL THE OPINIONS ABOUT ONE CANDY-->


        
    <?php include ('header.php'); ?>


       <!--OPINION CATALOG-->

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
    			<td>",$opinion[1],"</td>
    			<td>",$opinion[0],"</td>
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

		    	echo 
		    	"<div id='opButton'>
			    	<form class= 'navbar-form navbar-left' action='../controller/ControllerOpinion.php' method='POST'>
			            <input type='hidden' value='addOpinion' name='action'>
			            <input type='hidden' value=",$candy," name='candy'>
			            <input type='hidden' value=",$user," name='user'>
			            <input type='text' name='opinion' id='opinion' class='form-control' placeholder='Comment here...'>
			            <button type='submit' class='btn btn-default' >Add your opinion</button>
			   		</form>
			   		<form class= 'navbar-form navbar-left' action='../controller/ControllerOpinion.php' method='POST'>
			   			<input type='hidden' value='deleteOpinion' name='action'>
			            <input type='hidden' value=",$candy," name='candy'>
			            <input type='hidden' value=",$user," name='user'>
			   			<button type='submit' class='btn btn-default'>Delete your opinion</button>
			        </form>
			    </div>";
		    }

		?>

    </body>

    <?php include ('footer.php'); ?>

</html>