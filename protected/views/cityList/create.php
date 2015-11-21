<?php
/* @var $this CityListController */
/* @var $model CityList */

$this->breadcrumbs=array(
	'City Lists'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CityList', 'url'=>array('index')),
	array('label'=>'Manage CityList', 'url'=>array('admin')),
);
?>

<h1>Create CityList</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>