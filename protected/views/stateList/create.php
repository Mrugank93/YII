<?php
/* @var $this StateListController */
/* @var $model StateList */

$this->breadcrumbs=array(
	'State Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StateList', 'url'=>array('index')),
	array('label'=>'Manage StateList', 'url'=>array('admin')),
);
?>

<h1>Create StateList</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>