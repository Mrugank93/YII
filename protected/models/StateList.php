<?php

/**
 * This is the model class for table "state_list".
 *
 * The followings are the available columns in table 'state_list':
 * @property integer $state_id
 * @property integer $country_id
 * @property string $state_name
 * @property string $state_iso
 *
 * The followings are the available model relations:
 * @property Users[] $users
 */
class StateList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return StateList the static model class
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
		return 'state_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('country_id', 'required'),
			array('country_id', 'numerical', 'integerOnly'=>true),
			array('state_name', 'length', 'max'=>100),
			array('state_iso', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('state_id, country_id, state_name, state_iso', 'safe', 'on'=>'search'),
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
			'users' => array(self::HAS_MANY, 'Users', 'state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'state_id' => 'State',
			'country_id' => 'Country',
			'state_name' => 'State Name',
			'state_iso' => 'State Iso',
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

		$criteria->compare('state_id',$this->state_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('state_name',$this->state_name,true);
		$criteria->compare('state_iso',$this->state_iso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}