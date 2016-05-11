

<!--THE PROFILE OF THE CONNECTED USER-->

        
    <?php include ('header.php'); ?>


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


        <!--Button to modify the email address or the password-->

        <div align="center">
        <a type="button" class="btn btn-default" href="../view/pwdModif.php">Modify Password</a>
        <a type="button" class="btn btn-default" href="../view/mailModif.php">Modify E-mail address</a>
        </div>

        <?php include ('footer.php'); ?>

    </body>

</html>