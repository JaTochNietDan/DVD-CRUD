<?php

class DVD extends Model
{
    protected static $table = 'titles';
    protected static $fillable = array('filmtitle', 'description', 'cert', 'releaseDate', 'director', 'filmDuration');
    
    public static $rules = array(
        'filmtitle' => array('required', 'min:2', 'max:50'),
        'cert' => array('required'),
        'releaseDate' => array('required', 'date'),
        'filmDuration' => array('required', 'int'),
        'director' => array('required', 'max:128'),
        'description' => array('required', 'max:250')
    );
    
    public function getCertColour()
    {
        switch($this->cert)
        {
            case '18':
                return 'danger';
            case '15':
                return 'warning';
            case '12':
                return 'info';
            case 'PG':
                return 'success';
        }
        
        return 'primary';
    }
}

?>