<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
    private $_name;
	const ERROR_EMAIL_INVALID=3;
	const ERROR_STATUS_NOTACTIV=4;
	const ERROR_STATUS_BAN=5;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'frontend'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

	    $user=User::model()->findByAttributes(array('email'=>$this->username,'password'=>sha1($this->password)));

		if($user===null)
		{
				$this->errorCode=self::ERROR_EMAIL_INVALID;
		}
		else if($user->status=='Pending')
		{
			$this->errorCode=self::ERROR_STATUS_NOTACTIV;
		}
		else if($user->status=='Inactive')
		{
			$this->errorCode=self::ERROR_STATUS_BAN;
		}
		else
		{
			$this->_id = $user->user_id;
			$this->errorCode=self::ERROR_NONE;
			$this->setState('roles',$user->userType->type_name);
            if($user->user_type_id==5 || $user->user_type_id==6 || $user->user_type_id==1 )
            {
                $this->setState('state_id',$user->userDetails->state_id);
                $this->setState('city_id',$user->userDetails->city_id);

                $this->_name=$user->userDetails->first_name;
            }
            else if($user->user_type_id==7)
            {
                $this->setState('state_id',$user->businessOwnerDetails->state_id);
                $this->setState('city_id',$user->businessOwnerDetails->city_id);

                $this->_name=$user->businessOwnerDetails->business_profile_name;

            }

		}

		return !$this->errorCode;

	}
    
    /**
    * @return integer the ID of the user record
    */
	public function getId()
	{
		return $this->_id;
	}

    public function getName()
    {
        return $this->_name;
    }
}