<?php

use Phalcon\Mvc\Dispatcher,
    Phalcon\Acl,
    Phalcon\Events\Event;

class Permission extends \Phalcon\Mvc\User\Plugin
{
    public $_studentResources = [
        'index' => ['*'],
        'account' => ['*'],
        'student' => ['*']
    ];

    public $_agentResources = [
      'index' => ['*'],
      'account' => ['*'],
      'agent' => ['*']
    ];

    public $_staffResources = [
        'index' => ['*'],
        'account' => ['*'],
        'staff' => ['*']
    ];

    public $_guestResources = [
        'index' => ['*'],
        'account' => ['*']
    ];

    public $_adminResources = [
        'index' => ['*'],
        'account' => ['*'],
        'admin' => ['*']
    ];

    protected function _getAcl()
    {
        if(!isset($this->persistent->acl))
        {
            $acl = new \Phalcon\Acl\Adapter\Memory();
            $acl->setDefaultAction(Phalcon\Acl::DENY);

            $roles = [
              'guest' => new \Phalcon\Acl\Role('guest'),
              'staff' => new \Phalcon\Acl\Role('staff'),
              'agent' => new \Phalcon\Acl\Role('agent'),
              'student' => new \Phalcon\Acl\Role('student'),
              'admin' => new \Phalcon\Acl\Role('admin'),
            ];


            foreach($roles as $role)
            {
                $acl->addRole($role);

            }
            //Student Resources
            foreach($this->_studentResources as $resource => $action)
            {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $action);
            }

            //Staff Resources
            foreach($this->_staffResources as $resource => $actions)
            {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $actions);
            }

            //Agent Resources
            foreach($this->_agentResources as $resource => $actions)
            {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $actions);
            }

            //Admin Resources
            foreach($this->_adminResources as $resource => $actions)
            {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $actions);
            }

            //Guest Resources
            foreach($this->_guestResources as $resource => $actions)
            {
                $acl->addResource(new \Phalcon\Acl\Resource($resource), $actions);
            }

            //All users can access Guest resources
            foreach($roles as $role)
            {
                foreach($this->_guestResources as $resource => $actions){
                    $acl->allow($role->getName(), $resource, '*');
                }
            }


            //Allows Student and Admin to access Student resource
            foreach($this->_studentResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow('student', $resource, $action);
                    $acl->allow('admin', $resource, $action);
                }
            }

            //Allows Agent and Admin to access Agent resource
            foreach($this->_agentResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow('agent', $resource, $action);
                    $acl->allow('admin', $resource, $action);
                }
            }

            //Allows Staff and Admin to access Staff resources
            foreach($this->_staffResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow('staff', $resource, $action);
                    $acl->allow('admin', $resource, $action);
                }
            }

            //Sets access to Admin resources
            foreach($this->_adminResources as $resource => $actions){
                foreach($actions as $action){
                    $acl->allow('admin', $resource, $action);
                }
            }


            $this->persistent->acl = $acl;

        }

        return $this->persistent->acl;
    }

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {

        $role = $this->session->get('role');


        if(!$role)
        {
            $role = 'guest';
        }



        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();


        $acl = $this->_getAcl();


        $allowed = $acl->isAllowed($role, $controller, $action);

        if($allowed != Phalcon\Acl::ALLOW)
        {
            $this->flash->error("You do not have permission to access this area!");
            $dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);

            //stops the dispatcher at current operation
            return false;
        }
    }

}