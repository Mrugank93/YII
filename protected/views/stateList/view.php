<?php
/* @var $this StateListController */
/* @var $model StateList */

$this->breadcrumbs=array(
	'State Lists'=>array('index'),
	$model->state_id,
);

$this->menu=array(
	array('label'=>'List StateList', 'url'=>array('index')),
	array('label'=>'Create StateList', 'url'=>array('create')),
	array('label'=>'Update StateList', 'url'=>array('update', 'id'=>$model->state_id)),
	array('label'=>'Delete StateList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->state_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StateList', 'url'=>array('admin')),
);
?>

<h1>View StateList #<?php echo $model->state_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'state_id',
		'country_id',
		'state_name',
		'state_iso',
	),
)); ?>
