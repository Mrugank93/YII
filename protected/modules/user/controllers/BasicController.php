<?php
/**
 * Created by sajib.
 * Email: sajib.cse03@gmail.com
 * Date: 2/24/13 5:43 AM
 */
class BasicController extends Controller
{
	//public $defaultAction = 'basic';

	public function actionIndex()
	{
        Yii::app()->theme = 'signup';

		$user = new User();
		$user->setScenario('commonSingup');

        $userDetails = new UserDetails();
        $userDetails->setScenario('basicSignup');

		if(isset($_POST['User']) || isset($_POST['UserDetails']))
		{
			$user->setAttributes($_POST['User']);

            if($user->cell_first!=null)
                $user->user_type_id = 6;
            else
                $user->user_type_id = 5;

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

                        if($user->cell_first!=null)
                        $userDetails->cell_phone = $user->cell_first.'-'.$user->cell_middle.'-'.$user->cell_last;
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


		$this->render('/basic/basic',array('user'=>$user,'userDetails'=>$userDetails));

	}

}