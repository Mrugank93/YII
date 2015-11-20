<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property integer $user_type_id
 * @property string $password
 * @property string $email
 * @property string $email_status
 * @property string $activationkey
 * @property string $status
 * @property integer $create_at
 * @property integer $lastvisit_at
 * @property integer $reset_password_validity
 *
 * The followings are the available model relations:
 * @property Profiles $profile
 * @property Usertype $userType
 */
class User extends CActiveRecord
{

	public $oldPassword;
    public $currentPassword;
    public $confirmPassword;
    public $confirmEmail;

    public $cell_first;
    public $cell_middle;
    public $cell_last;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password','required','on'=>'commonSingup'),
			array('email','unique'),
			array('password','required','on'=>'update'),
			array('user_type_id, create_at, lastvisit_at , cell_first, cell_middle, cell_last', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'min'=>6),
			array('email','unique'),
			array('email, confirmEmail','email'),
            array('confirmEmail', 'compare', 'compareAttribute' => 'email', 'on'=>'commonSingup'),
            array('confirmPassword', 'compare', 'compareAttribute' => 'password', 'on'=>'commonSingup'),

            array('currentPassword', 'validateCurrentPassword', 'on'=>'updateProfile'),
            array('confirmPassword', 'validateConfirmPassword', 'on'=>'updateProfile'),

            array('cell_first,cell_middle', 'length', 'min'=>3,'max'=>3),
            array('cell_last', 'length', 'min'=>4,'max'=>4),
            array('cell_first', 'validateUSPhone'),

			array('password, email, activationkey', 'length', 'max'=>128),
			array('status', 'length', 'max'=>8),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_type_id, password, email, email_status ,activationkey, status, create_at, lastvisit_at', 'safe', 'on'=>'search'),
		);
	}
    public function validateCurrentPassword($attribute, $params)
    {
        if($this->currentPassword!=null && sha1($this->currentPassword)!=$this->oldPassword)
        {
            $this->addError('currentPassword', 'This is not your current password.');
        }
        elseif($this->password==null && $this->currentPassword!=null)
        {
            $this->addError('password', 'Enter your new password.');
        }
    }
    public function validateConfirmPassword($attribute, $params)
    {
        if(strlen($this->password)>=6 && $this->password!=$this->confirmPassword)
        {
            $this->addError('confirmPassword', 'Confirm Password must be repeated exactly.');
        }
    }

    public function validateUSPhone($attribute, $params)
    {
        if($this->cell_first!=null || $this->cell_middle!=null || $this->cell_last!=null)
        {
            if($this->cell_first==null)
            {
                $this->addError('cell_first', $this->cell_first.' Please 3 digits');
            }
            if($this->cell_middle==null)
            {
                $this->addError('cell_middle', $this->cell_middle.'Please 3 digits');
            }
            if($this->cell_last==null)
            {
                $this->addError('cell_last', $this->cell_last.' Please last 4 digits');
            }

        }

    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
        Yii::import('application.modules.webPageOnFly.models.*');
		return array(
			'userType' => array(self::BELONGS_TO, 'Usertype', 'user_type_id'),
			'userDetails' => array(self::BELONGS_TO, 'UserDetails', 'user_id'),
			'businessOwnerDetails' => array(self::BELONGS_TO, 'PageOnFly', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        if($this->getScenario()=='updateProfile')
        {
            return array(
                'user_id' => 'user_id',
                'user_type_id' => 'User Type',
                'oldPassword' => 'Current password',
                'password' => 'New password',
                'confirmPassword' => 'Repeat new password',
                'email' => 'Email',
                'email_status' => 'Email Status',
                'confrimEmail' => 'Confirm Email',
                'activationkey' => 'Activation Key',
                'status' => 'Status',
                'create_at' => 'Create At',
                'lastvisit_at' => 'Lastvisit At',
                'reset_password_validity' => 'Reset key validity.',
            );
        }


		return array(
			'user_id' => 'user_id',
			'user_type_id' => 'User Type',
			'password' => 'Password',
			'confirmPassword' => 'Confirm Password',
			'email' => 'Email',
			'email_status' => 'Email Status',
			'confrimEmail' => 'Confirm Email',
			'activationkey' => 'Activation Key',
			'status' => 'Status',
			'create_at' => 'Create At',
			'lastvisit_at' => 'Lastvisit At',
			'reset_password_validity' => 'Reset key validity.',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_type_id',$this->user_type_id);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activationkey',$this->activationkey,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('create_at',$this->create_at);
		$criteria->compare('lastvisit_at',$this->lastvisit_at);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	protected function beforeSave()
	{

		if($this->isNewRecord)
		{
			$this->create_at = time();
			$this->status = 'Active';
			$this->activationkey = md5(time().'goodlynx');
			$this->activationkey = sha1(uniqid(mt_rand(10000,99999).time().$this->email));
			$this->password = sha1($this->password);
		}
  		else if($this->getScenario()=='updateProfile')
		{
            if($this->password==null)
                $this->password = $this->oldPassword;
            else
                $this->password= sha1($this->password);
        }


		return parent::beforeSave();
	}


}