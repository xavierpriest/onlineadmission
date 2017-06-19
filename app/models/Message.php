<?php

class Message extends \Phalcon\Mvc\Model
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
    public $sender;

    /**
     *
     * @var string
     */
    public $receiver;

    /**
     *
     * @var string
     */
    public $subject;

    /**
     *
     * @var string
     */
    public $message;

    /**
     *
     * @var string
     */
    public $dateSent;

    /**
     *
     * @var string
     */
    public $status;

    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'sender' => 'sender', 
            'receiver' => 'receiver', 
            'subject' => 'subject', 
            'message' => 'message', 
            'dateSent' => 'dateSent', 
            'status' => 'status'
        );
    }

}
