
<?php
	/* @var $this BusinessProfileController */
	/* @var $model BusinessProfile */
	/* @var $form CActiveForm */

	Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/assets_business/jquery.limit.js',CClientScript::POS_END);

	Yii::app()->clientScript->registerCoreScript('jquery.js');
	Yii::app()->clientScript->registerScript('function','


    $(document).ready(function()  {
    var characters = 400;
    $("#counter1").append("You have <strong>"+  characters+"</strong> characters remaining");
    $("#BusinessProfile_section1").keyup(function(){
        if($(this).val().length > characters){
        $(this).val($(this).val().substr(0, characters));
        }
    var remaining = characters -  $(this).val().length;
    $("#counter1").html("You have <strong>"+  remaining+"</strong> characters remaining");
    if(remaining <= 10)
    {
        $("#counter1").css("color","red");
    }
    else
    {
        $("#counter1").css("color","black");
    }
    });

    $("#counter2").append("You have <strong>"+  characters+"</strong> characters remaining");
    $("#BusinessProfile_section2").keyup(function(){
        if($(this).val().length > characters){
        $(this).val($(this).val().substr(0, characters));
        }
    var remaining = characters -  $(this).val().length;
    $("#counter2").html("You have <strong>"+  remaining+"</strong> characters remaining");
    if(remaining <= 10)
    {
        $("#counter2").css("color","red");
    }
    else
    {
        $("#counter2").css("color","black");
    }
    });


    $("#counter3").append("You have <strong>"+  characters+"</strong> characters remaining");
    $("#BusinessProfile_section3").keyup(function(){
        if($(this).val().length > characters){
        $(this).val($(this).val().substr(0, characters));
        }
    var remaining = characters -  $(this).val().length;
    $("#counter3").html("You have <strong>"+  remaining+"</strong> characters remaining");
    if(remaining <= 10)
    {
        $("#counter3").css("color","red");
    }
    else
    {
        $("#counter3").css("color","black");
    }
    });


});

	' );


?>
<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-profile-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php
	foreach(Yii::app()->user->getFlashes() as $key => $message) {
		echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
	}
	?>

	<?php echo $form->errorSummary($model); ?>


    <div class="row">
		<?php echo $form->labelEx($model,'business_profile_name'); ?>
		<?php echo $form->textField($model,'business_profile_name',array('size'=>54,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'business_profile_name'); ?>
    </div>

    <div class="row">
		<?php echo $form->labelEx($model,'section1'); ?>
		<?php echo $form->textArea($model,'section1',array('cols'=>40,'rows'=>10,'width'=>20,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'section1'); ?>
    </div>
    <div  id="counter1"></div>

    <div class="row">
		<?php echo $form->labelEx($model,'section2'); ?>
		<?php echo $form->textArea($model,'section2',array('cols'=>40,'rows'=>10,'width'=>20,'maxlength'=>400)); ?>		<?php echo $form->error($model,'section2'); ?>
    </div>
	<div  id="counter2"></div>

    <div class="row">
		<?php echo $form->labelEx($model,'section3'); ?>
		<?php echo $form->textArea($model,'section3',array('cols'=>40,'rows'=>10,'width'=>20,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'section3'); ?>
    </div>
    <div  id="counter3"></div>


    <div class="row">
		<?php echo $form->labelEx($model,'contact_address'); ?>
		<?php echo $form->textArea($model,'contact_address',array('cols'=>40,'rows'=>10,'width'=>20,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'contact_address'); ?>
    </div>


    <div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>


		<?php
		if($model->status=='Public')
			echo CHtml::submitButton('Private',array('class'=>'btn btn-primary','value'=>'Private','name'=>'BusinessProfile[status]' ));
		else
			echo CHtml::submitButton('Public',array('class'=>'btn btn-primary','value'=>'Publish','name'=>'BusinessProfile[status]' ));
		?>

    </div>

	<?php $this->endWidget(); ?>

</div><!-- form -->