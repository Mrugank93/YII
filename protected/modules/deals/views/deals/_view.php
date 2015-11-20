<?php
/* @var $this DealsController */
/* @var $data Deals */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->deal_id), array('view', 'id'=>$data->deal_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_owner_id')); ?>:</b>
	<?php echo CHtml::encode($data->deal_owner_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->deal_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->deal_city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_name')); ?>:</b>
	<?php echo CHtml::encode($data->deal_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_image')); ?>:</b>
	<?php echo CHtml::encode($data->deal_image); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_description1')); ?>:</b>
	<?php echo CHtml::encode($data->deal_description1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_description2')); ?>:</b>
	<?php echo CHtml::encode($data->deal_description2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_regular_price')); ?>:</b>
	<?php echo CHtml::encode($data->deal_regular_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_sale_price')); ?>:</b>
	<?php echo CHtml::encode($data->deal_sale_price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_start_date')); ?>:</b>
	<?php echo CHtml::encode($data->deal_start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_end_date')); ?>:</b>
	<?php echo CHtml::encode($data->deal_end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_available')); ?>:</b>
	<?php echo CHtml::encode($data->deal_available); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_details')); ?>:</b>
	<?php echo CHtml::encode($data->deal_details); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_key_phrases')); ?>:</b>
	<?php echo CHtml::encode($data->deal_key_phrases); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_sold')); ?>:</b>
	<?php echo CHtml::encode($data->deal_sold); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_visit')); ?>:</b>
	<?php echo CHtml::encode($data->deal_visit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_created_date')); ?>:</b>
	<?php echo CHtml::encode($data->deal_created_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_misstatements')); ?>:</b>
	<?php echo CHtml::encode($data->deal_misstatements); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_commission')); ?>:</b>
	<?php echo CHtml::encode($data->deal_commission); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deal_charge_card')); ?>:</b>
	<?php echo CHtml::encode($data->deal_charge_card); ?>
	<br />

	*/ ?>

</div>