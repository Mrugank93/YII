<?php
/* @var $this BusinessProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Business Profiles',
);
?>
<div id="features">
    <div class="container">

<div id="business-admin">
    <h3><?php echo $model->business_profile_name;?></h3>
    <div class="banner"><img src="<?php echo Yii::app()->baseURL.'/gallery/thumbs/'.$model->header_image ?>"></div>

    <div class="span3">
        <h2><?php echo $model->section1_title;?></h2>
        <p><?php echo $model->section1_content;?></p>
    </div>
    <div class="span3">
        <h2><?php echo $model->section2_title;?></h2>
        <p><?php echo $model->section2_content;?></p>
    </div>
    <div class="span3">
        <h2><?php echo $model->section3_title;?></h2>
        <p><?php echo $model->section3_content;?></p>
    </div>

    <div class="span4"><img src="<?php echo Yii::app()->baseURL.'/assets_business/' ?>img/business-video.jpg"></div>
    <div class="span4">
        <?php
                $address =  $model->address.' '.$model->street.' '.$model->suite.' '.$model->city->city_short_name.', '.$model->state->state_iso.' '.$model->postal_code;
        ?>

        <iframe width="208" height="224" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
    </div>

    <div class="span3">
        <p><b><?php echo $model->business_profile_name;?></b><br />
            <?php echo $model->address.'  '.$model->street.' '.$model->suite.' '.$model->city->city_short_name.', ' ?><br />
            <?php echo $model->state->state_iso.' '.$model->postal_code; ?>
            <?php echo '</br>Phone: '.$model->phone_number; ?><br />
			<a href="http://ovationprinting.com/" target="_blank"><?php echo $model->website; ?></a><br />
			<a href="mailto:jonathan@ovationprinting.com" title="Email Us"><?php echo $model->user->email; ?></a>
        </p>

        <p class="hours"><b>Business Hours:</b>
            <?php echo $model->business_hours; ?>
        </p>

    </div>
    <div class="clear"></div>

    <h4>Reviews:</h4>
    <div class="readall"><a href="#">click to read all</a></div>
    <div class="reviews-box first-reviw">
        <p><b>Official GoodLynx Review</b><br>
        In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break.  <a class="expander collapsed" title="Read More" href="#">read more</a>
         <div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div></p>
    </div>
    <div class="reviews-box">
        <p><b>David B.</b><br>
		In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break. <a class="expander collapsed" href="#" title="read more">read more</a>
		<div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div>
		</p>
    </div>
    <div class="reviews-box">
        <p><b>Brad P.</b><br>
		In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break.  <a class="expander collapsed" href="#" title="read more">read more</a>
		<div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div>
		</p>
    </div>
    <div class="reviews-box">
        <p><b>Jessica A.</b><br>
		In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break.  <a class="expander collapsed" href="#" title="read more">read more</a>
		<div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div>
		</p>
    </div>
    <div class="reviews-box">
        <p><b>James M.</b><br>
		In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break.  <a class="expander collapsed" href="#" title="read more">read more</a>
		<div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div>
		</p>
    </div>
    <div class="reviews-box">
        <p><b>Jennifer G.</b><br>
		In this area, a user will be able to type some detail about what the header title says. They will be limited to a certain amount of characters so the page looks totally uniform and the code does not break.  <a class="expander collapsed" href="#" title="read more">read more</a>
		<div class="content" style="display: none;">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
           	<p>Donec porta porttitor tellus sit amet cursus. Morbi nulla odio, blandit ac interdum at, consectetur eget purus. Ut cursus rhoncus. </p>
         </div>
		</p>
    </div>
    <div class="pagination">
						<ul>
						<li><a href="#">Prev</a></li>
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">Next</a></li>
						</ul>
					</div>
    
    <div class="write-your-review">
    	<button data-toggle="dropdown" class="btn btn-warning btn-large">write your own review</button>
    </div>

</div>

</div>
</div>
