<?php

class DealsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'roles'=>array('Super Admin, Business Owner'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','approved'),
                'roles'=>array('Super Admin, Business Owner'),
            ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'roles'=>array('Super Admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

    public function actionApproved($id)
    {
         if(isset($_GET['ajax']))
         {
            $model = $this->loadModel($id);
            $model->deal_status='Active';
            $model->deal_image = str_replace(' ','_',$model->category->category_name).'.png';
             if($model->save())
             {
                 echo '<button class="close" data-dismiss="alert" type="button">×</button>
                       <strong>Well done! </strong>'."Deal Id# ".$model->deal_id.' and '.$model->deal_name.' deal has been approved.';


             }
             else
             {
                 print_r($model->getErrors());
             }

         }


    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
    public function getData()
    {
        return  array (
                        'category_id' => 5,
                        'deal_name' => 'Yes',
                        'deal_description1' => 'hahaha',
                        'deal_description2' => 'We have little',
                        'deal_regular_price'=>20 ,
                        'deal_sale_price'=>2,
                        'start_date'=>'05/13/2013 1:22 am',
                        'end_date'=>'05/31/2013 1:22 am',
                        'deal_limit'=>0,
                        'deal_available'=>0,
                        'purchase_min'=>1 ,
                        'purchase_max'=>1000,
                        'limit_per_user'=> 1,
                        'redeem_date'=> '10/01/2013',
                        'purchase_date'=>'01/01/2013',
                        'deal_details'=>'Deal deal',
                        'deal_fine_print' =>'Limit for one user',
                        'deal_highlights'=>'Deal is going to here',
                        'deal_key_word'=>'deal,food',
                        'deal_key_phrases'=>'deal',
                        'deal_misstatements'=>1,
                        'deal_commission'=>1,
                        'deal_charge_card'=>1
                    );
        
    }
    
    
	public function actionCreate()
	{
		$model=new Deals();

        $model->setScenario('ownerDealCreate');

        $model->deal_commission = 0;
        $model->deal_misstatements = 0;
        $model->deal_charge_card = 0;
        $model->deal_limit = 0;
        $model->deal_available=0;


  		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Deals']))
		{
            $model->attributes=$_POST['Deals'];

            if($model->save())
			    $this->redirect(array('view','id'=>$model->deal_id));
        }

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $model=$this->loadModel($id);

        $model->setScenario('dealApproveByAdmin');
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $model->start_date = date('m/d/Y h:i a', $model->deal_start_date);
        $model->end_date = date('m/d/Y h:i a', $model->deal_end_date);

		if(isset($_POST['Deals']))
		{
			$model->attributes=$_POST['Deals'];

            $model->small_image= CUploadedFile::getInstance($model,'small_image');
            $model->large_image = CUploadedFile::getInstance($model,'large_image');

            if ( (is_object($model->small_image) && get_class($model->small_image)==='CUploadedFile'))
            {
                $model->deal_small_image =  $model->deal_owner_id.'_'.uniqid().'.'.$model->small_image->getExtensionName();
            }
            if ( (is_object($model->large_image) && get_class($model->large_image)==='CUploadedFile'))
            {
                $model->deal_large_image =  $model->deal_owner_id.'_'.uniqid().'.'.$model->large_image->getExtensionName();
            }


            if($model->save())
            {
                if (is_object($model->small_image))
                {
                    $model->small_image->saveAs(Yii::app()->basePath.'/../'.'/images/deals/thumbs/'.$model->deal_small_image);
                }
                if (is_object($model->large_image))
                {
                    $model->large_image->saveAs(Yii::app()->basePath.'/../'.'/images/deals/'.$model->deal_large_image);
                }

                if(Yii::app()->user->getRole()=='Super Admin')
                    $this->redirect(array('admin'));
                else
                    $this->redirect(array('view','id'=>$model->deal_id));
            }

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Deals');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Deals('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Deals']))
			$model->attributes=$_GET['Deals'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Deals::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='deals-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
