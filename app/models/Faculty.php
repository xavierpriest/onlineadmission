<?php

class Faculty extends \Phalcon\Mvc\Model
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
     * Independent Column Mapping.
     */

    public function initialize()
    {
        $this->hasMany("id", "Department", "faculty");
    }
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'description' => 'description'
        );
    }

}
