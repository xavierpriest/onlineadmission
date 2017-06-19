<?php
use Phalcon\Validation\Validator\Email;


class StudentController extends  ControllerBase
{

    public $appID;

    public function _getAppID()
    {
        return $this->appID;
    }



    public function _setAppID()
    {
        $this->appID = $this->generateRandomString();
    }

    public function indexAction()
    {
        $u = $this->session->get("userID");
        $user = User::findFirstById($u);
        $applied = $user->applied;

        $msg = Message::query()
            ->where("receiver = '$user->email'")
            ->andWhere("status = 'sent'")
            ->execute();

        $this->view->msgCount = count($msg);
        $this->session->set('msgCount', count($msg));


        $this->session->set("applied", $applied);

    }

    public function editAction()
    {
        $id = $this->request->getQuery('id');
        $this->view->id = $id;
        $app = Application::findFirstById($id);

        $this->view->app = $app;


    }

    public function applyAction()
    {
        if($this->session->get('applied') == 1)
        {
            $this->flash->warning("You have already submitted an application");
            return $this->dispatcher->forward(array(
                'controller' => 'student',
                'action' => 'application'));
        }


        $this->_setAppID();
        $this->view->setVar('appID', $this->_getAppID());
        //set appID as session variables at beginning of application
        //also remember to remove the session value after submit or save
        $this->session->set('appID',$this->_getAppID());


        $this->assets->collection('extraJs')->addJs('js/beoro_wizard.js');
        $this->assets->collection('extraJs')->addJs('js/smartWizard_min.js');
        $this->assets->collection('extraJs')->addJs('ext/js/bootstrap-datepicker.min.js');
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

    public function saveAction()
    {
        if($this->request->isPost())
        {


        }


    }

    public function testAction()
    {

    }

    public function submitAction()
    {


        if($this->request->isPost())
        {

            //Array to store any errors
            $errors = array();

            //Submit application.
            $application = new Application();
            $application->id = $this->session->get('appID');
            $application->dateCreated = date('Y-m-d H:i:s');
            $application->department = $this->request->getPost('v_department');
            $application->faculty = $this->request->getPost('v_faculty');
            $application->status = 1;
            $application->degree = $this->request->getPost('degree');
            $application->semester = $this->request->getPost('semester');
            $application->user = $this->session->get('userID');

            if(!$application->save())
            {
                foreach($application->getMessages() as $m)
                    $errors[] = $m;
            }


            //Submit applicant's details
            $applicant = new Applicant();
            $applicant->id = $this->session->get('userID');
            $applicant->status = 1;

            //personal details post
            $applicant->firstname = $this->request->getPost('v_firstname');
            $applicant->lastname = $this->request->getPost('v_lastname');
            $applicant->middlename = $this->request->getPost('v_middlename');
            $applicant->dob = $this->request->getPost('v_dob');
            $applicant->pob = $this->request->getPost('v_pob');
            $applicant->gender = $this->request->getPost('v_gender');
            $applicant->maritalStatus = $this->request->getPost('v_status');
            $applicant->residenceCountry = $this->request->getPost('v_residence');
            $applicant->nationality = $this->request->getPost('v_nationality');
            $applicant->father = $this->request->getPost('v_father');
            $applicant->mother = $this->request->getPost('v_mother');

            //passport details
            $applicant->passportNumber = $this->request->getPost('v_passport');
            $applicant->passprtPlace = $this->request->getPost('v_place');
            $applicant->passportDate = $this->request->getPost('v_issue');
            $applicant->passportExpiry = $this->request->getPost('v_expiry');

            //contact details
            $applicant->contactAddress = $this->request->getPost('v_address');
            $applicant->addressCountry = $this->request->getPost('v_country');
            $applicant->telephone = $this->request->getPost('v_tel');
            $applicant->mobile = $this->request->getPost('v_mobile');
            if(!$applicant->save())
            {
                foreach($applicant->getMessages() as $m)
                    $errors[] = $m;
            }

            //english records
            if($this->request->getPost('toefl')=="Yes")
            {
                $toefl = new Englishrecord();
                $toefl->application = $this->session->get('appID');
                $toefl->name = "toefl";
                $toefl->score = $this->request->getPost('v_tscore');
                $toefl->date = $this->request->getPost('v_tdate');

                if(!$toefl->save())
                {
                    foreach($toefl->getMessages() as $m)
                        $errors[] = $m;
                }

            }

            if($this->request->getPost('ielts')=="Yes")
            {
                $ielts = new Englishrecord();
                $ielts->application = $this->session->get('appID');
                $ielts->name = "ielts";
                $ielts->score = $this->request->getPost('v_ieltsscore');
                $ielts->date = $this->request->getPost('v_ieltsdate');

                if(!$ielts->save())
                {
                    foreach($ielts->getMessages() as $m)
                        $errors[] = $m;
                }

            }

            if($this->request->getPost('igcse')=="Yes")
            {
                $igcse = new Englishrecord();
                $igcse->application = $this->session->get('appID');
                $igcse->name = "igcse";
                $igcse->score = $this->request->getPost('v_igcsescore');
                $igcse->date = $this->request->getPost('v_igcsedate');

                if(!$igcse->save())
                {
                    foreach($igcse->getMessages() as $m)
                        $errors[] = $m;
                }

            }
            //Academic record
            $academic = new Academicrecord();
            $academic->application = $this->session->get('appID');
            $academic->school = $this->request->getPost('v_schoolname');
            $academic->field = $this->request->getPost('v_field');
            $academic->degree = $this->request->getPost('v_grade');
            $academic->year = $this->request->getPost('v_year');

            if(!$academic->save())
            {

                foreach($academic->getMessages() as $m)
                    $errors[] = $m;
            }





            if(empty($errors))
            {
                //update user table. set applied to true
                $user = User::findFirstById($this->session->get('userID'));
                $user->applied = "1";
                $user->save();

                $this->session->set("applied", "1");
                $this->flash->success("Your application was submitted successfully");
                return $this->dispatcher->forward(array(
                    'controller' => 'student',
                    'action' => 'index'));
            }
            else {
                foreach($this->$errors as $e)
                    $this->flash->error($e);
                return $this->dispatcher->forward(array(
                    'controller' => 'student',
                    'action' => 'index'));

            }




        }

    }

    public function uploadAction()
    {

        if($this->request->hasFiles() == true)
        {
            $file = new File();

            $uploads = $this->request->getUploadedFiles();
            $isUploaded = false;

            foreach($uploads as $upload){
                $file->applicationID = $this->session->get('appID');
                $file->dateUploaded = date('Y-m-d H:i:s');
                $file->extension = $upload->getRealType();
                $file->filename = $upload->getname();
                $path = 'files/'.md5(uniqid(rand(), true)).'-'.strtolower($upload->getname());
                $file->link = $path;
                $file->size = $upload->getSize();
                ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;

                if($isUploaded)
                {
                    if(!$file->save())
                    {
                        foreach($file->getMessages() as $m)
                            echo $m; die;
                    }
                    $response = array("msg"=>"success");
                    echo json_encode($response);
                    die;
                }
                else
                {
                    die('Some error occurred.');

                }
            }

        }

        else
        {
            die('You must choose at least one file to send. Please try again.');
        }
    }

    public function applicationAction()
    {
        $applied = $this->session->get('applied');
        $this->view->msgCount = $this->session->get('msgCount');

        $this->view->applied = $applied;
        $user = $this->session->get("userID");
        $app = Application::FindFirst("user = $user");

        $this->view->app = $app;

        if($applied == 1)
        {
            $appID = $app->id;
            $this->session->set('appID', $appID);
        }


    }

    public function deleteFileAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $f = $this->request->getPost('data');

            $file = File::findFirstById($f);

            $link = $file->link;
            if(@unlink($link))
            {
                $file->delete();
                echo json_encode("File removed!");
            }
            else {
                echo json_encode("Error deleting file");
            }



        }
    }

    public function addEnglishAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $e = $this->request->getPost('exam');
            $s = $this->request->getPost('score');
            $d = $this->request->getPost('d');

            $english = new Englishrecord();

            $english->score = $s;
            $english->date = $d;
            $english->name = $e;
            $english->application = $this->session->get('appID');

            if($english->save())
            {
                echo json_encode("Success");
            }

        }
    }

    public function removeEnglishAction()
    {
        $this->view->disable();

        if($this->request->isPost())
        {
            $id = $this->request->getPost('data');
            $e = Englishrecord::findFirst("id = '$id'");

            if($e->delete())
                echo json_encode("Success");
        }
    }

    public function updateAction()
    {
        $u = $this->session->get('userID');
        $appID = $this->session->get('appID');
        if($this->request->isPost())
        {
            $errors = array();
            $a = Applicant::findFirst("id = '$u'");

            $a->firstname = $this->request->getPost('firstname');
            $a->lastname = $this->request->getPost('lastname');
            $a->middlename = $this->request->getPost('middlename');
            $a->dob = $this->request->getPost('dob');
            $a->pob = $this->request->getPost('pob');
            $a->nationality = $this->request->getPost('nationality');
            $a->father = $this->request->getPost('father');
            $a->mother = $this->request->getPost('mother');
            $a->contactAddress = $this->request->getPost('address');
            $a->addressCountry = $this->request->getPost('country');
            $a->telephone = $this->request->getPost('tel');
            $a->mobile = $this->request->getPost('mobile');

            $a->passportNumber = $this->request->getPost('passport');
            $a->passprtPlace = $this->request->getPost('place');
            $a->passportDate = $this->request->getPost('issue');
            $a->passportExpiry = $this->request->getPost('expiry');

            $ac = Academicrecord::findFirst("application = '$appID'");

            $ac->school = $this->request->getPost('school');
            $ac->degree = $this->request->getPost('degree');
            $ac->field = $this->request->getPost('field');
            $ac->year = $this->request->getPost('year');

            if(!$ac->update())
            {
                foreach($ac->getMessages() as $m)
                    $errors[] = $m;
            }

            if(!$a->update())
            {
                foreach($a->getMessages() as $m)
                    $errors[] = $m;
            }

            if(empty($errors))
            {
                $this->flash->success("Your application was updated successfully");
                return $this->dispatcher->forward(array(
                    'controller' => 'student',
                    'action' => 'application'));
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
                    'controller' => 'student',
                    'action' => 'messages'));
            }
            else{
                $err = array();
                foreach($reply->getMessages() as $m)
                    $err[] = $m;
                foreach($err as $e)
                    $this->flash->error($e);
                return $this->dispatcher->forward(array(
                    'controller' => 'student',
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
                    'controller' => 'student',
                    'action' => 'messages'));
            }else{
                $errors = array();
                foreach($inbox->getMessages() as $e)
                    $errors[] = $e;

                foreach($errors as $e)
                    $this->flash->error($e);

                return $this->dispatcher->forward(array(
                    'controller' => 'student',
                    'action' => 'messages'));
            }
        }else {
            $this->flash->error("This receiver does not exist");
            echo json_encode("User does not exist");
            return $this->dispatcher->forward(array(
                'controller' => 'student',
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

    public function settingsAction()
    {
        $this->view->msgCount = $this->session->get('msgCount');
        $this->view->applied = $this->session->get('applied');
        $this->view->appID = $this->session->get('appID');
    }

    public function faqAction()
    {
        $this->view->msgCount = $this->session->get('msgCount');
        $faq = Faq::find("description = 'student'");

        $this->view->faq = $faq;
    }

    public function updateSettingsAction()
    {
        $this->view->disable();
        if($this->request->isPost())
        {
            $validation = new Phalcon\Validation();
            $validation->add('email', new Email(array(
                'message' => 'The e-mail is not valid'
            )));

            $user = $this->session->get('userID');
            if($this->request->getPost('action')=="cancel")
            {

                $appID = $this->request->getPost('appID');
                $a = Application::findFirst("id = '$appID'");
                $a->status = 7;
                $a->save();


                $u = User::findFirst("id = '$user'");
                $u->applied = 0;
                $u->save();
                $this->session->set("applied", 0);


                echo "Your application has been cancelled and will no longer be processed.";

            }

            if($this->request->getPost('action')=="email")
            {
                $e =  $this->request->getPost('email');
                $messages = $validation->validate($_POST);
                if (count($messages)) {
                    foreach ($messages as $message) {
                        echo $message;
                    }
                }
                else {
                    $uX = User::findFirst("email = '$e'");
                    if($uX)
                    {
                        echo "This email address has already been taken. Try another.";
                    }
                    else{
                        $u = User::findFirst("id = '$user'");
                        $u->email = $e;
                        $u->update();
                        $this->session->destroy();
                        echo "Your email address has been updated. Please log out and log in again.";
                    }

                }


            }
        }

    }




}