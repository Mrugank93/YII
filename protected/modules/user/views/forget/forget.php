<?php
$this->pageTitle=Yii::app()->name . ' - Reset Password';
$this->breadcrumbs=array(
	'Forget Password',
);
?>

<h1>Forget Password</h1>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'forget-form',
		)
	);
	?>

	<?php
	Yii::app()->clientScript->registerScript(
		'myHideEffect',
		'$(".flash-success").animate({opacity: .8}, 4000).fadeOut("slow");',
		CClientScript::POS_READY
	);
	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'forgetPassword'); ?>
		<?php echo $form->textField($model,'forgetPassword',array('size'=>60)); ?>
		<?php echo $form->error($model,'forgetPassword'); ?>
	</div>


    <div class="row buttons">
		<?php echo CHtml::submitButton('Reset Password'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
