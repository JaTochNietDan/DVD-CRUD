<?php

class View
{
    public static function Show($name, $data = null)
    {
        if($data)
            extract($data);
        
        include('views/'.$name.'.php');
    }
    
    public static function Redirect($route)
    {
        header('Location: '.$route);
    }
}

?>