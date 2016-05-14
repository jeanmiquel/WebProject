

<!--CONTROLLER TO DISCONNECT THE CURRENT USER (UNSET COOKIES)-->


<?php

//Update the time value of all the cookies and set them to a negative value to delete them

setcookie("pseudo",NULL,-1, "/", null,false,true);
setcookie("password","",-1, "/", null,false,true);
setcookie("id","",-1, "/", null,false,true);
setcookie("mail","",-1, "/",null,false,true);
setcookie("lastname","",-1, "/", null,false,true);
setcookie("firstname","",-1, "/", null,false,true);

header('Location: ../view/index.php');

?>