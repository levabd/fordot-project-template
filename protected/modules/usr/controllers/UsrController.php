<?php

abstract class UsrController extends CController
{

    public $selfPageTitle = '';

	/**
	 * Sends out an email containing instructions and link to the email verification
	 * or password recovery page, containing an activation key.
	 * @param CFormModel $model it must have a getIdentity() method
	 * @param strign $mode 'recovery', 'verify' or 'oneTimePassword'
	 * @return boolean if sending the email succeeded
	 */
	public function sendEmail(CFormModel $model, $mode)
	{
		$params = array(
			'siteUrl' => $this->createAbsoluteUrl('/'), 
		);
		switch($mode) {
		default: return false;
		case 'recovery':
		case 'verify':
            $topic = $mode == 'recovery' ? Yii::t('UsrModule.usr', 'Password recovery') : Yii::t('UsrModule.usr', 'Email address verification');
			$params['actionUrl'] = $this->createAbsoluteUrl('default/'.$mode, array(
				'activationKey'=>$model->getIdentity()->getActivationKey(),
				'username'=>$model->getIdentity()->getName(),
			));
			break;
		case 'oneTimePassword':
            $topic = Yii::t('UsrModule.usr', 'One Time Password');
			$params['code'] = $model->getNewCode();
			break;
		}
        $mail = $this->module->mailer;
		$body = $this->renderPartial($mail->getPathViews().'.'.$mode, $params, true);
		$full = $this->renderPartial($mail->getPathLayouts().'.email', array('content'=>$body), true);
        if (Yii::app()->mailerSent->sendMail(
            $topic,
            $full,
            array($model->getIdentity()->getEmail() =>  $model->getIdentity()->getName()),
            array($this->module->mailerConfig['SetFrom'][0] => $this->module->mailerConfig['SetFrom'][1]))) {
            return true;
        } else {
            return false;
        }
	}
}
