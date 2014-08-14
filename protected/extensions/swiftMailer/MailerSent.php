<?php
/**
 * Created by JetBrains PhpStorm.
 * User: levabd
 * Date: 15.08.13
 * Time: 12:24
 * To change this template use File | Settings | File Templates.
 */

class MailerSent {

	private $Mailer;

	public function init($host=null, $port=null, $ssl=null, $user=null, $pass=null) {

		$this->configure($host, $port, $ssl, $user, $pass);

	}

	public function configure($host=null, $port=null, $ssl=null, $user=null, $pass=null) {

		$Transport = Yii::app()->swiftMailer->smtpTransport(
			(($host === null) && isset(Yii::app()->params['emailSent']['mailHost'])) ? Yii::app()->params['emailSent']['mailHost'] : $host,
			(($port === null) && isset(Yii::app()->params['emailSent']['mailPort'])) ? Yii::app()->params['emailSent']['mailPort'] : $port,
			(($ssl === null) && isset(Yii::app()->params['emailSent']['ssl'])) ? Yii::app()->params['emailSent']['ssl'] : $ssl,
			(($user === null) && isset(Yii::app()->params['emailSent']['user'])) ? Yii::app()->params['emailSent']['user'] : $user,
			(($pass === null) && isset(Yii::app()->params['emailSent']['pass'])) ? Yii::app()->params['emailSent']['pass'] : $pass);

		$this->Mailer = Yii::app()->swiftMailer->mailer($Transport);

	}

	public function sendMail($topic, $content, $to, $from = null)
	{
		$Message = Yii::app()->swiftMailer
			->newMessage($topic)
			->setFrom((($from === null) && isset(Yii::app()->params['emailSent']['defaultFrom'])) ? Yii::app()->params['emailSent']['defaultFrom'] : $from)
			->setTo($to)
			->setBody($content, 'text/html');

		// Send mail
		return $this->Mailer->send($Message);
	}
}