<?php
/* @var $this DealsController */
/* @var $model Deals */

$this->breadcrumbs=array(
	'Deals'=>array('index'),
	'Create',
);

//$this->menu=array(
//	array('label'=>'List Deals', 'url'=>array('index')),
//	array('label'=>'Manage Deals', 'url'=>array('admin')),
//);
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>