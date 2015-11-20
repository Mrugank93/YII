<?php
/* @var $this CityListController */
/* @var $data CityList */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->city_id), array('view', 'id'=>$data->city_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state_id')); ?>:</b>
	<?php echo CHtml::encode($data->state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_short_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_short_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city_long_name')); ?>:</b>
	<?php echo CHtml::encode($data->city_long_name); ?>
	<br />
</div>