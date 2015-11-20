<?php
/* @var $this UsertypeController */
/* @var $data Usertype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user_type_id), array('view', 'id'=>$data->user_type_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_type_name')); ?>:</b>
	<?php echo CHtml::encode($data->user_type_name); ?>
	<br />


</div>