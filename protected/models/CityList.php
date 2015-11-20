<?php

/**
 * This is the model class for table "city_list".
 *
 * The followings are the available columns in table 'city_list':
 * @property integer $city_id
 * @property integer $state_id
 * @property integer $country_id
 * @property string $city_short_name
 * @property string $city_long_name
 *
 * The followings are the available model relations:
 * @property BusinessProfile[] $businessProfiles
 * @property CountryList $country
 * @property StateList $state
 * @property Deals[] $deals
 * @property UserDetails[] $userDetails
 */
class CityList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CityList the static model class
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
		return 'city_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('city_id', 'required'),
			array('city_id, state_id, country_id', 'numerical', 'integerOnly'=>true),
			array('city_short_name', 'length', 'max'=>10),
			array('city_long_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('city_id, state_id, country_id, city_short_name, city_long_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'businessProfiles' => array(self::HAS_MANY, 'BusinessProfile', 'city_id'),
			'country' => array(self::BELONGS_TO, 'CountryList', 'country_id'),
			'state' => array(self::BELONGS_TO, 'StateList', 'state_id'),
			'deals' => array(self::HAS_MANY, 'Deals', 'deal_city_id'),
			'userDetails' => array(self::HAS_MANY, 'UserDetails', 'city_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'city_id' => 'City',
			'state_id' => 'State',
			'country_id' => 'Country',
			'city_short_name' => 'City Short Name',
			'city_long_name' => 'City Long Name',
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

		$criteria->compare('city_id',$this->city_id);
		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('city_short_name',$this->city_short_name,true);
		$criteria->compare('city_long_name',$this->city_long_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}