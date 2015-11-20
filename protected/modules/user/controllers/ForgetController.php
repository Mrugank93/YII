<?php

class ForgetController extends Controller
{
	public $defaultAction = 'Index';

	public function actionIndex()
	{

		if(Yii::app()->user->isGuest)
		{
			$model = new UserLogin();
			$model->setScenario('forgetPassword');

			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];

				$model->validate();

				if(!$model->hasErrors('forgetPassword'))
				{

					Yii::import('application.modules.user.library.*');

					$user = User::model()->findByAttributes(array('email'=>$model->forgetPassword));
					$user->setScenario('');

					if($user===null)
					{
						Yii::app()->user->setFlash('error', 'Incorrect eamil.');
					}

					if($user->reset_password_validity<time())
					{
						$user->activationkey = sha1(uniqid(mt_rand(10000,99999).time().$model->forgetPassword));
						$user->reset_password_validity = ( time()+(6*60*60));

						if($user->save())
						{
							Yii::app()->user->setFlash('success', 'Password reset link has been sent on your mail');

							Yii::import('application.modules.EmailFormat.models.*');

							$emailFormat = EmailFormat::model()->findByAttributes(array('email_id'=>'password_forgotten'));

							$url = Yii::app()->createAbsoluteUrl('/user/activation/reset/', array('email'=>$user->email,'activeKey'=>$user->activationkey));
							$emailTemplate = Utility::EmailTemplate();
							$emailTemplate->setAttributesByArray(
								array('User Name'=>$user->username,
									  'Password Reset Link'=>$url,
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
							try
							{
								$mail->send();
							}
							catch(Exception $e)
							{
								Yii::app()->user->setFlash('error', $e);
							}

						}

					}
					else
					{
						$time = $user->reset_password_validity - time();
						$hour = floor(abs( abs($time / 60)/60));
						$time = $time - ($hour*60*60);
						$min = ceil(abs($time / 60));

						Yii::app()->user->setFlash('error', 'You have wait '.$hour.' hours and '.$min.' minutes');
					}


					$this->redirect(array('/user/login'));
				}

			}

			$this->render('/forget/forget',array('model'=>$model));
		}

	}



}