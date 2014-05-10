<?php

include('includes/init.php');

if(Input::has('delete'))
    MainController::delete();
else
    MainController::index();

?>