

<!--CONTROLLER TO DISCONNECT THE CURRENT USER (UNSET COOKIES)-->


<?php

//Update the time value of all the cookies and set them to a negative value to delete them

setcookie("pseudo",NULL,-1, "/WebProject-masterV1/");
setcookie("password","",-1, "/WebProject-masterV1/");
setcookie("id","",-1, "/WebProject-masterV1/");
setcookie("mail","",-1, "/WebProject-masterV1/");
setcookie("lastname","",-1, "/WebProject-masterV1/");
setcookie("firstname","",-1, "/WebProject-masterV1/");
setcookie("status","",-1, "/WebProject-masterV1/");

header('Location: ../view/index.php');

?>