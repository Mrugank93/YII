<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Activation',
);
?>

<div class="form">

	<?php
		Yii::app()->clientScript->registerScript(
			'myHideEffect',
			'$(".flash-success").animate({opacity: .8}, 4000).fadeOut("slow");',
			CClientScript::POS_READY
		);
		foreach(Yii::app()->user->getFlashes() as $key => $message) {
			echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
		}
	?>
</div><!-- form -->
