<?php
/* @var $this UserController */
/* @var $user User */
/* @var $form CActiveForm */
?>

<section class="col">
    <p class="center-align"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/welcome image.jpg" width="426" alt="Welcome  to GoodLynx" ></p>
    <h4>We have some powerful and effective tools that will help your business grow.</h4>
    <h4>Goodlynx is a feature rich community plateform that enables local businessess to communicate with the community they operate in.</h4>
    <h4>Sign up today and see how simple it is to grow your business in local community.</h4>
</section>
<section class="col border-none">
    <h1 class="right-head">Sign Up Today! <span>It's Easy and Free.</span></h1>
    <h2 class="right-head">Business Registration</h2>
    <p>

    <div class="form">

        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'user-form',
            'enableAjaxValidation'=>false,
        )); ?>

        <?php echo $form->dropDownList($userDetails,'city_id',CHtml::listData(CityList::model()->findAll(array("order"=>"city_short_name")),'city_id','city_short_name'), array('prompt' => 'Select Your City','class'=>'select')); ?>


        <?php echo $form->textField($userDetails,'business_profile_name',array('size'=>60,'maxlength'=>100,'class'=>'input-full','placeholder'=>'Business Name')); ?>

        <?php echo $form->textField($userDetails,'address',array('size'=>60,'maxlength'=>100,'class'=>'input-full','placeholder'=>'Address')); ?>

        <?php echo $form->textField($userDetails,'street',array('size'=>60,'maxlength'=>100,'class'=>'input-full','placeholder'=>'street')); ?>

        <?php echo $form->textField($userDetails,'suite',array('size'=>60,'maxlength'=>15,'class'=>'input-full','placeholder'=>'Suite')); ?>

        <?php echo $form->textField($userDetails,'postal_code',array('size'=>60,'maxlength'=>5,'class'=>'input-full','placeholder'=>'Zipcode')); ?>


        <?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Email Address')); ?>
        <?php echo $form->error($user,'email'); ?>

        <?php echo $form->textField($user,'confirmEmail',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Confirm Email Address')); ?>
        <?php echo $form->error($user,'confirmEmail'); ?>

        <?php echo $form->radioButtonList($user,'email_status',array('Public'=>'Email Public','Private'=>'Email Private'),array('separator'=>'','labelOptions'=>array('style'=>'display:inline'))); ?>

        <?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Choose a Password')); ?>
        <?php echo $form->error($user,'password'); ?>

        <?php echo $form->passwordField($user,'confirmPassword',array('size'=>60,'maxlength'=>128,'class'=>'input-full','placeholder'=>'Confirm Password')); ?>
        <?php echo $form->error($user,'confirmPassword'); ?>

        <?php $category =  new Category(); ?>

        <?php echo $form->dropdownList($userDetails,'category_id', $category->getCategoryList() ,array('encode'=>false, 'prompt' =>'Choose business category','class'=>'select')); ?>

        <?php echo $form->textField($userDetails,'website',array('size'=>60,'maxlength'=>50,'class'=>'input-full','placeholder'=>'Website Address')); ?>


        <?php echo CHtml::submitButton('',array('class'=>'signup-btn signup-btn-2')); ?>

        <?php $this->endWidget(); ?>

    </div>

    </p>

</section>