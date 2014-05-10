<?php

$_SESSION['last'] = date('Y/m/d H:i:s');

isset($_SESSION['accessed']) ? $_SESSION['accessed']++ : $_SESSION['accessed'] = 0;

?>