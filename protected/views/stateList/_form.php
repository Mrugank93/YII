<?php
/* @var $this StateListController */
/* @var $model StateList */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-list-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->textField($model,'country_id'); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state_name'); ?>
		<?php echo $form->textField($model,'state_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'state_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state_iso'); ?>
		<?php echo $form->textField($model,'state_iso',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'state_iso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->