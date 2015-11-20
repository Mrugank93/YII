<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Signup',
);

?>

<?php echo $this->renderPartial('/basic/_basic_form', array('user'=>$user, 'userDetails'=>$userDetails)); ?>