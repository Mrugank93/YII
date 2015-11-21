<?php
/* @var $this EmailFormatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Email Formats',
);

$this->menu=array(
	array('label'=>'Create EmailFormat', 'url'=>array('create')),
	array('label'=>'Manage EmailFormat', 'url'=>array('admin')),
);
?>

<h1>Email Formats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
