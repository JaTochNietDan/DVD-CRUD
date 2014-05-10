<?php

include('includes/config.php');
include('includes/database.php');
include('includes/view.php');
include('includes/input.php');
include('includes/flash.php');
include('includes/validator.php');
include('includes/model.php');
include('controllers/MainController.php');

Database::Connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);

?>