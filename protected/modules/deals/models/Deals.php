<?php

/**
 * This is the model class for table "deals".
 *
 * The followings are the available columns in table 'deals':
 * @property integer $deal_id
 * @property integer $deal_owner_id
 * @property integer $category_id
 * @property integer $deal_state_id
 * @property integer $deal_city_id
 * @property string $deal_name
 * @property string $deal_large_image
 * @property string $deal_small_image
 * @property string $deal_description1
 * @property string $deal_description2
 * @property string $deal_regular_price
 * @property string $deal_sale_price
 * @property integer $deal_start_date
 * @property integer $deal_end_date
 * @property integer $deal_available
 * @property integer $purchase_min
 * @property integer $purchase_max
 * @property integer $limit_per_user
 * @property integer $lastdate_deal_purchased
 * @property integer $lastdate_deal_redeemed
 * @property string $deal_details
 * @property string $deal_fine_print
 * @property string $deal_highlights
 * @property string $deal_key_word
 * @property string $deal_key_phrases
 * @property integer $deal_sold
 * @property integer $deal_visit
 * @property integer $deal_created_date
 * @property string $deal_misstatements
 * @property string $deal_commission
 * @property string $deal_charge_card
 * @property string $deal_status
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property CityList $dealCity
 * @property User $dealOwner
 * @property StateList $dealState
 */
class Deals extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Deals the static model class
	 */
    public $start_date;
    public $end_date;
    public $deal_limit;
    public $deal_link;
    public $deal_discount;

    public $large_image;
    public $small_image;

    public $date_format = 'd/m/Y';

    public $purchase_date;
    public $redeem_date;


	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'deals';
	}
	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

		    array('deal_owner_id, lastdate_deal_purchased, lastdate_deal_redeemed ,category_id, deal_state_id, deal_city_id, deal_available, purchase_min, purchase_max, limit_per_user,  deal_sold, deal_visit,  deal_created_date', 'numerical', 'integerOnly'=>true),

            array('deal_name', 'required', 'message'=>'<span class="label label-important">Deal name cannot be blank.</span>', 'on'=>'ownerDealCreate'),
            array('category_id', 'required', 'message'=>'<span class="label label-important">Category cannot be blank.</span>', 'on'=>'ownerDealCreate'),
            array('deal_description1', 'required', 'message'=>'<span class="label label-important">Deal Line One Text cannot be blank.</span>', 'on'=>'ownerDealCreate'),
            array('deal_description2', 'required', 'message'=>'<span class="label label-important">Deal Line Two Text cannot be blank.</span>', 'on'=>'ownerDealCreate'),
            array('deal_regular_price', 'required', 'message'=>'<span class="label label-important">Regular Price cannot be blank..</span>', 'on'=>'ownerDealCreate'),
            array('deal_sale_price', 'required', 'message'=>'<span class="label label-important">Sale Price cannot be blank..</span>', 'on'=>'ownerDealCreate'),
            array('start_date', 'required', 'message'=>'<span class="label label-important">Start Date cannot be blank.</span>', 'on'=>'ownerDealCreate'),
            array('end_date', 'required', 'message'=>'<span class="label label-important">End Date cannot be blank..</span>', 'on'=>'ownerDealCreate'),
            array('purchase_min', 'required', 'message'=>'<span class="label label-important">Minimum Buyers Limit cannot be blank..</span>', 'on'=>'ownerDealCreate'),

