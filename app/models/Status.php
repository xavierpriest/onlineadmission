<?php

class Status extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $description;

    /**
     *
     * @var string
     */
    public $class;

    public function initialize()
    {
        $this->hasMany("id", "Application", "status");
    }

    /**
     * Independent Column Mapping.
     */


    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'description' => 'description', 
            'class' => 'class'
        );
    }

}
