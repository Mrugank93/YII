<?php

class pageOnShowController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

    /**
     * @return array action filters
     */

    private $_userId;

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
                'actions'=>array('index','page'),
                'users'=>array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /*
     * This funtion will display the theme preview after update every thing.
     *
     */
    public function actionPage($state,$city,$profile)
    {

        $state = StateList::model()->findByAttributes(array('state_iso'=>strtoupper($state)));
        $state->state_id;

        $city = CityList::model()->findByAttributes(array('city_short_name'=>ucfirst(str_replace('-',' ',$city))));
        $city->city_id;

        Yii::app()->theme='frontend';

         $model = PageOnFly::model()->findByAttributes(array('map_url'=>$profile));
         //$model = BusinessProfile::model()->findByAttributes(array('map_url'=>$profile,'state_id'=>$state->state_id, 'city_id'=>$city->city_id));

        $this->render('index',array(
            'model'=>$model
        ));

    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */

    public function loadModel($id)
    {
        $model=BusinessProfile::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */

}
