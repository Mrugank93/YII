<?php
/**
 * Created by sajib.
 * Email: sajib.cse03@gmail.com
 * Date: 2/24/13 5:43 AM
 */
class VipController extends Controller
{
	//public $defaultAction = 'basic';

	public function actionIndex()
	{
		$user = new User();
		$user->setScenario('commonSingup');

        $userDetails = new UserDetails();
        $userDetails->setScenario('vipSignup');

		if(isset($_POST['User']) || isset($_POST['UserDetails']))
		{

			$user->setAttributes($_POST['User']);
            $user->user_type_id = 7;
            $userDetails->setAttributes($_POST['UserDetails']);

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
                }



            }

		}


		$this->render('/vip/vip',array('user'=>$user,'userDetails'=>$userDetails));

	}

}