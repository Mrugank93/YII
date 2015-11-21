<?php
/* @var $this EmailFormatController */
/* @var $model EmailFormat */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-format-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'email_id'); ?>
		<?php echo $form->textField($model,'email_id',array('size'=>60,'maxlength'=>100,'readonly'=>true)); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'email_template'); ?>
		<?php echo $form->textField($model,'email_template',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_title'); ?>
		<?php echo $form->textField($model,'email_title',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_text'); ?>

		<?php
			$this->widget('application.modules.EmailFormat.widgets.redactorjs.Redactor',
				array( 'editorOptions' => array('autoresize' => true, 'fixed' => true), 'model' => $model, 'attribute' => 'email_text' )

//		array(
//				'model' => $model,
//				'attribute' => 'email_text',
//				'toolbar' =>'mini'
//			)
		);
		?>

	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->