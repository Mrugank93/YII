<?php
/* @var $this GalleryController */
/* @var $model Gallery */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php

		$url =  $this->createUrl('webPageOnFly/create/image/');

	$this->widget('ext.EAjaxUpload.EAjaxUpload',
		array(
			'id'=>'uploadFile',
        	'config'=>array(
			'action'=>Yii::app()->createUrl('webPageOnFly/gallery/upload').'/user_id/'.Yii::app()->user->getId(),
			'allowedExtensions'=>array("jpg","jpeg","gif","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
			'sizeLimit'=> 2097152,// maximum file size in bytes
			//'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
		'onComplete'=>"js:function(id, fileName, responseJSON)
					{
						var url = '$url' ;
						$(location).attr('href',url+'/'+responseJSON['filename']);

						//alert(responseJSON['image_id']);

					}",
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

</div><!-- form -->


<?php
//create a link
	echo  CHtml::link('Select from gallery',"#data", array("id"=>"fancy-link"));

//put fancybox on page
	$this->widget('ext.fancybox.EFancyBox', array(
		'target'=>'a#fancy-link',
		'config'=>array( /*'scrolling' => 'yes', */'titleShow' => true,),
		));
?>


<div style="display:none">
    <div id="data">
	<h2>Image Gallery</h2>
	<table>
	<tr>
	<?php
	    	$count  = 0;
			foreach($model as $data) {
	?>
	<?php
		if($count++==4) echo "</tr><tr><td>";
		else echo "<td>";
		$imghtml = CHtml::image(Yii::app()->baseURL."/gallery/".$data->name, $data->name, array('width'=>200,'height'=>250));
		echo CHtml::link($imghtml, array('create', 'image'=>$data->name));
		echo "</td>";
	?>
	<?php } ?>
	</tr>
    </table>

    </div>
</div>