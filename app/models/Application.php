<?php

class Application extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $user;

    /**
     *
     * @var string
     */
    public $dateCreated;

    /**
     *
     * @var string
     */
    public $lastModified;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var string
     */
    public $semester;

    /**
     *
     * @var string
     */
    public $degree;

    /**
     *
     * @var string
     */
    public $faculty;

    /**
     *
     * @var string
     */
    public $notes;

    public $department;



    /**
     * Independent Column Mapping.
     */
    public function initialize()
    {
        $this->belongsTo("user", "Applicant", "id", array(
            "alias"=>"Applicant"
        ));

        $this->belongsTo("status", "Status", "id", array(
           "alias" => "Status"
        ));

        $this->belongsTo("department", "Department", "id", array(
            "alias" => "Department"
        ));

        $this->hasMany("id", "File", "applicationID", array(
            "alias" => "File"
        ));

        $this->hasOne("id", "Academicrecord", "application", array(
            "alias" => "Academic"
        ));

        $this->hasMany("id", "Englishrecord", "application", array(
            "alias" => "English"
        ));

    }

    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'user' => 'user', 
            'dateCreated' => 'dateCreated', 
            'lastModified' => 'lastModified', 
            'status' => 'status', 
            'semester' => 'semester', 
            'degree' => 'degree', 
            'faculty' => 'faculty', 
            'department' => 'department',
            'notes' => 'notes'

        );
    }

}
