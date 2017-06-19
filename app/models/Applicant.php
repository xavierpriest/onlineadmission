<?php

class Applicant extends \Phalcon\Mvc\Model
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
    public $father;

    /**
     *
     * @var string
     */
    public $mother;

    /**
     *
     * @var string
     */
    public $dob;

    /**
     *
     * @var string
     */
    public $nationality;

    /**
     *
     * @var string
     */
    public $residenceCountry;

    /**
     *
     * @var string
     */
    public $gender;

    /**
     *
     * @var string
     */
    public $maritalStatus;

    /**
     *
     * @var string
     */
    public $passportNumber;

    /**
     *
     * @var string
     */
    public $passprtPlace;

    /**
     *
     * @var string
     */
    public $passportDate;

    /**
     *
     * @var string
     */
    public $passportExpiry;

    /**
     *
     * @var string
     */
    public $contactAddress;

    /**
     *
     * @var string
     */
    public $telephone;

    /**
     *
     * @var string
     */
    public $mobile;

    /**
     *
     * @var integer
     */
    public $status;

    public $pob;

    public $addressCountry;

    /**
     * Independent Column Mapping.
     */
    public function initialize()
    {
        $this->hasMany("id", "Application", "user");

        $this->hasOne("id", "User", "id");
    }

    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'firstname' => 'firstname', 
            'lastname' => 'lastname', 
            'middlename' => 'middlename', 
            'father' => 'father', 
            'mother' => 'mother', 
            'dob' => 'dob', 
            'nationality' => 'nationality', 
            'residenceCountry' => 'residenceCountry', 
            'gender' => 'gender', 
            'maritalStatus' => 'maritalStatus', 
            'passportNumber' => 'passportNumber', 
            'passprtPlace' => 'passprtPlace', 
            'passportDate' => 'passportDate', 
            'passportExpiry' => 'passportExpiry', 
            'contactAddress' => 'contactAddress', 
            'telephone' => 'telephone', 
            'mobile' => 'mobile', 
            'status' => 'status',
            'pob' => 'pob',
            'addressCountry' => 'addressCountry'
        );
    }

}
