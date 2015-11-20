<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/signup.css">
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/signin.css">

<?php
Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".flash-success").animate({opacity: .8}, 4000).fadeOut("slow");',
    CClientScript::POS_READY
);
?>

<div id="box_login">
    <div class="container">
        <div class="span10 box_wrapper">
            <div class="span10 box">
                <div>
                    <div class="head">
                        <h4>Log in to your account</h4>
                    </div>

                    <div class="form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'login-form',
                            )
                        );
                        ?>
                        <?php
                        foreach(Yii::app()->user->getFlashes() as $key => $message) {
                            echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                        }
                        ?>

                        <?php echo $form->textField($model,'username',array('size'=>60,'placeholder'=>'Email')); ?>
                            <?php echo $form->error($model,'username'); ?>

                            <?php echo $form->passwordField($model,'password',array('size'=>60,'placeholder'=>'Password')); ?>
                            <?php echo $form->error($model,'password'); ?>

                            <div class="remember">
                                <div class="left">
                                    <?php echo $form->checkBox($model,'rememberMe'); ?>
                                    <label for="remember_me">Remember me</label>
                                </div>
                                <div class="right">
                                    <?php echo CHtml::link('Forget Password',array('/user/forget')); ?>
                                </div>
                            </div>
                            <?php echo CHtml::submitButton('Login', array('class'=>'btn')); ?>
                            <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <p class="already">Don't have an account?
                <?php echo CHtml::link('Sign up',array('/user/basic'),array('title'=>'Sign up'))?>

            </p>
        </div>
    </div>
</div>



