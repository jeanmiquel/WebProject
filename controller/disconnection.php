

<!--CONTROLLER TO DISCONNECT THE CURRENT USER (UNSET COOKIES)-->


<?php

//Update the time value of all the cookies and set them to a negative value to delete them

setcookie("pseudo",NULL,-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("password","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("id","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("mail","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("lastname","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("firstname","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);
setcookie("status","",-1, "/", "sweetcandy-candyuneed.rhcloud.com",false,true);

header('Location: ../view/index.php');

?>