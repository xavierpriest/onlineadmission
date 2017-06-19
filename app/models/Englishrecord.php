<?php

class Englishrecord extends \Phalcon\Mvc\Model
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
    public $score;

    /**
     *
     * @var string
     */
    public $date;

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
        $this->setSource('englishRecord');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'name' => 'name', 
            'score' => 'score', 
            'date' => 'date', 
            'application' => 'application'
        );
    }

}
