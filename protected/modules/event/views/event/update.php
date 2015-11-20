<?php
/* @var $this EventController */
/* @var $model Event */

$this->breadcrumbs=array(
	'Events'=>array('index'),
	'Update',
);

?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>