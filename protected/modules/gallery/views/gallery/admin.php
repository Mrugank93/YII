<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Manage',
);


?>


<h1>Manage Galleries</h1>

<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
	array(
		'id'=>'uploadFile',
		'config'=>array(
			'action'=>Yii::app()->createUrl('gallery/gallery/upload').'/user_id/'.Yii::app()->user->getId(),
			'allowedExtensions'=>array("jpg","jpeg","gif","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
			'sizeLimit'=>2097152,// maximum file size in bytes
			//'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
			'onComplete'=>"js:function(id, fileName, responseJSON){ $('#gallery-grid').yiiGridView.update('gallery-grid');  }",
			'messages'=>array(
				'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
				'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
				'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
				'emptyError'=>"{file} is empty, please select files again without it.",
				'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
			),
			'showMessage'=>"js:function(message){ alert(message); }"
		)
	)

); ?>

<?php

	Yii::import('application.components.EImageColumn');
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header'=>'User',
			'value'=>'$data->user_id?$data->user_id:"Admin"',
		),
		array(
			'class'=>'EImageColumn',
			'name' => 'name',
			'htmlOptions' => array('style' => 'width: 150px; height:150px'),
		),
		array(
			'header'=>'Date',
			'value'=>'date("M-d-Y",$data->updated)'
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{delete}'
		),
	),
)); ?>

