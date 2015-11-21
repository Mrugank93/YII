<?php

class LogoutController extends Controller
{
	//public $defaultAction = 'Index';
	public function actionIndex()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

}