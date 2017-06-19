<?php

use Phalcon\Mvc\Controller;
use Phalcon\Tag;

class ControllerBase extends Controller
{

    public function initialize()
    {
        Tag::prependTitle("GAU Online Admission | ");

        $this->view->userID = $this->session->get('userID');


        $this->assets
             ->collection('style')
             ->addCss('ext/css/bootstrap.min.css', false, false)
             ->addCss('ext/css/bootstrap-responsive.min.css', false, false)
             ->addCss('ext/css/beoro.css', false)
             ->addCss('ext/css/smart_wizard.css', false)

             ->setTargetPath('css/production.css')
             ->setTargetUri('css/production.css')
             ->join(true)
             ->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->assets
             ->collection('js')

             ->addJs('ext/js/bootstrap.js', false, false)
             ->addJs('ext/js/selectnav.min.js', false, false)
             ->addJs('ext/js/moment.min.js', false, false)
             ->addJs('ext/js/jquery.easing.1.3.min.js', false, false)

             ->setTargetPath('js/production.js')
             ->setTargetUri('js/production.js')
             ->join(true)
             ->addFilter(new \Phalcon\Assets\Filters\Jsmin());


    }



}
