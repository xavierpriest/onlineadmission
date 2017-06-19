<?php

use Phalcon\Mvc\User\Component,
	Phalcon\Mvc\View;

require_once __DIR__ . '/../../vendor/Swift/swift_required.php';
/**
 *
 * Sends e-mails based on pre-defined templates
 */
class Mail extends Component
{

	protected $_transport;

	
	

	/**
	 * Applies a template to be used in the e-mail
	 *
	 * @param string $name
	 * @param array $params
	 */
	public function getTemplate($name, $params)
	{

		$parameters = array_merge(array(
			'publicUrl' => '127.0.0.1/OnlineAdmission',
		), $params);

		return $this->view->getRender('emailTemplates', $name, $parameters, function($view){
			$view->setRenderLevel(View::LEVEL_LAYOUT);
		});

		return $view->getContent();
	}

	/**
	 * Sends e-mails via gmail based on predefined templates
	 *
	 * @param array $to
	 * @param string $subject
	 * @param string $name
	 * @param array $params
	 */
	public function send($to, $subject, $name, $params)
	{
		//Settings
		$mailSettings = array(
            'fromName' => 'paul.yhwh@gmail.com',
            'fromEmail' => 'priesthud@yahoo.com',
            'smtp' => array(
                'server' => 'smtp.gmail.com',
                'port' => 465,
                'security' => 'ssl',
                'username' => 'paul.yhwh@gmail.com',
                'password' => 'thanks2jesus'

            )
        );

		$template = $this->getTemplate($name, $params);

		// Create the message
		$message = Swift_Message::newInstance()
  			->setSubject($subject)
  			->setTo($to)
  			->setFrom("paul.yhwh@gmail.com"
  			)
  			->setBody($template, 'text/html');
  			if (!$this->_transport) {
				$this->_transport = Swift_SmtpTransport::newInstance(
					'smtp.gmail.com',
					465,
					'ssl'
				)
		  			->setUsername('paul.yhwh@gmail.com')
		  			->setPassword('thanks2jesus');
		  	}

		  	// Create the Mailer using your created Transport
			$mailer = Swift_Mailer::newInstance($this->_transport);

			return $mailer->send($message);
	}

}