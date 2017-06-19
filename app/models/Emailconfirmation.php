<?php

class Emailconfirmation extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $userID;

    /**
     *
     * @var string
     */
    public $code;

    /**
     *
     * @var integer
     */
    public $createdAt;

    /**
     *
     * @var integer
     */
    public $modifiedAt;

    /**
     *
     * @var string
     */
    public $confirmed;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource('emailConfirmation');

        $this->belongsTo('userID', 'User', 'id', array(
            'alias' => 'user'
        ));
    }

    public function beforeValidationOnCreate()
    {
        //Timestamp the confirmation
        $this->createdAt = date('Y-m-d H:i:s');

        //Generate a random confirmation code
        $this->code = preg_replace('/[^a-zA-Z0-9]/', '', base64_encode(openssl_random_pseudo_bytes(24)));

        //Set status to non-confirmed
        $this->confirmed = 'N';
    }

    public function afterCreate(){
        $this->getDI()->getMail()->send(
            array($this->user->email),
            'Please confirm your email',
            'confirmation',
            array( 'confirmUrl' => '/account/confirm/' . $this->code)
        );
    }

    public function beforeValidationOnUpdate()
    {
        //Timestamp the confirmation
        $this->modifiedAt = date('Y-m-d H:i:s');
    }

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'userID' => 'userID', 
            'code' => 'code', 
            'createdAt' => 'createdAt', 
            'modifiedAt' => 'modifiedAt', 
            'confirmed' => 'confirmed'
        );
    }

}
