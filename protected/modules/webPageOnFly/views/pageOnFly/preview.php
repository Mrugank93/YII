<?php
	$baseUrl = Yii::app()->baseUrl;
	Yii::app()->clientScript->registerCoreScript('jquery');
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap.js', CClientScript::POS_END);
	$cs->registerScriptFile($baseUrl.'/assets_business/js/mosaic.1.0.1.min.js', CClientScript::POS_END);
	$cs->registerScriptFile($baseUrl.'/bootstrap/js/custom.js', CClientScript::POS_END);
	$cs->registerCssFile($baseUrl.'/assets_business/css/template_style.css');
	$cs->registerCssFile($baseUrl.'/bootstrap/css/bootstrap.min.css');
?>
<?php
	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
?>

<?php
	if($model->status=='Public')
		echo CHtml::submitButton('Private',array('class'=>'btn btn-primary','value'=>'Private','name'=>'status' ));
	else
		echo CHtml::submitButton('Public',array('class'=>'btn btn-primary','value'=>'Public','name'=>'status' ));
?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-profile-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableAjaxValidation'=>true,
	//'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
		'validateOnChange'=>true,
	),
	//'action' => Yii::app()->createUrl('webPageOnFly/account'),  //<- your form action here

)); ?>


<html>

<head>
    <title><?php echo $model->business_profile_name;?></title>

	<?php $baseUrl = Yii::app()->theme->baseUrl; ?>

    <link href="<?php echo $baseUrl?>/css/style.css" type='text/css' rel='stylesheet'>


</head>

<body>

<div id='wrapper'>

    <div id='header'>

        <div id='title'>
        </div>


        <ul id='bread_crumb_menu'>
            <li class='bread_crumb'><a href='#'>Home</a></li>
            <li class='bread_crumb'><a href='#'>>></a></li>
            <li class='bread_crumb'><a href='#'><?php echo $model->business_profile_name;?></a></li>
        </ul>


    </div>

    <div id='headerImage'>
        <img src="<?php echo Yii::app()->baseUrl; ?>./gallery/crop_images/<?php echo $model->header_image; ?>" alt="Business Name" />
    </div>


    <div id='content'>
        <div class='row border_right'>
            <h2><?php echo $model->section1;?></h2>
            <br>
        </div>

        <div class='row border_right'>
            <h2><?php echo $model->section1;?></h2>
            <br>
        </div>

        <div class='row'>
            <h2><?php echo $model->section1;?></h2>
            <br>
        </div>
    </div>

    <div id='spacer'>
    </div>

    <div id='footer'>
        <div id='map'>
        </div>


        <div id='contact'>
            <p><?php echo $model->contact_address;?></p>
        </div>

        <div id='attribution'>
            <p>Copyright &copy;2012 GoodLynx</p>
        </div>
    </div>

</div>

</body>


<?php $this->endWidget(); ?>