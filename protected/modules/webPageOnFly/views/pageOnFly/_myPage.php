<?php
$baseUrl = Yii::app()->baseUrl;
//	Yii::app()->clientScript->registerCoreScript('jquery');
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/assets_business/css/theme.css');
$cs->registerScriptFile($baseUrl.'/assets_business/js/jquery.textareaCounter.plugin.js', CClientScript::POS_END);
$cs->registerScriptFile($baseUrl.'/assets_business/js/customJS.js', CClientScript::POS_END);
?>


       <div id="ModelSection1" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3><?php echo $model->business_profile_name;?></h3>
            </div>
            <div class="modal-body">
                <div class="divDialogElements">
                    <form class="form-horizontal well" data-async-section1 data-target="#rating-modal" method="post" action="<?php echo Yii::app()->createUrl( '/webPageOnFly/PageOnFly/ajaxContentUpdate' );?>">
                            <input type="text" id="modelSectionTitle1" maxlength="20" name="section1_title" value="<?php echo $model->section1_title;?>">
                            <input type="hidden" name="user_id" value="<?php echo $model->user_id;?>">
                            <textarea id="modelSectionContent1" name="section1_content" cols="20" rows="10" maxlength="400"><?php echo $model->section1_content;?></textarea>
                            <div class="divButton">
                            <button type="submit" class="btn btn-success">Insert</button>
                        </div>
                    </form>
                    <div id='loadingDivSection1' class="loadingDiv">
                        Please wait...  <img src="<?php echo Yii::app()->baseURL.'/assets_business/img/ajax-loader.gif'; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <a href="#" class="btn btn success" data-dismiss="modal">Close</a>
            </div>
        </div>




        <div id="ModelSection2" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3><?php echo $model->business_profile_name;?></h3>
            </div>
            <div class="modal-body">
                <div class="divDialogElements">
                    <form class="form-horizontal well" data-async-section2 data-target="#rating-modal" method="post" action="<?php echo Yii::app()->createUrl( '/webPageOnFly/PageOnFly/ajaxContentUpdate' );?>">
                        <input type="text" id="modelSectionTitle2" maxlength="20" name="section2_title" value="<?php echo $model->section2_title;?>">
                        <input type="hidden" name="user_id" value="<?php echo $model->user_id;?>">
                        <textarea id="modelSectionContent2" name="section2_content" cols="20" rows="10" maxlength="400"><?php echo $model->section2_content;?></textarea>
                        <div class="divButton">
                            <button type="submit" class="btn btn-success">Insert</button>
                        </div>
                    </form>
                    <div id='loadingDivSection2' class="loadingDiv">
                        Please wait...  <img src="<?php echo Yii::app()->baseURL.'/assets_business/img/ajax-loader.gif'; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn success" data-dismiss="modal">Close</a>
            </div>
        </div>


        <div id="ModelSection3" class="modal hide fade in" style="display: none; ">
            <div class="modal-header">
                <a class="close" data-dismiss="modal">×</a>
                <h3><?php echo $model->business_profile_name;?></h3>
            </div>
            <div class="modal-body">
                <div class="divDialogElements">
                    <form class="form-horizontal well" data-async-section3 data-target="#rating-modal" method="post" action="<?php echo Yii::app()->createUrl( '/webPageOnFly/PageOnFly/ajaxContentUpdate' );?>">
                        <input type="text" id="modelSectionTitle3" maxlength="20" name="section3_title" value="<?php echo $model->section3_title;?>">
                        <input type="hidden" name="user_id" value="<?php echo $model->user_id;?>">
                        <textarea id="modelSectionContent3" name="section3_content" cols="20" rows="10" maxlength="400"><?php echo $model->section3_content;?></textarea>
                        <div class="divButton">
                            <button type="submit" class="btn btn-success">Insert</button>
                        </div>
                    </form>
                    <div id='loadingDivSection3' class="loadingDiv">
                        Please wait...  <img src="<?php echo Yii::app()->baseURL.'/assets_business/img/ajax-loader.gif'; ?>" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn success" data-dismiss="modal">Close</a>
            </div>
        </div>


<div id="ModelHours" class="modal hide fade in" style="display: none; ">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3><?php echo $model->business_profile_name;?></h3>
    </div>
    <div class="modal-body">
        <div class="divDialogElements">
            <form class="form-horizontal well" data-async-hours data-target="#rating-modal" method="post" action="<?php echo Yii::app()->createUrl( '/webPageOnFly/PageOnFly/ajaxContentUpdate' );?>">
                <input type="hidden" name="user_id" value="<?php echo $model->user_id;?>">
                <textarea id="modelHours" name="business_hours" cols="20" rows="10" maxlength="125"><?php echo $model->business_hours;?></textarea>
                <div class="divButton">
                    <button type="submit" class="btn btn-success">Insert</button>
                </div>
            </form>
            <div id='loadingDivHours' class="loadingDiv">
                Please wait...<img src="<?php echo Yii::app()->baseURL.'/assets_business/img/ajax-loader.gif'; ?>" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <a href="#" class="btn btn success" data-dismiss="modal">Close</a>
    </div>
