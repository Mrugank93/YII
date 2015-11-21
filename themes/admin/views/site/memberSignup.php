<div id="signup">
    <div class="signupheading">
        <h2>Win Free Coupons on number of Local Deals</h2>
        <h3>Good Lynx Place where you can win coupons, buy deals and see many of our featured businesses</h3>
    </div>

    <div class="signupcontent">
        <div class="signin">
            <h4>Sign in to your Account</h4>
			<?php
				$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'id'=>'login-form',
				'focus'=>array($login,'username'),
				//	'enableClientValidation'=>true,
				//	'clientOptions'=>array(
				//		'validateOnSubmit'=>true,
				//	),
				));
			?>
							<?php echo $form->textFieldRow($login,'username',array('placeholder'=>'Email','class'=>'span5')); ?>

							<?php echo $form->passwordFieldRow($login,'password',array('class'=>'span5','placeholder'=>'Password','maxlength'=>50,'size'=>30)); ?>

							<?php echo CHtml::submitButton('Login',array('class'=>'submit','title'=>'Sign In Now', 'value'=>'Sing In')); ?>
            				<div class="forgot" ><a href="#" title="Forgot your password?">Forgot your password?</a></div>

			<?php $this->endWidget(); ?>
        </div>


        <div class="signup">
            <h4>Create a Business Account</h4>

  			<?php
			$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
				'id'=>'login-form',
				'focus'=>array($user,'first_name'),
				//	'enableClientValidation'=>true,
				//	'clientOptions'=>array(
				//		'validateOnSubmit'=>true,
				//	),
			));
			?>


			<?php echo $form->textFieldRow($user,'fax',array('placeholder'=>'Your Fax','maxlength'=>15, 'size'=>30)); ?>

			<?php echo $form->textFieldRow($user,'website',array('placeholder'=>'Your Website','maxlength'=>50, 'size'=>30)); ?>

			<?php echo $form->textFieldRow($user,'street',array('placeholder'=>'Your Street','maxlength'=>50, 'size'=>30)); ?>

			<?php echo $form->textFieldRow($user,'suite',array('placeholder'=>'Your Suite','maxlength'=>50, 'size'=>30)); ?>


    		<?php echo CHtml::submitButton('Login',array('class'=>'submit','title'=>'Sign Up Now', 'value'=>'Sing Up')); ?>
			<?php $this->endWidget(); ?>

        </div>


        <div class="clear"></div>
    </div>


</div>

