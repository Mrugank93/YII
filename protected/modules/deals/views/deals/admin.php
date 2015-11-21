<?php
/* @var $this DealsController */
/* @var $model Deals */

$this->breadcrumbs=array(
	'Deals'=>array('index'),
	'Manage',
);

Yii::app()->clientScript->registerScript('search', "

$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('deals-grid', {
		data: $(this).serialize()
	});
	return false;
});

$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('deals-grid-active', {
		data: $(this).serialize()
	});
	return false;
});

");
?>
<h3 class="glyphicons show_thumbnails"><i></i>Manage Deals</h3>

<div class="widget widget-4 widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Pending Deals</h4>
    </div>

<div id='AjFlash'  class="alert alert-success" style="display:none"> </div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'deals-grid',
    'summaryText'=>'',
    'itemsCssClass'=>'table table-bordered table-primary table-condensed',
    'pagerCssClass'=>'pagination pagination-centered',
    'htmlOptions' => array('class' => 'widget-body', 'style'=>"padding: 10px 0 0;"),
    'dataProvider'=>$model->awaitingDeals(),
	//'filter'=>$model,
	'columns'=>array(

        'deal_name',
//        array(
//            'header'=>'Name',
//            'value'=>'$data->deal_name',
//        ),
        array(
            'header'=>'Category',
            'value'=>'$data->category->category_name',
        ),
        array(
            'header'=>'State',
            'value'=>'$data->dealState->state_iso',
        ),
        array(
            'header'=>'City',
            'value'=>'$data->dealCity->city_short_name',
        ),
        array(
            'header'=>'Regular Price',
            'value'=>'"$".$data->deal_regular_price',
        ),
        array(
            'header'=>'Sale Price',
            'value'=>'"$".$data->deal_sale_price',
        ),
        array(
            'header'=>'Status',
            'value'=>'$data->deal_status',
        ),
        array(
            'class'=>'CButtonColumn',
            'header' => 'Modify',
            'template'=>'{view}{update}{delete}',
        ),


	),
)); ?>

</div>


<div class="widget widget-4 widget-body-white">
    <div class="widget-head">
        <h4 class="heading">Active Deals</h4>
    </div>

    <div id='AjFlash'  class="alert alert-success" style="display:none"> </div>

    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'deals-grid-active',
        'summaryText'=>'',
        'itemsCssClass'=>'table table-bordered table-primary table-condensed',
        'pagerCssClass'=>'pagination pagination-centered',
        'htmlOptions' => array('class' => 'widget-body', 'style'=>"padding: 10px 0 0;"),
        'dataProvider'=>$model->activeDeals(),
        'filter'=>$model,
        'columns'=>array(

            'deal_name',
//            array(
//                'header'=>'Name',
//                'value'=>'$data->deal_name',
//            ),
            array(
                'header'=>'Category',
                'value'=>'$data->category->category_name',
            ),
            array(
                'header'=>'State',
                'value'=>'$data->dealState->state_iso',
            ),
            array(
                'header'=>'City',
                'value'=>'$data->dealCity->city_short_name',
            ),
            array(
                'header'=>'Regular Price',
                'value'=>'"$".$data->deal_regular_price',
            ),
            array(
                'header'=>'Sale Price',
                'value'=>'"$".$data->deal_sale_price',
            ),
            array(
                'header'=>'Status',
                'value'=>'$data->deal_status',
            ),
            array(
                'class'=>'CButtonColumn',
                'header' => 'Modify',
                'template'=>'{view}{update}{delete}',
            ),

        ),
    )); ?>

</div>