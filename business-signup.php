<!doctype html>

<html>

<head>
    <title>GoodLynx - Business Signup</title>
    <link href='business-signup.css' rel='stylesheet'>
    <!-- Logo font thanks Google Fonts. -->
    <link href='http://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <script src='form-functions.js'></script>
</head>

<body>
    <div style='background-color: #e8e8e8; border-bottom: 1px solid #cdcdcd;'>
        <p style='color: #9db068; font-size: 20pt; font-family: "Nunito"; padding-top: 10px; padding-left: 30px; display: inline-block;'>
            GOODLYNX
        </p>

        <div id='navbar'>
            <div><a>ABOUT</a></div>
            <div><a>CONTACT</a></div>
            <div><a>INFO</a></div>
            <div><a>LINK</a></div>
        </div>
    </div>

    <br>

    <div>
        <div style='text-align: center;'>
            <p style='color: gray; font-size: 28px; font-weight: 600;'>Help your business grow with GoodLynx.</p>
            <br>
            <p style='color: green; font-size: 14pt;'>You get advertising. Individuals save money on your products and services. It's an all-around good deal.</p>
        </div>
        
        <br>
        
        <div style='background: url("images/generic-office.jpg") no-repeat; text-align: center; width: 100%; height: 450px; background-position: center;'>
            <div id='signup' style='background-color: #cfe7a8; border: solid 5px #a3b66e; padding: 2%; text-align: center; display: inline-block; opacity: 0.9; position: relative; top: 40px; left: 40px; width: 42%;'>
                <p style='color: olive; text-align: center; font-size: 14pt;'>Enter your e-mail for more information on how we can benefit you.</p>
                <br><br>
                <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
                    <input id='email_text' name='email_text' type='text' onfocus='clearInput()' onblur='restoreInput()' value='Type your email here' style='width: 320px; height: 50px; color: lightgray; margin-right: 4%; font-size: 18pt; font-style: italic; opacity: 1;'>
                    <input id='email_button' type='submit' value='Email me' style='height: 50px; font-size: 20pt; color: white; padding: 1% 4%; font-family: "Karla"; opacity: 1;'>
                </form>
            </div>
        </div>
        
        <br>
        
        <div>
            <p style='text-align: center; font-size: 28px; font-weight: 600; color: gray'>What are the benefits?</p>
            
            <br>
            
            <div style='text-align: center'><table id='benefits' style='width: 100%; border-collapse: separate; border-spacing: 10px; table-layout: fixed'>
                <tr>
                    <td>
                        <p>Reach local markets.
                        <br><br><img src='images/car.png' alt=''><br><br></p>
                        <p>GoodLynx is purely local. We want to get the small towns and give people living there a reason to buy local.</p>
                    </td>
                    <td>
                        <p>Spread the word.
                        <br><br><img src='images/globe.png' alt=''><br><br></p>
                        <p>The more businesses that use GoodLynx and offer deals, the more people that buy from your business.</p>
                    </td>
                    <td>
                        <p>Choose the duration.
                        <br><br><img src='images/arrow.png' alt=''><br><br></p>
                        <p>Run deals for a day or a month, or anything in between. You're in control.</p>
                    </td>
                    <td>
                        <p>Earn money.
                        <br><br><img src='images/cart.png' alt=''><br><br></p>
                        <p>Make money from your deals and the new business it generates.</p>
                    </td>
                </tr>
            </table></div>
        </div>
    </div>
    
    <?php
        require_once 'swiftmailer/lib/swift_required.php';
        
        $email = '';
        
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if (!empty($_POST['email_text']))
            {
                $email = cleanInput($_POST['email_text']);
                
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    store_email($email);
                }
            }
        }
        
        function cleanInput($input)
        {
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
        
        function store_email($email)
        {
            $connection = mysqli_connect("db543405003.db.1and1.com", "dbo543405003", "blueboy.23", "db543405003", 3306);
            
            if (mysqli_query($connection, "INSERT INTO business_emails (email) VALUES ('$email')"))
            {
                echo "<script>" . 
                        "document.getElementById('signup').innerHTML = '<p style=\"font-size: 28px;color: olive; text-align: center;\">Thanks for signing up!</p>';" .
                    "</script>";
                    
                $transport = Swift_SmtpTransport::newInstance('smtp.1and1.com', 587, 'ssl')
                    ->setUsername('welcome@goodlynx.com')
                    ->setPassword('bluesky.11!');
                    
                $mailer = Swift_Mailer::newInstance($transport);
                
                $message = Swift_Message::newInstance('Thanks for signing up!')
                    ->setFrom(array('welcome@goodlynx.com' => 'GoodLynx'))
                    ->setTo(array("$email"))
                    ->setBody('Thank you for signing up for GoodLynx! Check back soon for updates as we will be launching new deals soon.');
                    
                $mailer->send($message);
            }
            
            mysqli_close($connection); 
        }
    ?>
</body>

</html>