<?php
/* @var $this CityListController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'City Lists',
);

$this->menu=array(
	array('label'=>'Create CityList', 'url'=>array('create')),
	array('label'=>'Manage CityList', 'url'=>array('admin')),
);
?>

<h1>City Lists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
