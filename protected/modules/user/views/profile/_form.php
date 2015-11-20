<?php
/* @var $this ProfilesController */
/* @var $model Profiles */
/* @var $form CActiveForm */
?>



<div class="widget widget-2 widget-tabs widget-tabs-2 border-bottom-none">
    <div class="widget-head">
        <ul>
            <li class="active"><a class="glyphicons settings" href="#account-settings" data-toggle="tab"><i></i>Profile settings</a></li>
            <li><a class="glyphicons user" href="#account-details" data-toggle="tab"><i></i>Profile</a></li>
        </ul>
    </div>
</div>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'form-horizontal'
    )
)); ?>

    <div class="tab-content" style="padding: 0;">
        <div class="tab-pane" id="account-details">

            <div class="row-fluid">
                <div class="span6">

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'first_name', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($userDetails,'first_name',array('size'=>60,'maxlength'=>20,'class'=>'span10','placeholder'=>'First Name')); ?>
                            <?php echo $form->error($userDetails,'first_name'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'last_name', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($userDetails,'last_name',array('size'=>60,'maxlength'=>20,'class'=>'span10','placeholder'=>'First Name')); ?>
                            <?php echo $form->error($userDetails,'last_name'); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'sex', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->dropdownList($userDetails,'sex', array('Male'=>'Male', 'Female'=>'Female') ,array('encode'=>false, 'class'=>'span10')); ?>
                        </div>
                    </div>


                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'dob', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <div class="input-append">
                                <?php
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model' => $userDetails,
                                    'attribute' => 'dob',
                                    'options'=> array(
                                        'changeMonth'=>true,
                                        'changeYear'=>true,
                                        'duration'=>'fast',
                                        'yearRange'=>'1950',
                                        'dateFormat'=>'yy-mm-dd',

                                    ),
                                        'htmlOptions' => array(
                                        'size' => '10',         // textField size
                                        'maxlength' => '10',    // textField maxlength
                                      ),
                                ));
                                ?>
                                <span class="add-on glyphicons calendar"><i></i></span>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="span6">

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'city_id', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->dropdownList($userDetails,'city_id', CHtml::listData(CityList::model()->findAll(),'city_id', 'city_short_name')  ,array( 'class'=>'span12')); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'street', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($userDetails,'street', array('size'=>60,'maxlength'=>50, 'class'=>'span12')); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'suite', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($userDetails,'suite', array('size'=>60,'maxlength'=>50, 'class'=>'span12')); ?>
                        </div>
                    </div>

                    <div class="control-group">
                        <?php echo $form->labelEx($userDetails,'postal_code', array('class'=>'control-label')); ?>
                        <div class="controls">
                            <?php echo $form->textField($userDetails,'postal_code', array('size'=>60,'maxlength'=>5, 'class'=>'span12')); ?>
                        </div>
                    </div>


                </div>
            </div>

        </div>

        <div class="tab-pane active" id="account-settings">
            <div class="row-fluid">
                <div class="span3">
                    <strong>Change password</strong>
                </div>
                <div class="span9">
                    <?php echo $form->labelEx($user,'email'); ?>
                    <?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>128,'class'=>'span10','disabled'=>'disabled')); ?>
                    <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Username can't be changed"><i></i></span>
                    <div class="separator"></div>


                    <?php echo $form->labelEx($user,'currentPassword'); ?>
                    <?php echo $form->passwordField($user,'currentPassword',array('size'=>60,'maxlength'=>128,'class'=>'span10','placeholder'=>'Leave empty for no change')); ?>
                    <span style="margin: 0;" class="btn-action single glyphicons circle_question_mark" data-toggle="tooltip" data-placement="top" data-original-title="Leave empty if you don't wish to change the password"><i></i></span>
                    <?php echo $form->error($user,'currentPassword'); ?>
                    <div class="separator"></div>


                    <?php echo $form->labelEx($user,'password'); ?>
                    <?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>128,'class'=>'span10','placeholder'=>'Leave empty for no change')); ?>
                    <?php echo $form->error($user,'password'); ?>
                    <div class="separator"></div>

                    <?php echo $form->labelEx($user,'confirmPassword'); ?>
                    <?php echo $form->passwordField($user,'confirmPassword',array('size'=>60,'maxlength'=>128,'class'=>'span10','placeholder'=>'Leave empty for no change')); ?>
                    <?php echo $form->error($user,'confirmPassword'); ?>
                    <div class="separator"></div>
                </div>
            </div>
            <hr class="separator line" />
            <div class="row-fluid">
                <div class="span3">
                    <strong>Contact details</strong>
                </div>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span9">
                            <?php echo $form->labelEx($userDetails,'cell_phone'); ?>
                            <div class="input-prepend">
                                <span class="add-on glyphicons phone"><i></i></span>
                                <?php echo $form->textField($userDetails,'cell_phone',array('size'=>60,'maxlength'=>12,'class'=>'input-large','placeholder'=>'123-456-7890')); ?>

                            </div>
                            <?php echo $form->error($userDetails,'cell_phone'); ?>
                            <div class="separator"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="form-actions" style="margin: 0; padding-right: 0;">
            <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok pull-right"><i></i>Save changes</button>
        </div>

    </div>
<?php $this->endWidget(); ?>
<br/>
