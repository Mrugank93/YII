<!doctype html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php $baseUrl = Yii::app()->theme->baseUrl; ?>
    <link href="<?php echo $baseUrl?>/css/style.css" type='text/css' rel='stylesheet'>
</head>

<body>

<?php echo $content; ?>

</body>

</html>
