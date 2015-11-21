<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<h3 class="glyphicons show_thumbnails_with_lines"><i></i>Add new category</h3>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'category-form',
    //'class'=>'form-horizontal',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),

)); ?>

    <hr class="separator line" />
    <div class="row-fluid">
        <div class="span6">


            <div class="control-group <?php if($model->hasErrors('parent_category')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'parent_category'); ?>
                <div class="controls">
                    <?php echo $form->dropDownList($model,'parent_category',$model->getCategoryList(), array('encode'=>false,'empty'=>'Top Category', 'class='=>'span12')); ?>
                </div>
            </div>


            <div class="control-group <?php if($model->hasErrors('category_name')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'category_name'); ?>
                <div class="controls">
                        <?php echo $form->textField($model,'category_name',array('size'=>20,'maxlength'=>50,'class='=>'span12')); ?>
                        <?php echo $form->error($model,'category_name', array('class'=>'error help-block')); ?>
                </div>
            </div>

            <div class="control-group <?php if($model->hasErrors('large_image')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'large_image'); ?>
                <div class="controls">
                    <?php echo $form->fileField($model,'large_image'); ?>
                    <?php echo $form->error($model,'large_image', array('class'=>'error help-block')); ?>
                </div>
            </div>

            <div class="control-group <?php if($model->hasErrors('small_image')!=null) echo 'error'; ?>">
                <?php echo $form->labelEx($model,'small_image'); ?>
                <div class="controls">
                    <?php echo $form->fileField($model,'small_image'); ?>
                    <?php echo $form->error($model,'small_image', array('class'=>'error help-block')); ?>
                </div>
            </div>



        </div>

    </div>

    <div class="separator"></div>

    <div class="form-actions">
        <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
    </div>

<?php $this->endWidget(); ?>

