<?php
/* @var $this BusinessProfileController */
/* @var $model BusinessProfile */

$this->breadcrumbs=array(
	'Business Profiles'=>array('index'),
	'Profile Info',
);

//import menu item form menu.php locate in lib directory
Yii::import('application.modules.webPageOnFly.lib.*');
require_once('menu.php');

?>


<h1>BusinessProfile</h1>

<?php echo $this->renderPartial('_info', array('model'=>$model)); ?>