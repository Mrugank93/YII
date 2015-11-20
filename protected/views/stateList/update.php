<?php
/* @var $this StateListController */
/* @var $model StateList */

$this->breadcrumbs=array(
	'State Lists'=>array('index'),
	$model->state_id=>array('view','id'=>$model->state_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StateList', 'url'=>array('index')),
	array('label'=>'Create StateList', 'url'=>array('create')),
	array('label'=>'View StateList', 'url'=>array('view', 'id'=>$model->state_id)),
	array('label'=>'Manage StateList', 'url'=>array('admin')),
);
?>

<h1>Update StateList <?php echo $model->state_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>