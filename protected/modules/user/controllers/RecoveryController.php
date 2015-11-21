<?php

class RecoveryController extends Controller
{
	//public $defaultAction = 'Index';

	public function actionIndex()
	{
		echo (Yii::app()->request->url);
		if(Yii::app()->user->isGuest)
		{
			$model = new UserLogin();

			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
				{
					$this->redirect(Yii::app()->user->returnUrl);
				}
			}

			$this->render('/user/login',array('model'=>$model));
		}

	}



}