<?php

include('includes/init.php');

if(Input::has('store'))
    MainController::store();
else
    MainController::create();

?>