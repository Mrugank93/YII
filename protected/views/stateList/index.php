<?php
/* @var $this StateListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'State Lists',
);

$this->menu=array(
	array('label'=>'Create StateList', 'url'=>array('create')),
	array('label'=>'Manage StateList', 'url'=>array('admin')),
);
?>

<h1>State Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
