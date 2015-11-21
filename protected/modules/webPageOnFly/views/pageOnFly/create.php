<?php
/* @var $this BusinessProfileController */
/* @var $model BusinessProfile */

$this->breadcrumbs=array(
	'Business Profiles'=>array('index'),
	'Create',
);

//import menu item form menu.php locate in lib directory
Yii::import('application.modules.webPageOnFly.lib.*');
require_once('menu.php');

?>

<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerCoreScript('jquery');
$cs = Yii::app()->getClientScript();
//$cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap.js', CClientScript::POS_END);
//$cs->registerScriptFile($baseUrl.'/bootstrap/js/bootbox.min.js', CClientScript::POS_END);
//$cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap-transition.js', CClientScript::POS_END);
//$cs->registerScriptFile($baseUrl.'/bootstrap/js/bootstrap-modal.js', CClientScript::POS_END);
//$cs->registerCssFile($baseUrl.'/bootstrap/css/bootstrap.min.css');

?>


<h1>Create BusinessProfile</h1>



<?php echo $this->renderPartial('_form2', array('model'=>$model,'image'=>$image)); ?>