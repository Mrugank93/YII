<!DOCTYPE html>
<!-- saved from url=(0040)http://wbpreview.com/previews/WB0D95984/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Good LYNX - Win free coupons on number of Local Deals</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/signup.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/signin.css">

</head>
<body class="normal-home">
<a href="#" class="scrolltop" style="display: inline;"><span>up</span></a>


<!-- begins navbar -->
<div class="navbar navbar-fixed-top scroll">
    <div id="header">
        <div class="container">
            <div class="logo">
                <a class="brand scroller" data-section="body" href="index.html"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="logo"></a>
            </div>
            <div class="header-search">
                <form class="navbar-form pull-left">
                    <input name="" value="Looking for something special?" class="search-query" type="text">
                    <button type="submit" class="btn">Search</button>
                </form>
            </div>
            <div class="header-top">
                <ul class="nav">
                    <li><?php echo CHtml::link('Login',array('/user/login'),array('title'=>'Login'))?></li>
                    <li><?php echo CHtml::link('Sign up',array('/user/basic'),array('title'=>'Login'))?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select City<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php
                            $city = CHtml::listData(CityList::model()->cache(3600*6)->findAll(array('order'=>'city_short_name')), 'city_id', 'city_short_name');
                            foreach($city as $key=>$val)
                                echo " <li><a href=''#'>".$val."</a></li>";
                            ?>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!-- ends navbar -->

<?php echo $content;?>

<!-- starts footer -->
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="span3 contact_us">
                <h3>Main Navigation</h3>

                <ul>
                    <li><a title="Home" href="index.html">Home</a></li>
                    <li><a title="About Us" href="about.html">About Us</a></li>
                    <li><a title="View All Deals" href="services.html">View All Deals</a></li>
                    <li><a title="View All Coupons" href="projects.html">View All Coupons</a></li>
                    <li><a title="Contact Us" href="contact.html">Contact Us</a></li>
                </ul>

            </div>
            <div class="span3 contact_us">
                <h3>Our Deals</h3>

                <ul>
                    <li><a title="Food &amp; Drink Deals" href="services.html">Food &amp; Drink Deals</a></li>
                    <li><a title="Events &amp; Activities Deals" href="services.html">Events &amp; Activities Deals</a></li>
                    <li><a title="Beauty &amp; Spa Deals" href="services.html">Beauty &amp; Spa Deals</a></li>
                    <li><a title="Fitness Deals" href="services.html">Fitness Deals</a></li>
                    <li><a title="Shopping Deals" href="services.html">Shopping Deals</a></li>
                </ul>

            </div>
            <div class="span2 contact_us">
                <h3>Follow Us</h3>

                <div class="facebook"><a title="Follow us on Facebook" href="#">Facebook</a></div>
                <div class="twitter"><a title="Follow us on Twitter" href="#">Twitter</a></div>
                <div class="gplus"><a title="Follow us on Google Plus" href="#">Google Plus</a></div>
                <div class="rss"><a title="Follow us on RSS" href="#">RSS</a></div>

            </div>
            <div class="span4 contact_us">
                <h3>Contact Us</h3>
                <p>&copy; 2013 GoodLYNX  All Rights Reserved.<br>
                    <a title="Terms &amp; Conditions" href="#">Terms &amp; Conditions</a>   |   <a title="Privacy Policy" href="#">Privacy Policy</a>   |   <a title="Sitemap" href="#">Sitemap</a></p>

                <div class="phoneicon">Call: +123-456-7890</div>

                <div class="newsletter">
                    <form class="form-horizontal">
                        <div class="field">

                            <input type="text" placeholder="Subscribe for Newsletter" id="inputName">

                            <button type="submit" class="btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-latest.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/theme.js"></script>

</body>
</html>