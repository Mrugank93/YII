<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<section class="col">
    <p class="center-align"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/welcome image.jpg" width="426" alt="Welcome  to GoodLynx" ></p>
    <ul class="listing">
        <li><strong>Basic Registration:</strong>Daily notiﬁcation of new deals and coupons.</li>
        <li><strong>VIP Registration:</strong>Daily notiﬁcations of new deals and coupons. Receive SMS or text based notiﬁcations of ﬂash sales, freebies, giveaways and contests and more.</li>
        <li><strong>Business Owner:</strong>Click here to sign up as a business.</li>
        <li><strong>Visitor:</strong>No need to sign up or create an account, you can view deals from any city or the entire list. Only registered users may purchase deals.</li>
    </ul>
</section>



<section class="col border-none">
    <h1 class="right-head">Sign Up Today! <span>It's Easy and Free.</span></h1>
    <h2 class="right-head">Basic Registration</h2>
    <p>

    <div class="form">
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            'enableAjaxValidation'=>false,
        )); ?>


        <?php echo $form->dropDownList($userDetails,'city_id',CHtml::listData(CityList::model()->findAll(array("order"=>"city_short_name")),'city_id','city_short_name'), array('prompt' => 'Select Your City','class'=>'select')); ?>

        <?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Email Address')); ?>
        <?php echo $form->error($user,'email'); ?>

        <?php echo $form->textField($user,'confirmEmail',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Confirm Email Address')); ?>
        <?php echo $form->error($user,'confirmEmail'); ?>

        <?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Choose a Password')); ?>
        <?php echo $form->error($user,'password'); ?>

        <?php echo $form->passwordField($user,'confirmPassword',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Confirm Password')); ?>
        <?php echo $form->error($user,'confirmPassword'); ?>

    </p>
    <p class="top-marg">
        <!-- <span class="or-txt">or</span><span class="btn-container"><a href="#" class="fb-btn" ></a> -->
        <!--<label class="small-txt">No way! we won’t post to your facebook page</label> -->
        </span></p><div class="clear"></div>
    <h2 class="right-head-2">What is better than a great deal?  &nbsp;&nbsp; Free Stuff!</h2>
    <p class="small-txt">Receive text notiﬁcations of freebies, giveaways, and contests enter your 10 digit cell phone number.</p>
    <p>
        <?php echo $form->textField($user,'cell_first',array('size'=>60,'maxlength'=>3,'class'=>'input-full small-input')); ?>
        <?php echo $form->textField($user,'cell_middle',array('size'=>60,'maxlength'=>3,'class'=>'input-full small-input')); ?>
        <?php echo $form->textField($user,'cell_last',array('size'=>60,'maxlength'=>4,'class'=>'input-full small-input')); ?>

        <?php echo CHtml::submitButton('',array('class'=>'signup-btn signup-btn-2')); ?>

    </p>

    <?php $this->endWidget(); ?>
    <div>

</section>

