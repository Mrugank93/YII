<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */

$this->breadcrumbs=array(
	'Email Formats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmailFormat', 'url'=>array('index')),
	array('label'=>'Manage EmailFormat', 'url'=>array('admin')),
);
?>

<h1>Create EmailFormat</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>