<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<head>
    <title>Good LYNX <?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Bootstrap -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Extended -->
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/select2/select2.css"/>

    <!-- Notyfy -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/notyfy/jquery.notyfy.css"/>
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/notyfy/themes/default.css"/>

    <!-- JQueryUI v1.9.2 -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" />

    <!-- Glyphicons -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/css/glyphicons.css" />

    <!-- Bootstrap Extended -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />

    <!-- Uniform -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/pixelmatrix-uniform/css/uniform.default.css" />

    <!-- JQuery v1.8.2 -->

    <!-- Modernizr -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/modernizr.custom.76094.js"></script>

    <!-- MiniColors -->
    <link rel="stylesheet" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/jquery-miniColors/jquery.miniColors.css" />

    <!-- Theme -->
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/css/style.min.css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/theme/css/custom-style.css" />

    <!-- LESS 2 CSS -->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/less-1.3.3.min.js"></script>

    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery.ui'); ?>

    <!--[if IE]><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/excanvas/excanvas.js"></script><![endif]-->
    <!--[if lt IE 8]><script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/json2.js"></script><![endif]-->
</head>
<body>


<!-- Start Content -->
<div class="container-fluid fixed left-menu">

<div id="wrapper">

<div id="menu" class="hidden-phone">
    <span class="profile">

        <span class="img"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/profile.png" alt="Mr. Awesome" /></span>

        <span>
        <strong><?php echo Yii::app()->user->getName();?></strong>
        </span>

    </span>

<?php $this->widget('zii.widgets.CMenu',array(
        'linkLabelWrapper' => 'span',
        'activeCssClass'=>'active',
        'encodeLabel'=>false,
        'id'=>false,
        'items'=>array(
                    array('label'=>'Options','itemOptions'=>array('class'=>'heading')),
                    array('label'=>'Home Page', 'url'=>array('/')),
                    array('label'=>'Manage Deal', 'url'=>array('/deals/deals/admin'),'visible'=>Yii::app()->user->checkAccess('Super Admin')),
                    array('label'=>'Category', 'url'=>array('/deals/category/admin'),'visible'=>Yii::app()->user->checkAccess('Super Admin')),

                    array('label'=>'Create a Deal', 'url'=>array('/deals/deals/create'),'visible'=>Yii::app()->user->checkAccess('Business Owner')),
                    array('label'=>'Create a Coupon', 'url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Business Owner')),
                    array('label'=>'List a Community Event', 'url'=>array('/event/event/index'),'visible'=>Yii::app()->user->checkAccess('Business Owner')),
                    array('label'=>'My Page', 'url'=>array('/webPageOnFly/PageOnFly/myPage'),'visible'=>Yii::app()->user->checkAccess('Business Owner')),
                    array('label'=>'Marketing Materials', 'url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Business Owner')),
                    array('label'=>'Tools', 'url'=>array(''),'visible'=>Yii::app()->user->checkAccess('Business Owner')),

                    array('label'=>'Profile', 'url'=>array('/user/Profile'),'visible'=>Yii::app()->user->checkAccess('Regular User, VIP User')),

                    array('label'=>'Profile', 'url'=>array('/user/BusinessProfile'),'visible'=>Yii::app()->user->checkAccess('Business Owner')),

                    array('label'=>'logout', 'url'=>array('/site/logout')),
                ),
        ));
?>


</div>

    <?php echo $content;?>

</div>

</div>

<!-- Themer -->

<!-- Select2 -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/select2/select2.js"></script>

<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/jquery.cookie.js"></script>

<!-- Resize Script -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/jquery.ba-resize.js"></script>

<!-- Uniform -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/pixelmatrix-uniform/jquery.uniform.min.js"></script>

<!-- Bootstrap Script -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap Extended -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootbox.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js" type="text/javascript"></script>

<!-- Custom Onload Script -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/load.js"></script>

<!-- Layout Options -->
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/theme/scripts/layout.js"></script>

</body>
</html>