<?php

class Staff extends \Phalcon\Mvc\Model
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
    public $firstname;

    /**
     *
     * @var string
     */
    public $lastname;

    /**
     *
     * @var string
     */
    public $middlename;

    /**
     *
     * @var string
     */
    public $dob;

    /**
     *
     * @var string
     */
    public $gender;

    /**
     *
     * @var string
     */
    public $nationality;

    /**
     *
     * @var string
     */
    public $contactAddress;

    /**
     *
     * @var string
     */
    public $mobile;

    public function initialize()
    {
        $this->hasOne("id", "User", "id");
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'firstname' => 'firstname', 
            'lastname' => 'lastname', 
            'middlename' => 'middlename', 
            'dob' => 'dob', 
            'gender' => 'gender', 
            'nationality' => 'nationality', 
            'contactAddress' => 'contactAddress', 
            'mobile' => 'mobile'
        );
    }

}
