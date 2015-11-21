<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs=array(
	'Categories'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3 class="glyphicons show_thumbnails"><i></i>Manage Category</h3>
<div class="widget widget-4 widget-body-white">
    <div class="widget-head">
        <h4 class="heading">

            <?php echo CHtml::link('Add Category',array('category/create'), array()); ?>
        </h4>
    </div>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'category-grid',
        'summaryText'=>'',
        'itemsCssClass'=>'table table-bordered table-primary table-condensed',
        'pagerCssClass'=>'pagination pagination-centered',
        'htmlOptions' => array('class' => 'widget-body', 'style'=>"padding: 10px 0 0;"),
        'dataProvider'=>$model->search(),
        //'filter'=>$model,
        'columns'=>array(

            array(
                'header'=>'Category Id',
                'value'=>'$data->category_id',
            ),
            array(
                'header'=>'Category',
                'value'=>'$data->category_name',
            ),
            array(
                'class'=>'CButtonColumn',
                'header' => 'Modify',
            ),

        ),
    )); ?>

</div>
