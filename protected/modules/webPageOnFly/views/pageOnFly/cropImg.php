<style type="text/css">
    .jcrop-holder img {max-width: none !important;}
</style>
<?php
$this->widget('ext.jcrop.EJcrop', array(
    //
    // Image URL
    'url' =>Yii::app()->request->baseUrl . '/gallery/'.$imageUrl,
    //
    // ALT text for the image
    'alt' => 'Crop This Image',
    // options for the IMG element
    'htmlOptions' => array('id' => 'imageId','class'=>'jcrop'),
    // Jcrop options (see Jcrop documentation)
    'options' => array(
        'aspectRatio'=>0,
        'minSize' => array(750, 158),
        'maxSize' => array(750, 158),
        'bgOpacity'=>0.5,
        'onRelease' => "js:function() {ejcrop_cancelCrop(this);}",
    ),
    // if this array is empty, buttons will not be added
    'buttons' => array(
        'start' => array(
            'label' => Yii::t('promoter', 'Adjust header cropping'),
            'htmlOptions' => array(
				'class' => 'btn btn-primary',
                'style' => 'color:Black;' // make sure style ends with « ; »
            )
        ),
        'crop' => array(
            'label' => Yii::t('promoter', 'Apply cropping'),
			'class' => 'btn btn-primary',
        ),
        'cancel' => array(
            'label' => Yii::t('promoter', 'Cancel cropping')
        )
    ),
    // URL to send request to (unused if no buttons)
    'ajaxUrl' => 'ImageAjaxCrop',
    // Additional parameters to send to the AJAX call (unused if no buttons)
    'ajaxParams' => array('userID' => yii::app()->user->getId(),'file_name'=>$imageUrl),
));
?>
