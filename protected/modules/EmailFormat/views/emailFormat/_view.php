<?php
/* @var $this EmailFormatController */
/* @var $data EmailFormat */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->email_id), array('view', 'id'=>$data->email_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_template')); ?>:</b>
	<?php echo CHtml::encode($data->email_template); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_title')); ?>:</b>
	<?php echo CHtml::encode($data->email_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_text')); ?>:</b>
	<?php echo CHtml::encode($data->email_text); ?>
	<br />


</div>