<!doctype html>

<html>

<head>

	<title>GoodLynx - People Signup</title>
    <link href='people-signup.css' rel='stylesheet'>
    <script src='form-functions.js'></script>
    <script src='overlay.js'></script>
    
</head>

<body>
    <div style='height:100%;'><div style='width: 60%; margin: 0 auto;height:100%;'><table style='height:100%;background:white;padding: 1%'>
        <tr>
            <td style='border-right: solid 1px gray; width: 50%; padding-right: 10px; padding-left: 10px;'>
                <img src='images/welcome.png' alt=''>
                
                <br><br>
                
                <img src='images/icon.png' alt='' class='icon'><p><b class='teal'>Basic Registration:</b> Daily notification of new deals and coupons.</p><br><br>
                <img src='images/icon.png' alt='' class='icon'><p><b class='teal'>VIP Registration:</b> Daily notifications of new deals and coupons. Receive SMS or text based notifications of flash sales, freebies, giveaways and contests and more.</p><br><br>
                <img src='images/icon.png' alt='' class='icon'><p><b class='teal'>Business Owner:</b> Click here to sign up as a business.</p><br><br>
                <img src='images/icon.png' alt='' class='icon'><p><b class='teal'>Visitor:</b> No need to sign up or create an account, you can view deals from any city or the entire list. Only registered users may purchase deals.</p><br><br>
            </td>
            <td style='padding-left: 10px;'><div id='signup-form'>
                <p style='font-size: 28px;margin-top:2%;' class='teal'>Sign Up Today!</p>
                <br>
                <p style='font-size: 24px' class='teal'>It's Easy and Free.</p>
                
                <br><br><br>
                
                
                <p style='font-size: 20px' class='teal'>Basic Registration</p>
                
                <br>
                
                <form id='signup_form' method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                    <p id='city_error' class='hidden-error'></p>
                    <select name='city' class='input' style='width: 310px;' placeholder='Select Your City'>
                        <option>Select Your City</option>
                        <option value='redding'>Redding</option>
                        <option value='mt. shasta'>Mt. Shasta</option>
                        <option value='chico'>Chico</option>
                        <option value='eureka'>Eureka</option>
                        <option value='red bluff'>Red Bluff</option>
                    </select>
                    
                    <br><br>
                    
                    <p id='email_error' class='hidden-error'></p>
                    <input name='email' type='text' class='input' placeholder='Email Address' required>
                    <br><br>
                    <input name='email_confirm' type='text' class='input' placeholder='Confirm Email Address' required>
                    <br><br>
                    <p id='password_error' class='hidden-error'></p>
                    <input name='password' type='password' class='input' placeholder='Choose a Password' required>
                    <br><br>
                    <input name='password_confirm' type='password' class='input' placeholder='Confirm Password' required>
                    
                    <br><br><br><br>
                    
                    <p style='font-size: 24px' class='teal'>What is better than a great deal? Free Stuff!</p>
                    <br>
                    <p>To receive text notifications of freebies, giveaways, and contests - enter your 10 digit cell phone number. This is entirely optional.</p>
                    <br>
                    <p id='phone_error' class='hidden-error'></p>
                    <input name='phone' type='text' class='input' style='width: 150px' maxlength='10'>
                    
                    <br><br>
                    
                    <div style='text-align: right'><input type='submit' value='Sign Up' style='padding: 2%; background-color: orange; color: white; border: solid 1px orange;border-radius: 5px;' class='rounded'></div>
                </form>
            </div></td>
        </tr>
    </table></div></div>
    
    <?php
        $valid_email = false;
        $valid_city = false;
        $valid_password = false;
        $valid_phone = false;
        
        $email = '';
        $password = '';
        $city = '';
        $phone = '';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (!empty($_POST['email']))
            {
                $email = clean_input($_POST['email']);
                $email_confirm = clean_input($_POST['email_confirm']);
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    if (strcmp($email, $email_confirm) == 0)
                    {
                        $valid_email = true;
                    }
                    else
                    {
                        echo "<script>showError('email_error', 'Emails do not match!')</script>";
                    }
                }
                else
                {
					echo "<script>showError('email_error', 'Email is invalid!')</script>";
                }
            }
            
            if (!empty($_POST['password']))
            {
                $password = clean_input($_POST['password']);
                $password_confirm = clean_input($_POST['password_confirm']);
                
                if (strcmp($password, $password_confirm) == 0)
                {
                    $valid_password = true;
                }
                else
                {
					echo "<script>showError('password_error', 'Password do not match!')</script>";
                }
            }
            
            if ($_POST['city'] != 'Select Your City')
            {
                $city = $_POST['city'];
                $valid_city = true;
            }
            else
            {
				echo "<script>showError('city_error', 'You need to pick a city!')</script>";
            }
            
            if (!empty($_POST['phone']))
            {
                $phone = clean_input($_POST['phone']);
                $phone = preg_replace('#([0-9]+)#', '\1', $phone);

                if (is_numeric($phone))
                {
                    $valid_phone = true;
                }
                else
                {
					echo "<script>showError('email_error', 'Phone number is invalid!')</script>";
                }
            }
			else
			{
				$valid_phone = true;
			}

            if ($valid_email && $valid_password && $valid_city && $valid_phone)
            {
                store_person($email, $password, $city, $phone);
                echo "<script>showOverlay()</script>";
            }
        }
        
        function clean_input($input)
        {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            
            return $input;
        }
        
        function store_person($email, $password, $city, $phone)
        {
            $connection = mysqli_connect("db543405003.db.1and1.com", "dbo543405003", "blueboy.23", "db543405003", 3306);
            $salt = substr(md5(rand()), 0, 12);
            $password = hash("sha512", $salt.$password);
            
            if (mysqli_query($connection, "INSERT INTO people (email, password, salt, city, phone) VALUES ('$email', '$password', '$salt', '$city', '$phone')"))
            {
                return true;
            }
            
            mysqli_close($connection); 
        }
    ?>
</body>

</html>