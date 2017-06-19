<?php

class File extends \Phalcon\Mvc\Model
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
    public $filename;

    /**
     *
     * @var string
     */
    public $extension;

    /**
     *
     * @var string
     */
    public $dateUploaded;

    /**
     *
     * @var string
     */
    public $lastViewed;

    /**
     *
     * @var string
     */
    public $applicationID;

    /**
     *
     * @var string
     */
    public $link;

    public $size;



    /**
     * Independent Column Mapping.
     */
    public function columnMap()
    {
        return array(
            'id' => 'id', 
            'filename' => 'filename', 
            'extension' => 'extension', 
            'dateUploaded' => 'dateUploaded', 
            'lastViewed' => 'lastViewed', 
            'applicationID' => 'applicationID', 
            'link' => 'link',
            'size' => 'size'
        );
    }

}
