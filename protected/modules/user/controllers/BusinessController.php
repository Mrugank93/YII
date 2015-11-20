<?php
/**
 * Created by sajib.
 * Email: sajib.cse03@gmail.com
 * Date: 2/24/13 5:43 AM
 */
class BusinessController extends Controller
{
	//public $defaultAction = 'basic';

	public function actionIndex()
	{
        Yii::app()->theme = 'signup';

        Yii::import('application.modules.webPageOnFly.models.*');

        $user = new User();
		$user->setScenario('commonSingup');

        $userDetails = new BusinessProfile();
        $userDetails->setScenario('businessSignup');



		if(isset($_POST['User']) || isset($_POST['BusinessProfile']))
		{

			$user->attributes= $_POST['User'];
			$user->email_status= $_POST['User']['email_status'];
            $user->user_type_id = 7;
            $userDetails->attributes = $_POST['BusinessProfile'];

            $user->validate();
            if($userDetails->validate())
            {
                $transaction = Yii::app()->db->beginTransaction();
                try
                {
                    if($user->save())
                    {
                        $userDetails->user_id = $user->user_id;
                        if($userDetails->save())
                        {
                            $transaction->commit();
                            Yii::app()->user->setFlash('success', 'Congratulation your account has been created successfuly.');
                            $this->redirect(array('/user/login'));
                        }
                    }
                }
                catch (Exception $e)
                {
                    $transaction->rollback();
                    print_r($e);

                }
            }

		}


		$this->render('/business/business',array('user'=>$user,'userDetails'=>$userDetails));



	}

}