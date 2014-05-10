<?php

class Model
{
    protected static $table;
    protected static $fillable;
    
    protected function __construct($row = null)
    {
        foreach($row as $column => $value)
            $this->$column = $value;
        
        return $this;
    }
    
    public function delete()
    {
        Database::Delete(static::$table, $this->ID);
    }
    
    public function update($data)
    {
        $stripped = array_intersect_key($data, array_flip(static::$fillable));
        
        Database::Update(static::$table, $stripped, $this->ID);
    }
    
    public static function Create($data)
    {
        $stripped = array_intersect_key($data, array_flip(static::$fillable));
        
        Database::Insert(static::$table, $stripped);
    }
    
    public static function All()
    {
        $r = Database::All(static::$table);

        $a = array();

        if($r)
        {
            foreach($r as $row)
            {
                $dvd = new DVD($row);
                
                $a[] = $dvd;
            }
        }
        
        return $a;
    }
    
    public static function Find($ID)
    {
        $r = Database::Find(static::$table, $ID);
        
        if($r) return new DVD($r);
        
        return null;
    }
}
