<?php
/* @var $this DealsController */
/* @var $model Deals */
/* @var $form CActiveForm */
?>

<link  href="<?php echo Yii::app()->baseUrl; ?>/css/deals/deal.css"  rel="stylesheet">

<?php
Yii::app()->getClientScript()->registerCoreScript( 'jquery.ui' );
Yii::app()->clientScript->registerCssFile(
    Yii::app()->clientScript->getCoreScriptUrl().
        '/jui/css/base/jquery-ui.css'
);
?>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'deals-form',
    'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'class'=>'form-horizontal',
        'enctype' => 'multipart/form-data'
    ),

)); ?>

<h4>Deal Basic</h4>
<hr class="separator line" />
<div class="row-fluid">
    <div class="span6">
        <div class="control-group <?php if($model->hasErrors('category_id')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'category_id',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php $categories = $model->getCategoryList(); ?>
                <?php echo $form->dropDownList($model,'category_id',$categories); ?>
                <?php echo $form->error($model,'category_id', array('class'=>'error help-block')); ?>
            </div>
        </div>

        <div class="control-group <?php if($model->hasErrors('deal_name')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_name',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'deal_name',array( 'placeholder'=>'name of your deal', 'size'=>50,'maxlength'=>14)); ?>
                <?php echo $form->error($model,'deal_name', array('class'=>'error help-block')); ?>
            </div>
        </div>


        <div class="control-group <?php if($model->hasErrors('deal_description1')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_description1',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'deal_description1',array( 'placeholder'=>'limit 20 characters', 'size'=>50,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'deal_description1', array('class'=>'error help-block')); ?>
            </div>
        </div>

        <div class="control-group <?php if($model->hasErrors('deal_description2')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_description2',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'deal_description2',array('placeholder'=>'limit 20 characters','size'=>50,'maxlength'=>20)); ?>
                <?php echo $form->error($model,'deal_description2', array('class'=>'error help-block')); ?>
            </div>
        </div>

        <div class="control-group <?php if($model->hasErrors('deal_regular_price')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_regular_price',array('class'=>'control-label')); ?>
            <div class="controls">
                <div class="input-prepend input-append">
                    <span class="add-on">$</span>
                    <?php echo $form->textField($model,'deal_regular_price',array('size'=>20,'maxlength'=>45,'class='=>'span12')); ?>
                    <?php echo $form->error($model,'deal_regular_price', array('class'=>'error help-block')); ?>
                </div>
            </div>
        </div>


        <div class="control-group <?php if($model->hasErrors('deal_sale_price')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_sale_price',array('class'=>'control-label')); ?>
            <div class="controls">
                <div class="input-prepend input-append">
                    <span class="add-on">$</span>
                    <?php echo $form->textField($model,'deal_sale_price',array('size'=>20,'maxlength'=>45,'class='=>'span12')); ?>
                    <?php echo $form->error($model,'deal_sale_price', array('class'=>'error help-block')); ?>
                </div>
            </div>
        </div>

        <div class="control-group <?php if($model->hasErrors('deal_start_date')!=null || $model->hasErrors('start_date')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_start_date',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php
                $this->widget('ext.timepicker.BJuiDateTimePicker',array(
                    'model'=>$model,
                    'attribute'=>'start_date',
                    'type'=>'datetime', // available parameter is datetime or time
                    //'language'=>'de', // default to english
                    //'themeName'=>'sunny', // jquery ui theme, file is under assets folder
                    'options'=>array(
                        // put your js options here check http://trentrichardson.com/examples/timepicker/#slider_examples for more info

                        "timeFormat"=> "h:mm tt",
                        //'showSecond'=>true,
                    ),
                    'htmlOptions'=>array(
                        'class'=>'input-medium'
                    )
                ));
                ?>
                <?php echo $form->error($model,'deal_start_date', array('class'=>'error help-block')); ?>
            </div>
        </div>

        <div class="control-group <?php if($model->hasErrors('end_date')!=null) echo 'error'; ?>">
            <?php echo $form->labelEx($model,'deal_end_date',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php
                $this->widget('ext.timepicker.BJuiDateTimePicker',array(
                    'model'=>$model,
                    'attribute'=>'end_date',
                    'type'=>'datetime', // available parameter is datetime or time
                    //'language'=>'de', // default to english
                    //'themeName'=>'sunny', // jquery ui theme, file is under assets folder
                    'options'=>array(
                        // put your js options here check http://trentrichardson.com/examples/timepicker/#slider_examples for more info

                        "timeFormat"=> "h:mm tt",
                        //'showSecond'=>true,
                    ),
                    'htmlOptions'=>array(
                        'class'=>'input-medium'
                    )
                ));
                ?>
                <?php echo $form->error($model,'end_date', array('class'=>'error help-block')); ?>
            </div>
        </div>



        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_limit',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->radioButtonList($model,'deal_limit',array(0=>'by time', 1=>'by # of deals sold'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline')))?>
            </div>
        </div>


        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_available',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model,'deal_available',array('size'=>45)); ?>
            </div>
        </div>


        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_details',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'deal_details',array( 'placeholder'=>'Deal details ', 'size'=>50,'maxlength'=>2000,'rows'=>5)); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_fine_print',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'deal_fine_print',array( 'placeholder'=>'limit 140 characters.', 'size'=>50,'maxlength'=>200,'rows'=>5)); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_highlights',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'deal_highlights',array( 'placeholder'=>'Type the deal details.', 'size'=>50,'maxlength'=>300,'rows'=>5)); ?>
            </div>
        </div>


        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_key_word',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'deal_key_word',array('size'=>45,'placeholder'=>'use comma(,) for multiple SEO tag','maxlength'=>200,'rows'=>5)); ?>
            </div>
        </div>

        <div class="control-group">
            <?php echo $form->labelEx($model,'deal_key_phrases',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model,'deal_key_phrases',array('size'=>45,'placeholder'=>'use comma(,) for multiple SEO tag','maxlength'=>200,'rows'=>5)); ?>
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

    <div class="span6">
        <div id="deals">
            <div class="box1">
                <h2>Name Of Deal</h2>
                <div class="offerimage"><img src="<?php echo Yii::app()->baseUrl."/images/category/thumbs/baby.png" ?>"/></div>
                <div class="offername">Line One Text</div>
                <div class="offercompany">Line Two Text</div>
                <div class="offerpriceSample"><span class="regular">$2</span> <span class="sale">$1</span></div>
                <div class="buynow"><a href="#" title="Buy Now">Buy Now</a></div>
            </div>
        </div>
    </div>
