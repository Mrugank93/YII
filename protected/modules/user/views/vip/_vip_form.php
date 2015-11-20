<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($user,$userDetails )); ?>

    <div class="row">
        <?php echo $form->labelEx($user,'email'); ?>
        <?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($user,'password'); ?>
        <?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>128)); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($userDetails,'first_name'); ?>
        <?php echo $form->textField($userDetails,'first_name',array('size'=>60,'maxlength'=>128)); ?>
    </div>

<!--    <div class="row">-->
<!--        --><?php //echo $form->labelEx($userDetails,'state_id'); ?>
<!--        --><?php //echo $form->dropDownList($userDetails,'state_id',CHtml::listData(StateList::model()->findAll(array("order"=>"state_iso")),'state_id','state_iso'), array('prompt' => 'Select Your State')); ?>
<!--    </div>-->

    <div class="row">
        <?php echo $form->labelEx($userDetails,'cell_phone'); ?>
        <?php echo $form->textField($userDetails,'cell_phone',array('size'=>60,'maxlength'=>128)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($userDetails,'city_id'); ?>
        <?php echo $form->dropDownList($userDetails,'city_id',CHtml::listData(CityList::model()->findAll(array("order"=>"city_short_name")),'city_id','city_short_name'), array('prompt' => 'Select Your City')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($userDetails,'postal_code'); ?>
        <?php echo $form->textField($userDetails,'postal_code',array('size'=>60,'maxlength'=>5)); ?>
    </div>



    <div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->