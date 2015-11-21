<?php


/**
 * This is the model class for table "business_profile".
 *
 * The followings are the available columns in table 'business_profile':
 * @property integer $user_id
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property integer $category_id
 * @property string $business_profile_name
 * @property string $address
 * @property string $street
 * @property string $suite
 * @property string $postal_code
 * @property string $website
 * @property string $phone_number
 * @property string $business_hours
 * @property string $map_url
 * @property string $section1_title
 * @property string $section1_content
 * @property string $section2_title
 * @property string $section2_content
 * @property string $section3_title
 * @property string $section3_content
 * @property string $header_image
 * @property string $image_source
 * @property string $status
 *
 * The followings are the available model relations:
 * @property CityList $city
 * @property CountryList $country
 * @property StateList $state
 * @property User $user
 */
class PageOnFly extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BusinessProfile the static model class
	 */

    public $business_map_url;

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'business_profile';
	}

    /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('business_profile_name, map_url, section1_title, section2_title, section3_title, section1_content, section2_content, section3_content', 'required','on'=>'insert'),
			array('business_profile_name','unique'),
			array('business_profile_name','required', 'on'=>'basic'),
			array('header_image', 'required','on'=>'header'),

			array('business_profile_name, city_id, category_id ', 'required','on'=>'businessSignup'),
            array('phone_number', 'validateUSPhone'),
            array('category_id','safe'),

            array('country_id, state_id, city_id', 'numerical', 'integerOnly'=>true),
            array('business_profile_name, address, map_url, header_image', 'length', 'max'=>100),
            array('street,suite, website, section1_title, section2_title, section3_title', 'length', 'max'=>50),
            array('postal_code, phone_number', 'length', 'max'=>20),
            array('business_hours', 'length', 'max'=>200),
            array('section1_content, section2_content, section3_content', 'length', 'max'=>400),
            array('image_source', 'length', 'max'=>8),
            array('status', 'length', 'max'=>7),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('user_id, country_id, state_id, city_id, category_id ,business_profile_name, address, street, suite, postal_code, website, phone_number, business_hours, map_url, section1_title, section1_content, section2_title, section2_content, section3_title, section3_content, header_image, image_source, status', 'safe', 'on'=>'search'),
		);

	}

    public function validateUSPhone($attribute, $params)
    {
        $regex= '/(\d)?(\s|-)?(\()?(\d){3}(\))?(\s|-){1}(\d){3}(\s|-){1}(\d){4}/';
        if($this->phone_number!=null)
        {
            if(!preg_match($regex, $this->phone_number))
            {
                $this->addError('phone_number', 'Invalid US phone number. Phone number like: <strong>301-111-1111</strong>');
            }
        }

    }
	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		Yii::import('application.modules.user.models.*');

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
            'category_id' => 'Category',
            'business_profile_name' => 'Business Name',
            'address' => 'Address',
            'street' => 'Street',
            'suite' => 'Suite',
            'postal_code' => 'Postal Code',
            'website' => 'Website',
            'phone_number' => 'Phone Number',
            'business_hours' => 'Business Hours',
            'map_url' => 'Map Url',
            'business_map_url' => 'Business Page',
            'section1_title' => 'Section1 Title',
            'section1_content' => 'Section1 Content',
            'section2_title' => 'Section2 Title',
            'section2_content' => 'Section2 Content',
            'section3_title' => 'Section3 Title',
            'section3_content' => 'Section3 Content',
            'header_image' => 'Header Image',
            'image_source' => 'Image Source',
            'status' => 'Status',
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
        $criteria->compare('country_id',$this->country_id);
        $criteria->compare('state_id',$this->state_id);
        $criteria->compare('city_id',$this->city_id);
        $criteria->compare('category_id',$this->category_id,true);
        $criteria->compare('business_profile_name',$this->business_profile_name,true);
        $criteria->compare('address',$this->address,true);
        $criteria->compare('street',$this->street,true);
        $criteria->compare('suite',$this->suite,true);
        $criteria->compare('postal_code',$this->postal_code,true);
        $criteria->compare('website',$this->website,true);
        $criteria->compare('phone_number',$this->phone_number,true);
        $criteria->compare('business_hours',$this->business_hours,true);
        $criteria->compare('map_url',$this->map_url,true);
        $criteria->compare('section1_title',$this->section1_title,true);
        $criteria->compare('section1_content',$this->section1_content,true);
        $criteria->compare('section2_title',$this->section2_title,true);
        $criteria->compare('section2_content',$this->section2_content,true);
        $criteria->compare('section3_title',$this->section3_title,true);
        $criteria->compare('section3_content',$this->section3_content,true);
        $criteria->compare('header_image',$this->header_image,true);
        $criteria->compare('image_source',$this->image_source,true);
        $criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    protected function beforeSave()
    {
        if($this->isNewRecord)
        {
            $this->country_id = 2;
            $this->state_id = 61;
        }

        $this->business_profile_name =  strtolower($this->business_profile_name);

        $this->map_url = preg_replace("![^a-z0-9]+!i", "-", $this->business_profile_name);

        $this->map_url = str_replace('.' , '-', str_replace('&', '', str_replace(',', '-', $this->map_url)));

        return parent::beforeSave();
    }

}