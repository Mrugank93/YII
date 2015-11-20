<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */

$this->breadcrumbs=array(
	'Email Formats'=>array('index'),
	$model->email_id,
);

$this->menu=array(
	array('label'=>'List EmailFormat', 'url'=>array('index')),
	array('label'=>'Create EmailFormat', 'url'=>array('create')),
	array('label'=>'Update EmailFormat', 'url'=>array('update', 'id'=>$model->email_id)),
	array('label'=>'Delete EmailFormat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailFormat', 'url'=>array('admin')),
);
?>

<h1>View EmailFormat #<?php echo $model->email_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email_id',
		'email_template',
		'email_title',
		'email_text',
	),
)); ?>
