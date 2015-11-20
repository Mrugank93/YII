<?php
/**
 * Created by sajib.
 * Email: sajib.cse03@gmail.com
 * Date: 2/24/13 5:43 AM
 */
class ProfileController extends Controller
{
	//public $defaultAction = 'basic';

	public function actionIndex()
	{

        $id =  Yii::app()->user->getId();

		$user = User::model()->findByPk($id);
        $user->setScenario('updateProfile');

        $user->oldPassword = $user->password;
        $user->password='';

        $userDetails = UserDetails::model()->findByPk($id);

        //$userDetails->setScenario('basicSignup');

        if(isset($_POST['User']) || isset($_POST['UserDetails']))
        {

            $user->attributes =  $_POST['User'];

            $userDetails->attributes = $_POST['UserDetails'];

            if($userDetails->cell_phone!=null)
                $user->user_type_id = 6;
            else
                $user->user_type_id = 5;

            $transaction = Yii::app()->db->beginTransaction();
            try
            {
                if($user->save())
                {

                    if($userDetails->save())
                    {
                        $transaction->commit();
                        $user->confirmPassword = '';
                        $user->password ='';
                        $user->currentPassword='';
                    }
                }
            }
            catch(Exception $e)
            {
                $transaction->rollback();
            }

        }



        $this->render('/profile/_form',array('user'=>$user,'userDetails'=>$userDetails));

	}

}