//            array('lastdate_deal_purchased', 'required', 'message'=>'<span class="label label-important">Last Day Of Deal Purchase cannot be blank..</span>', 'on'=>'ownerDealCreate'),
//            array('lastdate_deal_redeemed', 'required', 'message'=>'<span class="label label-important">Last Day Of Deal Redeem cannot be blank..</span>', 'on'=>'ownerDealCreate'),


            array('deal_name, deal_large_image, deal_small_image', 'length', 'max'=>100),
            array('large_image, small_image', 'file', 'types'=>'png,jpg','on'=>'dealApproveByAdmin'),
            array('large_image, small_image', 'unsafe'),


			array('deal_description1, deal_description2', 'length', 'max'=>50),
			array('deal_fine_print', 'length', 'max'=>140),
			array('deal_key_phrases, deal_key_word, deal_highlights, deal_fine_print', 'length', 'max'=>200),
			array('deal_details', 'length', 'max'=>2000),


            //array('purchase_date, redeem_date','on'=>'ownerDealCreate'),
            array('purchase_date, redeem_date','safe'),

            array('deal_start_date','compareDates'),

            array('deal_misstatements, deal_commission, deal_charge_card', 'length', 'max'=>3),
            array('deal_misstatements', 'required', 'requiredValue' =>1, 'message' => '<span class="label label-important">You should accept term to use our errors or misstatement agreement.</span>'),
            array('deal_commission', 'required', 'requiredValue' =>1, 'message' => '<span class="label label-important">You should accept term to use our commission agreement.</span>'),
            array('deal_charge_card', 'required', 'requiredValue' =>1, 'message' => '<span class="label label-important">You should accept term to use our credit card procession fees agreement.</span>'),

            array('deal_id, deal_owner_id, category_id, deal_state_id, deal_city_id, deal_name, deal_large_image, deal_small_image, deal_description1, deal_description2, deal_regular_price, deal_sale_price, deal_start_date, deal_end_date, deal_available, purchase_min, purchase_max, limit_per_user, lastdate_deal_purchased, lastdate_deal_redeemed, deal_details, deal_fine_print, deal_highlights, deal_key_word, deal_key_phrases, deal_sold, deal_visit, deal_created_date, deal_misstatements, deal_commission, deal_charge_card, deal_status', 'safe', 'on'=>'search'),
		);
	}

    public function compareDates($attribute,$params)
    {
        $message=Yii::t('yii','<span class="label label-important">Must be less than End date.</span>');
        $params=array('{attribute}'=>$this->getAttributeLabel('from_date'),'{compareValue}'=>$this->getAttributeLabel('to_date'));

        if( strtotime($this->start_date) > strtotime($this->end_date))
            $this->addError($attribute,strtr($message,$params));
    }

    protected function beforeSave()
    {
        if($this->getScenario()=='ownerDealCreate')
        {
            $this->deal_owner_id = Yii::app()->user->getId();
            $this->deal_end_date = strtotime($this->end_date);
            $this->deal_start_date = strtotime($this->start_date);
            $this->lastdate_deal_purchased = strtotime($this->purchase_date);
            $this->lastdate_deal_redeemed = strtotime($this->redeem_date);
            $this->deal_created_date = time();
            $this->deal_state_id = Yii::app()->user->getState('state_id');
            $this->deal_city_id = Yii::app()->user->getState('city_id');
            $this->deal_status = 'Awaiting Approval';
        }
        else if($this->getScenario()=='dealApproveByAdmin')
        {
            $this->deal_end_date = strtotime($this->end_date);
            $this->deal_start_date = strtotime($this->start_date);
            $this->lastdate_deal_purchased = strtotime($this->lastdate_deal_purchased);
            $this->lastdate_deal_redeemed = strtotime($this->lastdate_deal_redeemed);
            $this->deal_status = 'Active';
        }
        return parent::beforeSave();
    }

    public function getCategoryList()
    {
        return CHtml::listData(Category::model()->findAll(array("order"=>"category_name")),'category_id','category_name');
    }

    protected function afterFind()
    {
        $this->deal_discount = ($this->deal_regular_price-$this->deal_sale_price)/($this->deal_regular_price/100);
        $this->deal_discount = sprintf('%0.2f', $this->deal_discount);
        $this->deal_regular_price =  sprintf('%0.2f', $this->deal_regular_price);
        $this->deal_sale_price =  sprintf('%0.2f', $this->deal_sale_price);

        $this->deal_link = $this->generateDealLink();

        return parent::afterFind();
    }

    protected function generateDealLink()
    {
        $deal_link = '/'.$this->dealState->state_iso;
        $deal_link.= '/'.strtolower(str_replace(' ','-',$this->dealCity->city_short_name));
        $deal_link.= '/'.strtolower(str_replace(' ','-',$this->category->category_name));
        $deal_link.= '/'.$this->deal_id;

        return $deal_link;
    }

    /**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'dealCity' => array(self::BELONGS_TO, 'CityList', 'deal_city_id'),
			'dealOwner' => array(self::BELONGS_TO, 'User', 'deal_owner_id'),
			'dealState' => array(self::BELONGS_TO, 'StateList', 'deal_state_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'deal_id' => 'Deal',
			'deal_owner_id' => 'Deal Owner',
			'category_id' => 'Category',
			'deal_state_id' => 'Deal State',
			'deal_city_id' => 'Deal City',
			'deal_name' => 'Deal Name',

            'deal_large_image' => 'Large Image (560px X 310px)',
            'deal_small_image' => 'Small Image (186px X 250px)',

			'deal_description1' => 'Deal Line One Text',
			'deal_description2' => 'Deal Line Two Text',
			'deal_regular_price' => 'Regular Price',
			'deal_sale_price' => 'Sale Price',
			'deal_start_date' => 'Start Date',
			'deal_end_date' => 'End Date',
			'deal_available' => 'Number of deals',

            'purchase_min' => 'Minimum Buyers Limit',
            'purchase_max' => 'Maximum Buyers Limit',
            'limit_per_user' => 'Limit Per User',

            'lastdate_deal_redeemed'=>'Last Day Of Deal Redeemed',
            'lastdate_deal_purchased'=>'Last Day Of Deal Purchased',

            'deal_limit' => 'Limit # of deals?',
			'deal_details' => 'Deal Details',
            'deal_fine_print' => 'Deal Fine Print',
            'deal_highlights' => 'Deal Highlights',
			'deal_key_phrases' => 'Deal Key Phrases',
			'deal_key_phrases' => 'Deal Key words',
			'deal_sold' => 'Deal Sold',
			'deal_visit' => 'Deal Visit',
			'deal_created_date' => 'Deal Created Date',
            'deal_misstatements' => 'I agree Goodlynx is not responsible for errors or misstatement for the deal created.',
            'deal_commission' => 'I understand that Goodlynx will charge a 20% commission for each deal sold.',
            'deal_charge_card' => 'I understand that Goodlynx will also charge actual credit card procession fees.',
            'deal_status' => 'Deal Status',
            'image' => 'Deal Image',
		);
	}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function awaitingDeals()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
        $criteria->condition="deal_status='Awaiting Approval'";

		$criteria->compare('deal_id',$this->deal_id);
		$criteria->compare('deal_owner_id',$this->deal_owner_id);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('deal_state_id',$this->deal_state_id);
		$criteria->compare('deal_city_id',$this->deal_city_id);
		$criteria->compare('deal_name',$this->deal_name,true);
		$criteria->compare('deal_description1',$this->deal_description1,true);
		$criteria->compare('deal_description2',$this->deal_description2,true);
		$criteria->compare('deal_regular_price',$this->deal_regular_price,true);
		$criteria->compare('deal_sale_price',$this->deal_sale_price,true);
		$criteria->compare('deal_start_date',$this->deal_start_date);
		$criteria->compare('deal_end_date',$this->deal_end_date);
		$criteria->compare('deal_available',$this->deal_available);
		$criteria->compare('deal_details',$this->deal_details,true);
		$criteria->compare('deal_key_phrases',$this->deal_key_phrases,true);
		$criteria->compare('deal_key_word',$this->deal_key_word,true);
		$criteria->compare('deal_sold',$this->deal_sold);
		$criteria->compare('deal_visit',$this->deal_visit);
		$criteria->compare('deal_created_date',$this->deal_created_date);
		$criteria->compare('deal_misstatements',$this->deal_misstatements,true);
		$criteria->compare('deal_commission',$this->deal_commission,true);
		$criteria->compare('deal_charge_card',$this->deal_charge_card,true);
		//$criteria->compare('deal_status',$this->deal_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


    public function activeDeals()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;
        $criteria->condition="deal_status='Active'";

        $criteria->compare('deal_id',$this->deal_id);
        $criteria->compare('deal_owner_id',$this->deal_owner_id);
        $criteria->compare('category_id',$this->category_id);
        $criteria->compare('deal_state_id',$this->deal_state_id);
        $criteria->compare('deal_city_id',$this->deal_city_id);
        $criteria->compare('deal_name',$this->deal_name,true);
        $criteria->compare('deal_description1',$this->deal_description1,true);
        $criteria->compare('deal_description2',$this->deal_description2,true);
        $criteria->compare('deal_regular_price',$this->deal_regular_price,true);
        $criteria->compare('deal_sale_price',$this->deal_sale_price,true);
        $criteria->compare('deal_start_date',$this->deal_start_date);
        $criteria->compare('deal_end_date',$this->deal_end_date);
        $criteria->compare('deal_available',$this->deal_available);
        $criteria->compare('deal_details',$this->deal_details,true);
        $criteria->compare('deal_key_phrases',$this->deal_key_phrases,true);
        $criteria->compare('deal_key_word',$this->deal_key_word,true);
        $criteria->compare('deal_sold',$this->deal_sold);
        $criteria->compare('deal_visit',$this->deal_visit);
        $criteria->compare('deal_created_date',$this->deal_created_date);
        $criteria->compare('deal_misstatements',$this->deal_misstatements,true);
        $criteria->compare('deal_commission',$this->deal_commission,true);
        $criteria->compare('deal_charge_card',$this->deal_charge_card,true);
        //$criteria->compare('deal_status',$this->deal_status,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }


}