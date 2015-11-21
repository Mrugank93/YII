<?php
/* @var $this BusinessProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Profiles',
);
?>

<div id="business-admin">
    <h3><?php echo $model->business_profile_name;?></h3>
    <div class="banner"><img src="<?php echo Yii::app()->baseURL.'/gallery/thumbs/'.$model->header_image ?>"></div>

    <div class="span3">
        <h2><?php echo $model->section1_title;?></h2>
        <p><?php echo $model->section1_content;?></p>
    </div>
    <div class="span3">
        <h2><?php echo $model->section2_title;?></h2>
        <p><?php echo $model->section1_content;?></p>
    </div>
    <div class="span3">
        <h2><?php echo $model->section3_title;?></h2>
        <p><?php echo $model->section1_content;?></p>
    </div>

    <div class="span4"><img src="img/business-video.jpg"></div>
    <div class="span4"><img src="img/business-map.jpg"></div>
    <div class="span5">
        <p><b><?php echo $model->business_profile_name;?></b>
            <?php echo $model->address.'  '.$model->street.' '.$model->suite.' '.$model->city->city_short_name.', ' ?>
            <?php echo $model->state->state_iso.' '.$model->postal_code; ?>
            <?php echo '</br>Phone: '.$model->phone_number.' '.$model->website.' '.$model->user->email; ?>
        </p>

        <p class="hours"><b>Business Hours:</b>
            <?php echo $model->business_hours; ?>
        </p>

    </div>
    <div class="clear"></div>

    <h4>Reviews:</h4>
    <div class="readall"><a href="#">click to read all</a></div>
    <div class="reviews-box">
        <p><b>Brendan F.</b><br>
            In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break. <a href="#" title="read more">read more</a></p>
    </div>
    <div class="reviews-box">
        <p><b>David B.</b><br>
            In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break. <a href="#" title="read more">read more</a></p>
    </div>

</div>

