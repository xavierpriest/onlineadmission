<?php

class Department extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var integer
     */
    public $faculty;

    public function initialize()
    {
        $this->hasMany("id", "Application", "department");

        $this->belongsTo("faculty", "Faculty", "id", array(
            "alias" => "Faculty"));
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'faculty' => 'faculty'
        );
    }

}
