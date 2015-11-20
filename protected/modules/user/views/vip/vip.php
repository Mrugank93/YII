<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Signup',
);

?>

<h1>Signup VIP User</h1>

<?php echo $this->renderPartial('/vip/_vip_form', array('user'=>$user, 'userDetails'=>$userDetails)); ?>