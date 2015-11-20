<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>Good LYNX - Win free coupons on number of Local Deals<?php echo CHtml::encode($this->pageTitle); ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/animate.css">
	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/simple-expand.js"></script>
    
    <script type="text/javascript">
        $(function () {
            $('.expander').simpleexpand();
            prettyPrint();
        });
    </script>
	
</head>
<body class="business-container normal-home">
<a href="#" class="scrolltop" style="display: inline;"><span>up</span></a>


<!-- begins navbar -->
<div <?php if(Yii::app()->controller->id=='pageOnShow') echo "class='navbar navbar-fixed-top business-header'"; else echo "class='navbar navbar-fixed-top scroll'"; ?>>
    <div id="header">
        <div class="container">
            <div class="logo">

                <a class="brand scroller" data-section="body" href="google.com"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/logo.png" alt="logo"></a>
            </div>
            <div class="header-search">
                <form class="navbar-form pull-left">
                <input name="" value="Looking for something special?" class="search-query" type="text">
                <button type="submit" class="btn">Search</button>
                </form>
            </div>
            <div class="header-top">

                <?php

                $city = CHtml::listData(CityList::model()->cache(3600*6)->findAll(array('order'=>'city_short_name')), 'city_id', 'city_short_name');
                $cityArray = array();
                foreach($city as $key=>$val)
                    $cityArray[] = array('label'=>$val, 'url' => array( '#' ));

                $this->widget( 'zii.widgets.CMenu', array(
                    'id'=>true,
                    'encodeLabel'=>false,
                    'htmlOptions' => array( 'class' => 'nav' ),
                    'items' => array(
                        array('label'=>'Login', 'url'=>array('/user/login'),'tag'=>'new' ,'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Sign up', 'url'=>array('/user/basic'),'visible'=>Yii::app()->user->isGuest),

                        array(
                            'label' =>'Select City<b class="caret"></b>',
                            'url' => '#',
                            'visible'=>Yii::app()->user->isGuest,
                            'submenuOptions' => array( 'class' => 'dropdown-menu' ),
                            'items' => $cityArray,
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),
                        ),


                        array('label'=>'Welcome',
                            'url'=>array('/'),
                            //'linkOptions'=>array('encode'=>false,'class'=>'welcome'),
                            'itemOptions'=>array('class'=>'welcome'),
                            'visible'=>!Yii::app()->user->isGuest
                        ),
                        array(
                            'label' =>Yii::app()->user->name.'<b class="caret"></b>',
                            'url' => '#',
                            'visible'=>!Yii::app()->user->isGuest,
                            'submenuOptions' => array( 'class' => 'dropdown-menu' ),
                            'items' => array(
                                array('label'=>'Change City', 'url'=>array('/user/BusinessProfile')),
                                array('label'=>'View Profile', 'url'=>array('/user/BusinessProfile')),
                                array('label'=>'Search for a business', 'url'=>array('/user/BusinessProfile')),
                                array('label'=>'Logout', 'url'=>array('/site/logout')),

                            ),
                            'itemOptions' => array( 'class' => 'dropdown' ),
                            'linkOptions' => array( 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown' ),
                        ),

                    )));

                ?>

            </div>
        </div>
    </div>
</div>
<!-- ends navbar -->

<!-- View All Deals -->
<?php echo $content;?>
<!-- starts testimonial -->

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

<?php Yii::app()->getClientScript()->registerCoreScript('jquery'); ?>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/theme.js"></script>
</body>
</html>

