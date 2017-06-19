<?php

class Academicrecord extends \Phalcon\Mvc\Model
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
    public $school;

    /**
     *
     * @var string
     */
    public $degree;

    /**
     *
     * @var integer
     */
    public $year;

    /**
     *
     * @var string
     */
    public $field;

    /**
     *
     * @var string
     */
    public $application;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('academicRecord');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'school' => 'school', 
            'degree' => 'degree', 
            'year' => 'year', 
            'field' => 'field', 
            'application' => 'application'
        );
    }

}
