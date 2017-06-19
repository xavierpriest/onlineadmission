<?php



class StaffController extends  ControllerBase
{
    public function indexAction()
    {


    }

    public function viewAction()
    {

        if(!$this->request->getPost("f"))
        {
            $result = Application::find()->filter(function ($a) {
                    return $a; });
        }
        else {
            $result = Application::find()->filter(function ($a) {
                if($a->faculty == $this->request->getPost("f") )
                    return $a;
            });
        }

        $this->view->faculties = Faculty::find();

        $currentPage = (int) $_GET["page"];
        if(!$currentPage)
            $currentPage = 1;


        $paginator = new \Phalcon\Paginator\Adapter\NativeArray(
            array(
                "data" => $result,
                "limit"=> 5,
                "page" => $currentPage
            )
        );

        // Get the paginated results
        $this->view->page = $paginator->getPaginate();


        //Counts
        $this->view->new = Application::count("status = '1'");
        $this->view->checked = Application::count("status = '2'");
        $this->view->pending = Application::count("status = '3'");
        $this->view->complete = Application::count("status = '6'");
        $this->view->pal = Application::count("status = '4'");




    }

    public function dashboardAction()
    {

    }

    public function applicationsAction()
    {
        $this->view->apps = Application::find();
        $this->view->countNew = count(Application::find("status = 1"));

    }

    public function detailsAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $r = $this->request->getPost('data');
            $academic = Academicrecord::findFirstByApplication($r);




            $result = array(
                "school" => $academic->school,
                "degree" => $academic->degree,
                "year" =>   $academic->year,
                "field" => $academic->field,

            );

            echo json_encode($result);

        }
    }

    public function englishAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $r = $this->request->getPost('data');
            $e = array();
            foreach(Englishrecord::find("application = '".$r."'") as $english)
                $e[] = $english;
                echo json_encode($e);

        }
    }

    public function filesAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $r = $this->request->getPost('data');
            $f = array();

            foreach(File::find("applicationID = '".$r."'") as $upload)
                    $f[] = $upload;

            echo json_encode($f);
        }
    }

    public function personalAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $r = $this->request->getPost('data');
            $app = Application::findFirstById($r);


            $user = $app->applicant;
            $u = array(
                "dob" => $user->dob,
                "contactAddress" => $user->contactAddress,
                "telephone" => $user->telephone,
                "mobile" => $user->mobile,
                "email" => $user->user->email,
                "maritalStatus" => $user->maritalStatus,
                "gender" => $user->gender,
                "nationality" => $user->nationality,
                "passportNumber" => $user->passportNumber,
                "passprtPlace" => $user->passprtPlace,
                "passportDate" => $user->passportDate,
                "passportExpiry" => $user->passportExpiry,


            );


            echo json_encode($u);

        }
    }

    public function updateStatusAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $r = $this->request->getPost('id');

            $app = Application::findFirstById($r);

            $app->status = $this->request->getPost('status');
            $app->notes = $this->request->getPost('notes');

            if($app->save())
                echo json_encode("This application has been updated");
            else
                echo json_encode("Error in updating application status. Contact Administrator");

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