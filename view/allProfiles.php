


<!--CATALOG OF EVERY USERS REGISTRED IN THE SITE-->


    <?php 

    if (isset($_COOKIE['pseudo']))    //URL PROTECTION !! TO PREVENT UNLOGGED PERSON TO COPY/PASTE THE URL AND ACCESS THIS PAGE

    {


            require_once ('../model/ModelUser.php');
                
            include ('header.php'); ?>

                <!--CATALOG-->

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
                                <td>
                                    <form action='../controller/ControllerUser.php' method='POST' class='formbutton'>
                                        <input type='hidden' value='deleteUser' name='action'>
                                        <button type='submit' name='idUser' value=",$profile['idUser']," class='btn btn-default'>Delete</button>
                                    </form>
                                </td>";
                             
                        }

                	?>

                    </table>
                </div>

                <?php include ('footer.php'); ?>

            </body>

        </html>

    <?php

}

?>