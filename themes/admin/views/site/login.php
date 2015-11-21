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

            <h4>Create a new Account</h4>
            <form name="Submitform" method="post" action="">
                <label for="first_name">First Name:</label>
                <input  type="text" name="first_name" placeholder="Your First Name" class="regular error" maxlength="50" size="30"><span></span>

                <label for="last_name">Last Name:</label>
                <input  type="text" name="last_name" placeholder="Your Last Name" class="regular error" maxlength="50" size="30"><span></span>

                <label for="email">Email:</label>
                <input  type="text" name="email" placeholder="Your Email" class="regular error" maxlength="80" size="30"><span></span>

                <label for="telephone">Phone:</label>
                <input  type="text" name="telephone" placeholder="Your Phone Number" class="regular error" maxlength="30" size="30"><span></span>

                <label for="password">Password:</label>
                <input  type="password" name="password" placeholder="Type Password" class="regular error" maxlength="50" size="30"><span></span>

                <label for="re-password">Re-Password:</label>
                <input  type="password" name="re-password" placeholder="Re Type Password" class="regular error" maxlength="50" size="30"><span></span>

                <input type="submit" class="submit" title="Sign Up Now" value="Sign Up">

            </form>

        </div>


        <div class="clear"></div>
    </div>


</div>

