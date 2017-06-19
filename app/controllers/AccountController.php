<?php

use Phalcon\Tag;

class AccountController extends  ControllerBase
{
    public function indexAction()
    {
        $this->response->redirect('/');

    }

    public function LogoutAction()
    {
        if($this->session->destroy())
        {
            $this->response->redirect('index');
        }
    }

    public function  LoginAction()
    {
        Tag::appendTitle("Login");

        $this->assets->collection('extras')->addCss('css/login.css');

    }

    public function RegisterAction()
    {
        Tag::appendTitle("Create Account");

    }

    public function doRegisterAction()
    {



        if ($this->request->isPost()) {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');



                if($confirm_password == $password)
                {
                    $user = new User();

                    $user->assign(array(

                        'email' => $this->request->getPost('email'),
                        'password' => $this->security->hash($this->request->getPost('password')),
                        'role' => 'student',
                        'dateCreated' => date('Y-m-d H:i:s')

                ));
                    if($user->save())
                    {

                            return $this->dispatcher->forward(array(
                                'controller' => 'account',
                                'action' => 'register'));


                    }


                }

                else{

                        $this->flash->error("Passwords do not match");
                        return $this->dispatcher->forward([
                        'controller' => 'account',
                        'action' => 'register']);
                }

                $e = $user->getMessages();
                $msgs = implode("\n", $e);

                $this->flash->error($msgs);
                return $this->dispatcher->forward([
                    'controller' => 'account',
                    'action' => 'register']);


    }
    }

    public function startSession($email, $role)
    {
        $this->session->set('auth',array(
            'email' => $email,
            'role'=> $role

        ));



    }

    public function doRememberAction()
    {

    }

    public function doLoginAction()
    {


        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $r = $this->request->getPost('login_remember');


        $user = User::findFirstByEmail($email);
        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {
                $active = $user->active;
                if($active != 0)
                {
                    $user->lastLogin = date('Y-m-d H:i:s');
                    $user->save();
                    $role = $user->role;
                    $userID = $user->id;
                    if($role=='student'){
                        $this->session->set('role', $role);
                        $this->session->set('userID', $userID);
                        $this->session->set('email', $email);
                        return $this->response->redirect('student/index');
                    }
                    if($role == 'staff'){
                        $this->session->set('role', $role);
                        $this->session->set('userID', $userID);
                        $this->session->set('email', $email);
                        return $this->response->redirect('staff/index');
                    }
                    if($role == 'admin'){
                        $this->session->set('role', $role);
                        $this->session->set('userID', $userID);
                        $this->session->set('email', $email);
                        return $this->response->redirect('admin/index');
                    }
                    if($role == 'agent'){
                        $this->session->set('role', $role);
                        $this->session->set('userID', $userID);
                        $this->session->set('email', $email);
                        return $this->response->redirect('agent/index');
                    }
                }
                else{
                    $this->flash->error("Please check your email and confirm your account before logging in");
                    return $this->dispatcher->forward(array(
                        'controller' => 'account',
                        'action' => 'login'));

                }
            }
            else {
                $this->flash->error("Wrong username or password");
                return $this->dispatcher->forward(array(
                    'controller' => 'account',
                    'action' => 'login'));
            }
        }

        //The validation has failed
    }


    public function confirmAction($code)
    {

        $confirmation = Emailconfirmation::findFirstByCode($code);

        if (!$confirmation) {
            return $this->dispatcher->forward(array(
                'controller' => 'index',
                'action' => 'index'
            ));
        }
        if ($confirmation->confirmed == 'N')
        {

            $confirmation->confirmed = 'Y';
            $confirmation->user->active = 1;

            if ($confirmation->save()) {

            $this->flash->success('The email was successfully confirmed. Now you can login');
            return $this->dispatcher->forward(array(
                'controller' => 'account',
                'action' => 'login'
            ));
            }
        }
       else{
            $e = $confirmation->getMessages();
            $msgs = implode("\n", $e);

            $this->flash->error($msgs);
            return $this->dispatcher->forward([
                'controller' => 'index',
                'action' => 'index']);

        }


    }



}