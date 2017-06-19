<?php


class AdminController extends  ControllerBase
{
    public function indexAction()
    {


    }

    public function agentsAction()
    {

    }

    public function faqAction()
    {
        $faq = Faq::find();

        $this->view->faq = $faq;
    }

    public function addFaqAction()
    {
        if($this->request->isPost())
        {
            $q = $this->request->getPost('question');
            $a = $this->request->getPost('answer');
            $d = $this->request->getPost('desc');

            $faq = new Faq();

            $faq->answer = $a;
            $faq->description = $d;
            $faq->question = $q;

            if($faq->save())
            {
                $this->flash->success("FAQ was added successfully");
                return $this->dispatcher->forward(array(
                    'controller' => 'admin',
                    'action' => 'faq'));
            }
            else {
                $this->flash->error("Error in adding Faq");
                return $this->dispatcher->forward(array(
                    'controller' => 'admin',
                    'action' => 'faq'));
            }
        }
    }


    public function staffAction()
    {
        $this->view->staff = Staff::find();
    }

    public function settingsAction()
    {

    }

    public function changeStatusAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $id = $this->request->getPost("id");
            $status = $this->request->getPost("status");
            $u  = User::findFirst("id ='$id'");
            if($u)
            {
                if($status == 1)
                    $u->active = 0;
                if($status == 0)
                    $u->active = 1;

                if($u->update())
                {
                    echo "Account status has been changed successfully.";
                }
            }
            else{
                echo "This account does not exist";
            }

        }
    }

    public function getStaffAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $id = $this->request->getPost("id");
            $s = Staff::findFirst("id = '$id'");
            $e = Emailconfirmation::findFirst("userID = '$id'");


            $result = array(
              "lastLogin" => $s->user->lastLogin,
              "dateCreated" => $s->user->dateCreated,
              "confirmed" => $e->confirmed,
              "dateConfirmed" => $e->modifiedAt,
              "gender" => $s->gender,
              "dob" => $s->dob,
               "nationality" => $s->nationality

            );

            echo json_encode($result);
        }
    }
    public function createStaffAction()
    {


        if($this->request->isPost())
        {
            $email = $this->request->getPost("email");
            $usr = User::findFirst("email = '$email'");
            if(!$usr)
            {

                $u = new User();
                $s = new Staff();

                $u->assign(array(
                    'email' => $this->request->getPost('email'),
                    'password' => $this->security->hash($this->request->getPost('password')),
                    'role' => 'staff',
                    'dateCreated' => date('Y-m-d H:i:s'),
                    'active' => 0
                ));



                if($u->save())
                {
                    $s->assign(array(
                        'id' => $u->id,
                        'firstname' => $this->request->getPost("firstname"),
                        'lastname' => $this->request->getPost("lastname"),
                        'middlename' => $this->request->getPost("middlename"),
                        'dob' => $this->request->getPost("dob"),
                        'gender' => $this->request->getPost("gender"),
                        'nationality' => $this->request->getPost("nationality"),
                        'contactAddress' => $this->request->getPost("contactAddress"),
                        'mobile' => $this->request->getPost("mobile"),
                    ));
                    if($s->save())
                    {
                         return $this->dispatcher->forward(array(
                            'controller' => 'admin',
                            'action' => 'staff'));
                    }
                    else {
                        $e = $s->getMessages();
                        $msgs = implode("\n", $e);

                        $this->flash->error($msgs);
                        return $this->dispatcher->forward([
                            'controller' => 'admin',
                            'action' => 'staff']);
                    }
                }
                else {
                    $e = $u->getMessages();
                    $msgs = implode("\n", $e);

                    $this->flash->error($msgs);
                    return $this->dispatcher->forward([
                        'controller' => 'admin',
                        'action' => 'staff']);
                }
                }
            else {
                $this->flash->error("This email address is already in use. Try another");
                return $this->dispatcher->forward([
                    'controller' => 'admin',
                    'action' => 'staff']);
            }
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function filesAction()
    {

    }



    public function resetPasswordAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $id = $this->request->getPost("id");
            $usr = User::findFirst("id = '$id'");
            $email = $usr->email;
            $password = $this->generateRandomString();
            if($usr)
            {
                $usr->password = $this->security->hash($password);
                if($usr->update())
                {
                    $this->getDI()->getMail()->send(
                        array($email),
                        'Password has been reset',
                        'reset',
                        array( 'password' => $password)
                    );

                    echo "Password updated successfully.";
                }


            }
        }
    }

    public function messagesAction()
    {
        $me = $this->session->get('email');

        $this->view->setVar("my_email",$me);
    }
    public function viewMessageAction($id)
    {
        $me = $this->session->get('email');

        $this->view->setVar("my_email",$me);

        $msg = Message::findFirst("id = '$id'");

        $this->view->m = $msg;
    }

    public function replyMessageAction()
    {


        if($this->request->isPost())
        {
            $reply = new Message();
            $reply->assign(array(
                'sender' => $this->session->get('email'),
                'receiver' => $this->request->getPost('hd_receiver'),
                'message' => $this->request->getPost('message'),
                'subject' => "Re: ".$this->request->getPost('hd_subject'),
                'dateSent' => date('Y-m-d H:i:s'),
                'status' => 'sent'
            ));

            if($reply->save())
            {
                $this->flash->success("Your message was sent successfully");
                return $this->dispatcher->forward(array(
                    'controller' => 'staff',
                    'action' => 'messages'));
            }
            else{
                $err = array();
                foreach($reply->getMessages() as $m)
                    $err[] = $m;
                foreach($err as $e)
                    $this->flash->error($e);
                return $this->dispatcher->forward(array(
                    'controller' => 'staff',
                    'action' => 'messages'));

            }
        }
    }
    public function deleteMessageAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {

            $mid = $this->request->getPost('data');
            $m = Message::findFirst("id = '$mid'");
            $m->status = "trash";

            if($m->update())
            {
                echo json_encode("Message deleted successfully");
            }
            else {
                echo json_encode("Error. Message could not be deleted");
            }
        }
    }
    public function sendAction()
    {
        $this->view->disable();
        $mail = $this->request->getPost('receiver1');

        $user = User::findFirstByEmail($mail);
        if($user){
            $inbox = new Message();
            $inbox->assign(array(
                'sender' => $this->session->get('email'),
                'receiver' => $this->request->getPost('receiver1'),
                'subject' => $this->request->getPost('subject1'),
                'message' => $this->request->getPost('message1'),
                'dateSent' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status1')
            ));
            if($inbox->save()){
                $this->flash->success("Message sent");
                echo json_encode("success");
                return $this->dispatcher->forward(array(
                    'controller' => 'staff',
                    'action' => 'messages'));
            }else{
                $errors = array();
                foreach($inbox->getMessages() as $e)
                    $errors[] = $e;

                foreach($errors as $e)
                    $this->flash->error($e);

                return $this->dispatcher->forward(array(
                    'controller' => 'staff',
                    'action' => 'messages'));
            }
        }else {
            $this->flash->error("This receiver does not exist");
            echo json_encode("User does not exist");
            return $this->dispatcher->forward(array(
                'controller' => 'staff',
                'action' => 'messages'));
        }
    }

    public function emptyTrashAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $msgs = Message::find("status = 'trash'");

            if($msgs->delete())
            {
                echo json_encode("Delete Successful");
            }

        }
    }

}