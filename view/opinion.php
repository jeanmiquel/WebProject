

<!--PAGE WITH ALL THE OPINIONS ABOUT ONE CANDY-->


        
    <?php include ('header.php'); ?>


        <!--TOP OF THE PAGE-->

        <!--Big space to avoid navbar to hide the top of the page (in CSS)-->

        <div class="page">

        <div class="global-image">  
            <p>Sweety comments</p>
        </div>   


       <!--OPINION CATALOG-->

		<div class="catalogue">
        <table class="table table-stripped">

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

		</div> <!--End of the page div-->

		<?php include 'footer.php'; ?>


    </body>

</html>