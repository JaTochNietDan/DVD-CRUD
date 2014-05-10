<?php

class Input
{
    public static $_tokenGenerated = false;

    public static function get($name)
    {
        if(!empty($_GET[$name])) return $_GET[$name];
        if(!empty($_POST[$name])) return $_POST[$name];
        return '';
    }
    
    public static function has($name)
    {
        return isset($_POST[$name]) || isset($_GET[$name]);
    }
    
    public static function all($sanatize = true)
    {
        if($sanatize)
        {
            foreach($_POST as $key => $value)
                $_POST[$key] = strip_tags($value);
        }
        
        return $_POST;
    }
    
    public static function old($name, $default)
    {
        if(!isset($_POST[$name]))
        {
            if(isset($default)) return $default;
            else return '';
        }
        
        return $_POST[$name];
    }
    
    public static function token()
    {
        if(!static::$_tokenGenerated)
        {
            $_SESSION['_token'] = md5(rand());
            static::$_tokenGenerated = true;
        }

        return $_SESSION['_token'];
    }
    
    public static function check_token()
    {
        return $_SESSION['_token'] == Input::get('_token');
    }
}