</div>






<!-- Start Business theme from -->

    <div id="business-admin">
    <div></div>
    <h3><?php echo $model->business_profile_name;?></h3>

    <div id="headerBanner" class="banner" style="background-image: url(<?php echo Yii::app()->baseURL.'/gallery/thumbs/'.$model->header_image ?>);">


        <div class="header_Div1 show_on_hover_header">
            <?php
            $this->widget('ext.EAjaxUpload.EAjaxUpload',
                array(
                    'id'=>'uploadFile',
                    'config'=>array(
                        'action'=> $this->createUrl('upload'),
                        'allowedExtensions'=>array("jpg","jpeg","gif"),//array("jpg","jpeg","gif","exe","mov" and etc...
                        'sizeLimit'=>2097152,// maximum file size in bytes
                        //'minSizeLimit'=>10,//*1024*1024,// minimum file size in bytes
                        'onComplete'=>"js:function(id, filename, responseJSON)
                    {

                                    if (responseJSON.success)
                                    {
                                        $('#cropImg').load('". $this->createUrl('cropImg') ."/fileName/'+responseJSON['filename']);
                                        $('#cropDialog').dialog('open');
                                        $('.qq-upload-list').hide();
                                        return false;
                                    }
                                    else
                                    {
                                                $('#uploadFile').html('<p  width=\"160\">' + responseJSON.error +'</p>');
                                    }

                    }",
//                        'messages'=>array(
//                             'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
//                            'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
//                            'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
//                            'emptyError'=>"{file} is empty, please select files again without it.",
//                            'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
//                        ),
//                        'showMessage'=>"js:function(message){ alert(message); }"
                    )
                ));
            ?>

        </div>



    </div>


        <div id="section1" class="span3">
        <h2><?php echo $model->section1_title;?></h2>
        <p><?php echo $model->section1_content;?></p>
        <div class="show_on_hover_section1">
          <a data-toggle="modal" href="#ModelSection1" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <div id="section2" class="span3">
        <h2><?php echo $model->section2_title;?></h2>
        <p><?php echo $model->section2_content;?></p>
        <div class="show_on_hover_section2">
            <a data-toggle="modal" href="#ModelSection2" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <div id="section3" class="span3">
        <h2><?php echo $model->section3_title;?></h2>
        <p><?php echo $model->section3_content;?></p>
        <div class="show_on_hover_section3">
            <a data-toggle="modal" href="#ModelSection3" class="btn btn-primary">Edit</a>
        </div>
    </div>


    <div class="span4"><img src="<?php echo Yii::app()->baseURL."/assets_business/img/business-video.jpg"?>"></div>
    <div class="span4"><img src="<?php echo Yii::app()->baseURL."/assets_business/img/business-map.jpg"?>"></div>

    <div id="hours" class="span5">
        <p><b><?php echo $model->business_profile_name;?></b>
            <?php echo $model->address.'  '.$model->street.' '.$model->suite.' '.$model->city->city_short_name.', ' ?>
            <?php echo $model->state->state_iso.' '.$model->postal_code; ?>
            <?php echo '</br>Phone: '.$model->phone_number.' '.$model->website.' '.$model->user->email; ?>
        </p>

        <p class="hours"><b>Business Hours:</b>
            <?php echo $model->business_hours; ?>
        </p>
        <div class="show_on_hover_hours">
            <a data-toggle="modal" href="#ModelHours" class="btn btn-primary">Edit</a>
        </div>

    </div>
    <div class="clear"></div>

    <h4>Reviews:</h4>
    <div class="reviews-box">
        <p><b>User 1</b><br>
            In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break. <a href="#" title="read more">read more</a></p>
    </div>
    <div class="reviews-box">
        <p><b>User 2</b><br>
            In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break. <a href="#" title="read more">read more</a></p>
    </div>

</div>





<?php

    $this->beginWidget('zii.widgets.jui.CJuiDialog',
        array(
            'id'=>'cropDialog',
            'options'=> array(
                'title'=>'Resize and Crop',
                'width'=>'900',
                'height'=>'550',
                'buttons' => array('Close'=>'js:function()
                {

                    var url =\''.Yii::app()->getBaseUrl(true).'/gallery/thumbs/'.'\';
                    var imageUrl = $(\'.jcrop[alt=\"Crop This Image\"]\').attr(\'src\');
                    var index = imageUrl.lastIndexOf("/") + 1;
                    var filename = imageUrl.substr(index);
                    var filename = url+imageUrl.substr(index);
                    var image = $(\'.banner\');
                    image.css("background", \'url(\'+filename+\')\');
                    image.css(\'background-repeat\', \'no-repeat\');

                    image.css("border", "0 none");
                    image.css("height", "158px");
                    image.css("max-width", "750px");

                    $(\'#cropDialog\').dialog(\'close\');
                }'),
                'autoOpen'=>false,
            )
        ));

    echo '<div id="cropImg"></div>';

$this->endWidget('zii.widgets.jui.CJuiDialog');




?>


<!-- End Business theme from -->

