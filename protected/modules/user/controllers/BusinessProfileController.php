<?php
/**
 * Created by sajib.
 * Email: sajib.cse03@gmail.com
 * Date: 2/24/13 5:43 AM
 */
class BusinessProfileController extends Controller
{
	//public $defaultAction = 'basic';

	public function actionIndex()
	{
        Yii::app()->theme = 'admin';

        $id =  Yii::app()->user->getId();

        // echo Yii::app()->user->getId();
        // exit();

		$user = User::model()->findByPk($id);
        $user->setScenario('updateProfile');

        $user->oldPassword = $user->password;
        $user->password='';

        //echo PageOnFly::model()->findByPk($id);;
        //exit();

        $userDetails = PageOnFly::model()->findByPk($id);

        //if($userDetails != null)
        {

        $userDetails->business_map_url = Yii::app()->getBaseUrl(true).'/';

        $userDetails->business_map_url .=strtolower($userDetails->state->state_iso).'/';

        $userDetails->business_map_url .=str_replace(' ','-',strtolower($userDetails->city->city_short_name)).'/';

        $userDetails->business_map_url .=$userDetails->map_url.'.html';
        }

        //$userDetails->setScenario('basicSignup');

        if(isset($_POST['User']) || isset($_POST['UserDetails']))
        {
            $user->attributes =  $_POST['User'];

            $userDetails->attributes = $_POST['PageOnFly'];

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



        $this->render('/businessProfile/_form',array('user'=>$user,'userDetails'=>$userDetails));

	}

}