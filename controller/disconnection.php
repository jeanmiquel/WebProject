

<!--CONTROLLER TO DISCONNECT THE CURRENT USER (UNSET COOKIES)-->


<?php

//Update the time value of all the cookies and set them to a negative value to delete them

setcookie("pseudo",NULL,-1, "/WebProject/");
setcookie("password","",-1, "/WebProject/");
setcookie("id","",-1, "/WebProject/");
setcookie("mail","",-1, "/WebProject/");
setcookie("lastname","",-1, "/WebProject/");
setcookie("firstname","",-1, "/WebProject/");
setcookie("status","",-1, "/WebProject/");

header('Location: ../view/index.php');

?>