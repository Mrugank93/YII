<?php
/* @var $this UsertypeController */
/* @var $model Usertype */

$this->breadcrumbs=array(
	'Usertypes'=>array('index'),
	$model->user_type_id,
);

$this->menu=array(
	array('label'=>'List Usertype', 'url'=>array('index')),
	array('label'=>'Create Usertype', 'url'=>array('create')),
	array('label'=>'Update Usertype', 'url'=>array('update', 'id'=>$model->user_type_id)),
	array('label'=>'Delete Usertype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usertype', 'url'=>array('admin')),
);
?>

<h1>View Usertype #<?php echo $model->user_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'user_type_id',
		'user_type_name',
	),
)); ?>
