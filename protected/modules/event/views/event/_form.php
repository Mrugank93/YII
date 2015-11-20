<?php
/* @var $this EventController */
/* @var $model Event */
/* @var $form CActiveForm */
?>

<?php
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);
?>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i><?php echo ($model->IsNewRecord) ? "Add new event" : "Update existing event"; ?></h3>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'event-form',
    //'class'=>'form-horizontal',
    'enableAjaxValidation'=>false,
)); ?>

    <hr class="separator line" />
    <div class="row-fluid">
        <div class="span6">

            <div class="control-group <?php if($model->hasErrors('name')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'name'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>50,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'name', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('start_date')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'start_date'); ?>
                <div class="controls">
						<?php $this->widget('ext.timepicker.BJuiDateTimePicker',array('model'=>$model,'attribute'=>'start_date','type'=>'date','options'=>array('dateFormat'=> 'mm/dd/yy',),'htmlOptions'=>array('class'=>'input-medium'))); ?>
                        <?php echo $form->error($model,'start_date', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('location')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'location'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'location',array('size'=>20,'maxlength'=>100,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'location', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('start_time')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'start_time'); ?>
                <div class="controls">
						<?php $this->widget('ext.timepicker.BJuiDateTimePicker',array('model'=>$model,'attribute'=>'start_time','type'=>'time','options'=>array('timeFormat'=> 'HH:mm',),'htmlOptions'=>array('class'=>'input-medium'))); ?>
                        <?php echo $form->error($model,'start_time', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('end_time')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'end_time'); ?>
                <div class="controls">
						<?php $this->widget('ext.timepicker.BJuiDateTimePicker',array('model'=>$model,'attribute'=>'end_time','type'=>'time','options'=>array('timeFormat'=> 'HH:mm',),'htmlOptions'=>array('class'=>'input-medium'))); ?>
                        <?php echo $form->error($model,'end_time', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('price')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'price'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'price',array('size'=>20,'maxlength'=>9,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'price', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('description')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'description'); ?>
                <div class="controls">
                        <?php echo $form->textArea($model,'description',array('size'=>20,'maxlength'=>1000,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'description', array('class'=>'error help-block')); ?>
                </div>
            </div>

			<div class="control-group <?php if($model->hasErrors('keyphrases')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'keyphrases'); ?>
                <div class="controls">
                        <?php echo $form->textArea($model,'keyphrases',array('size'=>20,'maxlength'=>1000,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'keyphrases', array('class'=>'error help-block')); ?>
                </div>
            </div>

        </div>

    </div>

    <div class="separator"></div>

    <div class="form-actions">
        <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
    </div>

<?php $this->endWidget(); ?>

