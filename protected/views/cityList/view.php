<?php
/* @var $this CityListController */
/* @var $model CityList */

$this->breadcrumbs=array(
	'City Lists'=>array('index'),
	$model->city_id,
);

$this->menu=array(
	array('label'=>'List CityList', 'url'=>array('index')),
	array('label'=>'Create CityList', 'url'=>array('create')),
	array('label'=>'Update CityList', 'url'=>array('update', 'id'=>$model->city_id)),
	array('label'=>'Delete CityList', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->city_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CityList', 'url'=>array('admin')),
);
?>

<h1>View CityList #<?php echo $model->city_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'city_id',
		'state_id',
		'country_id',
		'city_short_name',
		'city_long_name',
	),
)); ?>
