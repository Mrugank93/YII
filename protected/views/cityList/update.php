<?php
/* @var $this CityListController */
/* @var $model CityList */

$this->breadcrumbs=array(
	'City Lists'=>array('index'),
	$model->city_id=>array('view','id'=>$model->city_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CityList', 'url'=>array('index')),
	array('label'=>'Create CityList', 'url'=>array('create')),
	array('label'=>'View CityList', 'url'=>array('view', 'id'=>$model->city_id)),
	array('label'=>'Manage CityList', 'url'=>array('admin')),
);
?>

<h1>Update CityList <?php echo $model->city_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>