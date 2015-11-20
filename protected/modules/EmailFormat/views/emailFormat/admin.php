<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */

$this->breadcrumbs=array(
	'Email Formats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List EmailFormat', 'url'=>array('index')),
	array('label'=>'Create EmailFormat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('email-format-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Email Formats</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'email-format-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'email_id',
		'email_template',
		'email_title',
		//'email_text',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
