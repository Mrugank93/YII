<?php
class UserModule extends CWebModule
{
	public $basic = array("/user/basic");
	public $vip = array("/user/vip");
	public $business = array("/user/business");
	public $recoveryUrl = array("/user/recovery/recovery");
	public $loginUrl = array("/user/login");
	public $logoutUrl = array("/user/logout");
	public $profileUrl = array("/user/profile");
	public $returnLogoutUrl = array("/user/login");

	public $tableUser = 'user';
	public $tableProfile = 'profile';
	public $tableUserType = 'userType';

    public $rememberMeTime = '3600*24*30';

	public $sendActivationMail=false;
	public $activeAfterRegister=false;
	public $loginNotActiv = false;



	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application
		// import the module-level models and components
		$this->setImport(array(
			'user.models.*',
			'user.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}
