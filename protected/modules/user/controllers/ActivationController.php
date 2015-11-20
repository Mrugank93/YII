<?php

class ActivationController extends Controller
{
	public $defaultAction = 'activate';

	public function actionActivate()
	{
		Yii::import('application.modules.user.library.*');

		$email =  Yii::app()->request->getParam('email');
		$activeKey =Yii::app()->request->getParam('activeKey');

		$user = User::model()->findByAttributes(array('email'=>$email,'activationkey'=>$activeKey));

		$user->setScenario('');

		//echo $user->getScenario();

		if($user===null)
		{
			Yii::app()->user->setFlash('error', 'Incorrect activation key.');
		}
		else
		{
			if($user->status=='Pending')
			{
				$user->status ='Active';

				if($user->save())
				{
					Yii::import('application.modules.EmailFormat.models.*');

					$emailFormat = EmailFormat::model()->findByAttributes(array('email_id'=>'welcome_message'));
					$mail = Utility::Mail();
					$mail->body = $emailFormat->email_text;
					$mail->to = $user->email;
					$mail->subject = $emailFormat->email_title;
					$mail->send();

					Yii::app()->user->setFlash('success', 'Your account is activated');
				}
				else
					Yii::app()->user->setFlash('error', 'Please unable to activated account');
			}
			else if($user->status=='Active')
			{
				Yii::app()->user->setFlash('error', 'Your account already activated');
			}
			else
			{
				Yii::app()->user->setFlash('error', 'Your account is Inactive. Please contact with admin');
			}


		}

		$this->render('/message/activation') ;

	}

	public function actionReset()
	{

		$email =  Yii::app()->request->getParam('email');
		$activeKey =Yii::app()->request->getParam('activeKey');

		$user = User::model()->findByAttributes(array('email'=>$email,'activationkey'=>$activeKey));
		$user->setScenario('reset');

		if($user===null)
		{
			Yii::app()->user->setFlash('error', 'Incorrect activation link.');
		}
		else
		{
			if($user->reset_password_validity>time())
			{
				Yii::import('application.modules.user.library.*');

				$password = md5(uniqid($user->email.time()));

				$user->password = $password;
				$user->reset_password_validity='';

				if($user->save())
				{

					Yii::import('application.modules.EmailFormat.models.*');

					Yii::app()->user->setFlash('success', 'Temporary Password has been sent on your mail');

					$emailFormat = EmailFormat::model()->findByAttributes(array('email_id'=>'password_changed'));

					$emailTemplate = Utility::EmailTemplate();
					$emailTemplate->setAttributesByArray(
						array('User Name'=>$user->username,
							  'Reset Password'=>$password,
							  'Web Site'=>Yii::app()->name
						),
						array(
							'prefix'=>'{{',
							'postfix'=>'}}'
						),
						$emailFormat->email_text
					);

					$mail = $emailTemplate->sendMail();
					$mail->body = $emailTemplate->getEmailBody();
					$mail->subject = $emailFormat->email_title;
					$mail->from =  Yii::app()->params['supportEmail'];
					$mail->to = $user->email;
					$mail->send();
				}
				else
				{
					Yii::app()->user->setFlash('error', 'Please unable to reset your account');
				}
			}
			else
			{
				Yii::app()->user->setFlash('error', 'Expired your activation link. please reset again');
			}


		}

		$this->render('/message/activation') ;

	}


}