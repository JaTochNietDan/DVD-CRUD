<?php

class Validator
{
    private $errors;
    
    public static function make($data, $rules)
    {
        $v = new Validator();
        
        foreach($rules as $column => $validators)
        {
            foreach($validators as $validator)
            {
                if(!isset($data[$column]))   
                    $data[$column] = '';
                    
                if(empty($data[$column]))
                {
                    if($validator == 'required')
                    {
                        static::meets_required($v, $column, $data[$column]);
                        break;
                    }
                }
                
                if(strpos($validator, ':') === false)
                    call_user_func('static::meets_'.$validator, $v, $column, $data[$column]);
                else
                {
                    $f = explode(':', $validator);
                    
                    call_user_func('static::meets_'.$f[0], $v, $f[1], $column, $data[$column]);
                }
            }
        }
        
        return $v;
    }
    
    private static function meets_int($v, $column, $data)
    {
        if(!ctype_digit ($data))
            $v->errors[] = 'The '.$column.' field must be numeric!';
    }
    
    private static function meets_required($v, $column, $data)
    {
        if(empty($data))
            $v->errors[] = 'The '.$column.' field is required!';
    }
    
    private static function meets_date($v, $column, $data)
    {
        $date = DateTime::createFromFormat('Y-m-d', $data);
        
        if ($date == false) 
            $v->errors[] = 'The '.$column.' field must be formatted as a date (example: 1992/07/23)';
    }
    
    private static function meets_min($v, $rule, $column, $data)
    {
        $length = is_string($data) ? strlen($data) : $data;
        
        if($length < $rule)
            $v->errors[] = 'The '.$column.' must be at least '.$rule.' characters!';
    }
    
    private static function meets_max($v, $rule, $column, $data)
    {
        $length = is_string($data) ? strlen($data) : $data;
        
        if($length > $rule)
            $v->errors[] = 'The '.$column.' cannot be more than '.$rule.' characters!';
    }
    
    public function hasErrors()
    {
        return count($this->errors) > 0;
    }
    
    public function errors()
    {
        return $this->errors;
    }
}
