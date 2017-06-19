<?php

use Phalcon\Mvc\Model\Validator\Email as Email,
    Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;

class User extends \Phalcon\Mvc\Model
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
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $role;

    /**
     *
     * @var string
     */
    public $dateCreated;

    /**
     *
     * @var string
     */
    public $lastLogin;

    /**
     *
     * @var string
     */
    public $confirmedAt;

    /**
     *
     * @var integer
     */
    public $active;

    public $applied;

    public function initialize()
    {
        $this->hasOne("id", "Applicant", "id");
    }


    /**
     * Validations and business logic
     */
    public function beforeValidationOnCreate()
    {
        //The account must be confirmed via e-mail
        $this->active = 0;

    }

    public function validation()
    {

        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );
        if ($this->validationHasFailed() == true) {
            return false;
        }

        $this->validate(new Uniqueness(
            array(
                    "field" => "email",
                    "message" => "This email is already taken"
            )
        ));
        if($this->validationHasFailed()==true)
            return false;
    }

    public function afterSave()
    {
        if ($this->active == 0) {
            $emailConfirmation = new emailConfirmation();
            $emailConfirmation->userID = $this->id;

            if ($emailConfirmation->save()) {
                $this->getDI()->getFlash()->notice(
                    '<h4> A confirmation email has been sent to </h4> ' . $this->email);


            }
        }
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'email' => 'email', 
            'password' => 'password', 
            'role' => 'role', 
            'dateCreated' => 'dateCreated', 
            'lastLogin' => 'lastLogin', 
            'confirmedAt' => 'confirmedAt', 
            'active' => 'active',
            'applied' => 'applied'

        );
    }

}
