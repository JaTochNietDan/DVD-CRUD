<?php

include('includes/init.php');

if(Input::has('update'))
    MainController::update(Input::get('id'));
else
    MainController::edit(Input::get('id'));

?>