<?php
/* @var $this BusinessProfileController */
/* @var $model BusinessProfile */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'business-profile-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
        'validateOnChange'=>true,
        'validateOnType'=>true
    ),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div>
		<?php echo $form->labelEx($model,'header_image'); ?>
        <?php

           $this->widget('ext.jcrop.EJcrop', array(
            //
            // Image URL
            'url' =>Yii::app()->baseURL."/gallery/".$image,
            //
            // ALT text for the image
            'alt' => 'Crop This Image',
            // options for the IMG element
            'htmlOptions' => array('id' => 'imageId'),
            // Jcrop options (see Jcrop documentation)
            'options' => array(
                'aspectRatio'=>0,
                'minSize' => array(200, 65),
                'maxSize' => array(600, 200),
                'bgOpacity'=>0.5,
                'onSelect'=>'showCoords',
                //'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
            ),
            // if this array is empty, buttons will not be added
            'buttons' => array(
                'start' => array(
                    'label' => Yii::t('promoter', 'Cropping'),
                    'htmlOptions' => array(
                        'class' => 'btn btn-primary',
                        //'style' => 'color:red;' // make sure style ends with « ; »
                    )
                ),
                'crop' => array(
                    'label' => Yii::t('promoter', 'Apply cropping'),
                ),
                'cancel' => array(
                    'label' => Yii::t('promoter', 'Cancel cropping')
                )
            ),
            // URL to send request to (unused if no buttons)
            'ajaxUrl' =>  $this->createUrl('webPageOnFly/ImageAjaxCrop'),
            // Additional parameters to send to the AJAX call (unused if no buttons)
            'ajaxParams' => array('user_id' => Yii::app()->user->getId(),'image'=>$image),
        ));
        ?>
	</div>






	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->