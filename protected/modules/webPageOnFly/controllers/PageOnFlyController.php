<?php

class pageOnFlyController extends Controller
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
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('account','create','ajaxContentUpdate','imageAjaxCrop','header','info','MyPage','upload','CropImg'),
                'users'=>array('@'),
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

    public function actionAjaxContentUpdate()
    {

        $data = $_POST;

        $model = $this->loadModel($data['user_id']);
        $model->attributes = $data;

        if($model->save())
            exit(json_encode(array('result' => 'success', 'msg' => CHtml::errorSummary($model))));
        else
            echo false;

    }

    public function actionMyPage()
    {
        Yii::app()->theme='admin';

        $model = PageOnFly::model()->findByAttributes(array('user_id'=>Yii::app()->user->getId()));

        $gallery = Gallery::model()->findAll();

        if(isset($_POST['BusinessProfile']))
        {
            $model->attributes = $_POST['BusinessProfile'];
            $model->save();
            if($model->status=='Publish')
                Yii::app()->user->setFlash('success', "Congratulation!! Your Businees address is: <b>".Yii::app()->getBaseUrl(true) . '/'.$model->map_url.'.html</b>');

        }

        $this->render('myPage',array('model'=>$model,'gallery'=>$gallery));
    }

    public function actionUpload()
    {
        Yii::import("ext.EAjaxUpload.qqFileUploader");

        $folder=Yii::getPathOfAlias('webroot').'/gallery/';// folder for uploaded files
        $allowedExtensions = array("jpg","jpeg","gif");//array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
        $fileName=$result['filename'];//GETTING FILE NAME
        //echo 'sajib';
        echo CJSON::encode($result);

        //$result=htmlspecialchars(json_encode($result), ENT_NOQUOTES);
        //echo $result;// it's array
    }

    public function actionCropImg()
    {

        $imageUrl =  $_GET['fileName'];
        $this->renderPartial('cropImg', array('imageUrl'=>$imageUrl), false, true);
    }

    public function actionImageAjaxCrop()
    {

        Yii::app()->clientScript->scriptMap=array(
            (YII_DEBUG ?  'jquery.js':'jquery.min.js')=>false,
        );

        Yii::import('ext.jcrop.EJCropper');
        $jcropper = new EJCropper();

        $jcropper->thumbPath =  dirname(Yii::app()->request->scriptFile). '/gallery/thumbs/';

        // some settings ...
        $jcropper->jpeg_quality = 100;
        $jcropper->png_compression = 0;

        // get the image cropping coordinates (or implement your own method)
        $coords = $jcropper->getCoordsFromPost('imageId');

        $jcropper->targ_h = $coords['h'];
        $jcropper->targ_w = $coords['w'];

        //returns the path of the cropped image, source must be an absolute path.
        $thumbnail = $jcropper->crop(Yii::app()->getBaseUrl(true)."/gallery/".$_POST['file_name'], $coords);

        $user_id = $_POST['userID'];

        $model = $this->loadModel($user_id);

        if($model->image_source=='uploaded')
        {
            $oldFile = $model->header_image;
        }

        $model->setScenario('header');

        $model->header_image = $_POST['file_name'];
        $model->image_source='uploaded';

        if($model->save())
        {
            if(isset($oldFile))
            {
                if($oldFile!='header.jpg')
                {
                    unlink(Yii::app()->basePath."/../gallery/thumbs/".$oldFile);
                }
                unlink(Yii::app()->basePath."/../gallery/".$_POST['file_name']);
            }
        }

    }

    public function actionInfo()
    {


        $model = PageOnFly::model()->findByPk(Yii::app()->user->getId());

        if(!isset($model->user_id))
        {
            $model = new PageOnFly();
            $model->user_id = Yii::app()->user->getId();
        }

        $model->setScenario('insert');

        if(isset($_POST['BusinessProfile']))
        {
            //print_r($_POST['BusinessProfile']);

            $model->attributes = $_POST['BusinessProfile'];
            $model->map_url = preg_replace("![^a-z0-9]+!i", "-", $model->business_profile_name);

            if($model->save())
            {
                if($model->status=='Public')
                {
                    $account = Yii::app()->getBaseUrl(true) . '/'.$model->map_url.'.html';
                    Yii::app()->user->setFlash('success', "Congratulation!! Your Business address is: <b>".CHtml::link($account,$account, array('target'=>'_blank')).'</b>');
                }
                else
                    Yii::app()->user->setFlash('error', 'Now you account is  Private!!!</b>');
            }

        }

        $this->render('info',array('model'=>$model));


    }


    public function actionHeader()
    {
        //echo Yii::app()->getBaseUrl(true);

        $model = Gallery::model()->findAll();

        $this->render('header', array('model'=>$model));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */

    public function actionCreate($image)
    {
        $model = $this->loadModel(Yii::app()->user->getId());

        $model->setScenario('header');

        $model->header_image = $image;

        if($model->save())
        {
            $this->redirect(array('myPage'));
        }

    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */

    public function loadModel($id)
    {
        
        $model=PageOnFly::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */

}
