<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */

$this->breadcrumbs=array(
	'Email Formats'=>array('index'),
	$model->email_id=>array('view','id'=>$model->email_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmailFormat', 'url'=>array('index')),
	array('label'=>'Create EmailFormat', 'url'=>array('create')),
	array('label'=>'View EmailFormat', 'url'=>array('view', 'id'=>$model->email_id)),
	array('label'=>'Manage EmailFormat', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $model->email_template; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>