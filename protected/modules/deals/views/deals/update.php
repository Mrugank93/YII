<?php
/* @var $this DealsController */
/* @var $model Deals */

$this->breadcrumbs=array(
	'Deals'=>array('index'),
	$model->deal_id=>array('view','id'=>$model->deal_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Deals', 'url'=>array('index')),
	array('label'=>'Create Deals', 'url'=>array('create')),
	array('label'=>'View Deals', 'url'=>array('view', 'id'=>$model->deal_id)),
	array('label'=>'Manage Deals', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form_update', array('model'=>$model)); ?>