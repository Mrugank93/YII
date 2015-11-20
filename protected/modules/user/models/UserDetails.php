<?php

/**
 * This is the model class for table "user_details".
 *
 * The followings are the available columns in table 'user_details':
 * @property integer $user_id
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property string $first_name
 * @property string $last_name
 * @property string $cell_phone
 * @property string $dob
 * @property string $sex
 * @property string $street
 * @property string $suite
 * @property string $postal_code
 *
 * The followings are the available model relations:
 * @property CityList $city
 * @property CountryList $country
 * @property StateList $state
 * @property User $user
 */
class UserDetails extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserDetails the static model class
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
		return 'user_details';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id', 'required','on'=>'basicSignup'),
			array('city_id, cell_phone, postal_code ,first_name', 'required','on'=>'vipSignup'),
            array('cell_phone', 'validateUSPhone'),
			array('user_id, country_id, state_id, city_id', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, cell_phone, postal_code', 'length', 'max'=>20),
			array('sex', 'length', 'max'=>6),
            array('dob', 'safe'),
			array('street, suite', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, country_id, state_id, city_id, first_name, last_name, cell_phone, dob, sex, street, suite, postal_code', 'safe', 'on'=>'search'),
		);
	}
    public function validateUSPhone($attribute, $params)
    {
        $regex= '/(\d)?(\s|-)?(\()?(\d){3}(\))?(\s|-){1}(\d){3}(\s|-){1}(\d){4}/';
        if($this->cell_phone!=null)
        {
            if(!preg_match($regex, $this->cell_phone))
            {
                $this->addError('cell_phone', 'Invalid US phone number. Phone number like: <strong>301-111-1111</strong>');
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
		return array(
			'city' => array(self::BELONGS_TO, 'CityList', 'city_id'),
			'country' => array(self::BELONGS_TO, 'CountryList', 'country_id'),
			'state' => array(self::BELONGS_TO, 'StateList', 'state_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User',
			'country_id' => 'Country',
			'state_id' => 'State',
			'city_id' => 'City',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'cell_phone' => 'Phone Number',
			'dob' => 'Date of birth',
			'sex' => 'Gender',
			'street' => 'Street',
			'suite' => 'Suite',
			'postal_code' => 'Postal Code',
		);
	}


    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->country_id = 2;
            $this->state_id = 61;
        }
        return parent::beforeSave();
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
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('dob',$this->dob);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('suite',$this->suite,true);
		$criteria->compare('postal_code',$this->postal_code,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}