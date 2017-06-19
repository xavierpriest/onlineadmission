<?php

use Phalcon\Tag;
use Phalcon\Mvc\Model\Message as Message;

class IndexController extends ControllerBase
{



    public function sendAction()
    {
        $this->getDI()->getMail()->send(
           "priesthud@yahoo.com",
            "Please confirm your email",
            'confirmation',
            array(
                'confirmUrl' => '/confirm/'
            )
        );
    }

    public function indexAction()
    {
        Tag::appendTitle("Home");

    }

    public function startSessionAction()
    {
        $this->session->set('user', [
            'name' => 'Ted',
            'age' => '40',

        ]);

        $this->session->set('role', 'student');

    }

    public function getSessionAction()
    {
        $user = $this->session->get('user');
        print_r($user);
        echo $this->session->get('role');
    }

    public function removeSessionAction()
    {
        echo $this->session->remove('role');
    }

    public function destroySessionAction()
    {
        echo $this->session->destroy();
    }

    public function testAction()
    {



    }







}

