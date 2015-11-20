<?php
/* @var $this DealsController */
/* @var $model Deals */

$this->breadcrumbs=array(
	'Deals'=>array('index'),
	$model->deal_id,
);

$this->menu=array(
	array('label'=>'List Deals', 'url'=>array('index')),
	array('label'=>'Create Deals', 'url'=>array('create')),
	array('label'=>'Update Deals', 'url'=>array('update', 'id'=>$model->deal_id)),
	array('label'=>'Delete Deals', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->deal_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Deals', 'url'=>array('admin')),
);
?>

<h4>View Deal #<?php echo $model->deal_id; ?></h4>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(

        array(
            'name'=>'deal_owner_id',
            'value'=>$model->dealOwner->email,  //The FriendsCount relation we declared
        ),

        array(
            'name'=>'deal_name',
            'value'=>$model->deal_name,  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'category_id',
            'value'=>$model->category->category_name,  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'deal_city_id',
            'value'=>$model->dealCity->city_short_name,  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'deal_state_id',
            'value'=>$model->dealState->state_name,  //The FriendsCount relation we declared
        ),
		'deal_description1',
		'deal_description2',
        array(
            'name'=>'deal_regular_price',
            'value'=>'$'.$model->deal_regular_price,  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'deal_sale_price',
            'value'=>'$'.$model->deal_sale_price,  //The FriendsCount relation we declared
        ),
        array(
           'name'=>'deal_start_date',
           'value'=>date($model->date_format, $model->deal_start_date),  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'deal_end_date',
            'value'=>date($model->date_format, $model->deal_end_date),  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'deal_available',
            'value'=>$model->deal_available==0 ? 'Limit By time':$model->deal_available,  //The FriendsCount relation we declared
        ),

        array(
            'name'=>'lastday_deal_purchased',
            'value'=>date($model->date_format, $model->lastdate_deal_purchased),  //The FriendsCount relation we declared
        ),
        array(
            'name'=>'lastday_deal_redeemed',
            'value'=>date($model->date_format, $model->lastdate_deal_redeemed),  //The FriendsCount relation we declared
        ),
		'deal_details',
        'deal_fine_print',
        'deal_highlights',
		'deal_status',
        array(
            'name'=>'deal_created_date',
            'value'=>date($model->date_format, $model->deal_created_date),  //The FriendsCount relation we declared
        ),
		),
)); ?>
