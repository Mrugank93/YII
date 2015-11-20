<?php

class WebUser extends CWebUser
{

    public function getRole()
    {
        return $this->getState('roles');
    }

	public function checkAccess($operation, $params=array())
	{
		if (empty($this->id)) { // Not identified => no rights
			return false;
		}

		$role = $this->getState("roles"); // Get role of user
		if ($role === $operation) {
			return true; // admin role has access to everything
		}

		if (strstr($operation,$role) !== false) { // Check if multiple roles are available
			return true;
		}

		return ($operation === $role);// allow access if the operation request is the current user's role
	}

    protected function afterLogin($fromCookie)
	{
        parent::afterLogin($fromCookie);
        //$this->updateSession();
	}

    public function updateSession() {
        $user = Yii::app()->getModule('user')->user($this->id);
        $userAttributes = CMap::mergeArray(array(
                                                'email'=>$user->email,
                                                'username'=>$user->username,
                                                'create_at'=>$user->create_at,
                                                'lastvisit_at'=>$user->lastvisit_at,
                                           ),$user->profile->getAttributes());
        foreach ($userAttributes as $attrName=>$attrValue) {
            $this->setState($attrName,$attrValue);
        }
    }

//    public function model($id=0) {
//        return Yii::app()->getModule('user')->user($id);
//    }
//
//    public function user($id=0) {
//        return $this->model($id);
//    }
//
//    public function getUserByName($username) {
//        return Yii::app()->getModule('user')->getUserByName($username);
//    }
//
//    public function getAdmins() {
//        return Yii::app()->getModule('user')->getAdmins();
//    }
//
//    public function isAdmin() {
//        return Yii::app()->getModule('user')->isAdmin();
//    }
//
//	public function isMerchant()
//	{
//		if($this->getState('__role')=='merchant')
//			return true;
//		else
//			return false;
//	}

}