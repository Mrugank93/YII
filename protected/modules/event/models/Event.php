<?php

/**
 * This is the model class for table "event".
 *
 */

class Event extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Event the static model class
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
        return 'event';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
	
			array("name, start_date, location, start_time, end_time, price, description, keyphrases", "safe"),
	
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

        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            
			

        );
    }

	public function afterFind() {
				
		if($this->start_date != "0000-00-00") $this->start_date = $this->formatDateRetrieve($this->start_date);
		if($this->start_date == "0000-00-00") $this->start_date = null;
		$this->start_time = $this->formatTimeRetrieve($this->start_time);
		$this->end_time = $this->formatTimeRetrieve($this->end_time);
		return true;
		
	}

	public function beforeSave() {
					
		if($this->start_date != null) $this->start_date = $this->formatDateSubmit($this->start_date);
		if($this->IsNewRecord) $this->user_id = Yii::app()->user->id;
		return true;
					
	}

	public function formatDateSubmit($date) {
		
		$ex_date = explode("/", $date);
		$m = $ex_date[0];
		$d = $ex_date[1];
		$y = $ex_date[2];
		$date = $m . "/" . $d . "/" . $y;
		
		return date("Y-m-d", strtotime($date));
		
	}
	
	public function formatDateRetrieve($date) {
		
		return date("m/d/Y", strtotime($date));
		
	}
	
	public function formatTimeRetrieve($date) {
		
		return date("H:i", strtotime($date));
		
	}

	public function formatStartEndDateTimeGET($start = null, $end = null) {
		
		if($start != null) {
			
			$this->start_date = $this->formatDateRetrieve(substr($start, 4, 11));
			$this->start_time = substr($start, 16, 5);
			
		}
		
		if($end != null) {
			
			$this->end_time = substr($end, 16, 5);
			
		}
		
	}

}