<?php

class Flash
{
    public static function Error($error)
    {
        static::Message('error', $error);
    }
    
    public static function Success($message)
    {
        static::Message('success', $message);
    }
    
    public static function has($type)
    {
        return isset($_SESSION[$type]);
    }
    
    public static function get($type)
    {
        $messages = $_SESSION[$type];
        
        unset($_SESSION[$type]);
        
        return $messages;
    }
    
    public static function Message($type, $message)
    {
        if(!is_array($message))
            $message = array($message);
            
        $_SESSION[$type] = $message;
    }
}

?>