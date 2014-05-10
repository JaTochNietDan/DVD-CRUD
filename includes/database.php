<?php

class Database
{
    private static $conn;
    
    public static function Connect($host, $user, $pass, $database)
    {
        try
        {
            static::$conn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $pass);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }
    
    public static function All($table)
    {
        $sql = 'SELECT * FROM '.$table;
        
        return static::$conn->query($sql, PDO::FETCH_NAMED);
    }
    
    public static function Find($table, $id)
    {
        $sql = 'SELECT * FROM '.$table.' WHERE ID = ?';
        
        $stm = static::$conn->prepare($sql);
        
        $stm->bindParam(1, $id);
        $stm->execute();
        
        return $stm->fetch(PDO::FETCH_NAMED);
    }
    
    public static function Update($table, $data, $id)
    {
        $sql = 'UPDATE '.$table.' SET ';
        
        foreach($data as $column => $value)
            $sql .= $column.' = ?'.($column == key(array_slice($data, -1, 1, true)) ? ' ' : ', ');
        
        $sql .= 'WHERE ID = ?';
        
        $stm = static::$conn->prepare($sql);
        
        $idxdata = array_values($data);
        
        for($i = 0; $i < count($idxdata); $i++)
            $stm->bindParam($i + 1, $idxdata[$i]);
            
        $stm->bindParam($i + 1, $id);
        
        $stm->execute();
    }
    
    public static function Insert($table, $data)
    {
        $sql = 'INSERT INTO '.$table.' (';
        
        foreach($data as $column => $value)
            $sql .= $column.($column == key(array_slice($data, -1, 1, true)) ? ')' : ', ');
        
        $sql .= ' VALUES (';
        
        foreach($data as $column => $value)
            $sql .= '?'.($column == key(array_slice($data, -1, 1, true)) ? ')' : ', ');
            
        $stm = static::$conn->prepare($sql);
        
        $idxdata = array_values($data);
        
        for($i = 0; $i < count($idxdata); $i++)
            $stm->bindParam($i + 1, $idxdata[$i]);
            
        $stm->execute();
    }
    
    public static function Delete($table, $id)
    {
        $sql = 'DELETE FROM '.$table.' WHERE ID = ?';
        
        $stm = static::$conn->prepare($sql);
        
        $stm->bindParam(1, $id);
        $stm->execute();
    }
}

?>