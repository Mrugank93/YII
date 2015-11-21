<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $category_id
 * @property string $category_name
 * @property integer $parent_category
 *
 * The followings are the available model relations:
 * @property Deals[] $deals
 * @property InterestedDeal[] $interestedDeals
 */
class Category extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
     */

    private $categoryBranch;


    public $large_image;
    public $small_image;

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_name', 'required'),
            array('parent_category', 'numerical', 'integerOnly'=>true),
            array('category_name', 'length', 'max'=>100),

            array('large_image, small_image', 'file', 'types'=>'png'),
            array('large_image, small_image', 'unsafe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, category_name, parent_category', 'safe', 'on'=>'search'),
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
            'deals' => array(self::HAS_MANY, 'Deals', 'category_id'),
            'interestedDeals' => array(self::HAS_MANY, 'InterestedDeal', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'category_id' => 'Category',
            'category_name' => 'Category Name',
            'parent_category' => 'Parent Category',
            'large_image' => 'Large Image (Dimension 560px X 310px)',
            'small_image' => 'Small Image (Dimension 186px X 250px)',
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

        $criteria->compare('category_id',$this->category_id);
        $criteria->compare('category_name',$this->category_name,true);
        $criteria->compare('parent_category',$this->parent_category);


        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    private  function buildTree($categories, $parentId=0, $level=0)
    {
        foreach ($categories as $category)
        {
            if($parentId == $category['parent_id'])
            {
                $space = str_repeat("&nbsp;&nbsp;", $level);

                $this->categoryBranch[$category['id']] =  $space.$category['name'];

                $this->buildTree($categories, $category['id'], $level+1);
            }
        }
    }

    public function getCategoryList()
    {
        $category = Category::model()->findAll();

        $data = array();

        foreach($category as $c)
        {
            $data[] = array('id'=>$c->category_id,'name'=>$c->category_name,'parent_id'=>$c->parent_category);
        }

       $this->buildTree($data);

       return $this->categoryBranch;

    }

}