</div>

<hr class="separator line" />

<div class="row-fluid uniformjs">
    <div class="span10">
        <h4 style="margin-bottom: 10px;">Policy &amp; Agreement</h4>
        <label class="checkbox" for="Deals_deal_misstatements">
            <?php echo $form->checkBox($model,'deal_misstatements', array('class'=>'checkbox')); ?>
            <?php echo $model->getAttributeLabel('deal_misstatements'); ?>
            <?php echo $form->error($model,'deal_misstatements', array('class'=>'error help-block')); ?>
        </label>

        <label class="checkbox" for="Deals_deal_commission">
            <?php echo $form->checkBox($model,'deal_commission', array('class'=>'checkbox')); ?>
            <?php echo $model->getAttributeLabel('deal_commission'); ?>
            <?php echo $form->error($model,'deal_commission', array('class'=>'error help-block')); ?>
        </label>

        <label class="checkbox" for="Deals_deal_charge_card">
            <?php echo $form->checkBox($model,'deal_charge_card', array('class'=>'checkbox')); ?>
            <?php echo $model->getAttributeLabel('deal_charge_card'); ?>
            <?php echo $form->error($model,'deal_charge_card', array('class'=>'error help-block')); ?>
        </label>

    </div>
</div>

<div class="separator"></div>

<div class="form-actions">
    <button type="submit" class="btn btn-icon btn-primary glyphicons circle_ok"><i></i>Save</button>
    <button type="button" class="btn btn-icon btn-default glyphicons circle_remove"><i></i>Cancel</button>
</div>


<?php $this->endWidget(); ?>

<?php
    $str ="$([";

    foreach($categories as $key=>$val)
    {
        $str.= "'".Yii::app()->baseUrl.'/images/category/thumbs/'.str_replace(' ','_', $val).".png',";
    }

    $str = rtrim($str,',');

    $str.=']).preload();';
?>


<?php

Yii::app()->clientScript->registerScript('dealcreate',"

     var text1Line = $('#Deals_deal_description1').val();
     var text2Line = $('#Deals_deal_description2').val();
     var regularPrice = $('#Deals_deal_regular_price').val();
     var salePrice = $('#Deals_deal_sale_price').val();
     var deal = $('#Deals_deal_name').val();
     var category = $('#Deals_category_id option:selected').text().replace(' ','_');

     if(text1Line!='')
        $('div.offername').text(text1Line);

     if(text2Line!='')
       $('div.offercompany').text(text2Line);

    if(regularPrice!='')
        $('span.regular').text('$' + regularPrice);

    if(salePrice!='')
        $('span.sale').text('$' + salePrice);

    if(deal!='')
    {
        $('h2').text(deal);
    }

    if(category!='')
    {
        var path ='".Yii::app()->baseUrl."'
        $('.offerimage img').attr('src', path+'/images/category/'+category+'.png' );

    }


     $('#Deals_category_id').on('change', function () {
        var category = $('#Deals_category_id option:selected').text().replace(' ','_');
        var path ='".Yii::app()->baseUrl."'
        $('.offerimage img').attr('src', path+'/images/category/'+category+'.png' );

    });

    $('#Deals_deal_name').on('keyup', function () {
        var deal = $(this).val();

        if(deal=='')
           deal = 'name of deal' ;

        $('h2').text(deal);
    });

    $('#Deals_deal_description1').on('keyup', function () {
        var text1Line = $(this).val();

        if(text1Line=='')
           text1Line = 'Line One Text' ;

        $('div.offername').text(text1Line);
    });

    $('#Deals_deal_description2').on('keyup', function () {
        var text2Line = $(this).val();

        if(text2Line=='')
           text2Line = 'Line Two Text' ;

        $('div.offercompany').text(text2Line);
    });

    $('#Deals_deal_regular_price').on('keyup', function () {
        var regularPrice = $(this).val();

         if(regularPrice=='')
           regularPrice = '2' ;

        $('span.regular').text('$' + regularPrice);
    });

    $('#Deals_deal_sale_price').on('keyup', function () {
        var salePrice = $(this).val();

         if(salePrice=='')
           salePrice = '1' ;

        $('span.sale').text('$' + salePrice);
    });

        $.fn.preload = function() {
        this.each(function(){
            $('<img/>')[0].src = this;
        });
    }
    ".$str."


    ",CClientScript::POS_END);
?>
