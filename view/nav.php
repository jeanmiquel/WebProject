

<!--NAVIGATION BAR-->


<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="../view/index.php">Home</a>
        </div>
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        <?php

            require_once ('../model/ModelBasket.php');



            //If the user is connected, show the Profile link to redirect on his own profile page
            if (isset($_COOKIE['pseudo']))
            {

               $user = $_COOKIE['id']; 
               echo  
                "<ul class='nav navbar-nav'>
                    <li class='active'><a href='../controller/ControllerProfile.php''>Profile<span class='sr-only'>(current)</span></a></li>
                </ul>";
            }

        ?>

            <!--Name Research input-->

            <form class="navbar-form navbar-left" role="search" action="../controller/ControllerCandy.php" method="post">
                <input type="hidden" value="nameSearch" name="action">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                        </div>
                <button type="submit" class="btn btn-default" >Search</button>
            </form>

            <!--Flavor Research input-->

            <form class="navbar-form navbar-left" role="search" action="../controller/ControllerCandy.php" method="post">
            <input type="hidden" value="flavorSearch" name="action">
                <div class="form-group">
                    <input type="text" name="flavor" id="flavor" class="form-control" placeholder="Flavor">
                        </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>

            <!--Brand Research input-->

            <form class="navbar-form navbar-left" role="search" action="../controller/ControllerCandy.php" method="post">
            <input type="hidden" value="brandSearch" name="action">
                <div class="form-group">
                    <input type="text" name="brand" id="brand" class="form-control" placeholder="Brand">
                        </div>
                <button type="submit" class="btn btn-default">Search</button>
            </form>


        <div class="login box">
        <?php

            //If the user is connected, show the Disconnection & Settings button for the user to disconnect 
             if (isset($_COOKIE['pseudo']))
            {
                echo "<ul class='nav navbar-nav navbar-right'>
                    <li><a href='../controller/disconnection.php'>Disconnection</a></li>
                    </ul>";


                $nbBaskets = ModelBasket::NbrBaskets(); //Take the number of non purchased baskets of the current user


                    //If the user has only one basket, he cand check it
                 if ($nbBaskets[0] == 1)
                {
                    echo "<form class='navbar-form navbar-left' method='POST' action='../controller/ControllerBasket.php'>
                          <button type='submit' class='btn btn-default'>Check your basket</button>
                          <input type='hidden' value='showBasket' name='action'>
                          </form>";
                }
                else {
                    echo "<form class='navbar-form navbar-left' method='POST' action='../controller/ControllerBasket.php'>
                          <button type='submit' class='btn btn-default'>Create a basket</button>
                          <input type='hidden' value='addBasket' name='action'>
                          </form>";
                }



                //If the user is an administrator, show the settings dropdown button
                if ($_COOKIE['status']=='admin')
                {
                    echo 
                    "<ul class='nav navbar-nav navbar-left'>
                        <li class='dropdown'>
                            <a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>Settings <span class='caret'></span></a>
                            <ul class='dropdown-menu'>
                                <li><a href='../view/newCandy.php'>Add a candy</a></li>
                                <li role='separator' class='divider'></li>
                                <li><a href='../view/allProfiles.php'>All profiles</a></li>
                                <li role='separator' class='divider'></li>
                                <li><a href='../view/allBaskets.php'>Baskets history</a></li>
                            </ul>
                        </li>
                    </ul>";
                }
            }


            //Else show the Connection button for the user to connect
            else
            {
                echo "<ul class='nav navbar-nav navbar-right'>
                    <li><a href='../view/connection.php'>Connection</a></li>
                    <li><a href='../view/registration.php'>Registration</a></li>
                    </ul>";

            }        
        ?>
            
        </div>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
