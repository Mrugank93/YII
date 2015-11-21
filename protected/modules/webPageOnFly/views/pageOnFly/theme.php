<?php

$this->pageTitle = $model->business_profile_name;;
?>

<div id='wrapper'>
    <div id='header'>
        <h1 id='title'><i><span class='blue'><?php echo $model->business_profile_name;?></span></i></h1>
        <ul id='bread_crumb_menu'>
            <li class='bread_crumb'><a href='#'>Home</a></li>
            <li class='bread_crumb'><a href='#'>>></a></li>
            <li class='bread_crumb'><a href='#'><?php echo $model->business_profile_name;?></a></li>
        </ul>
    </div>

    <div id='headerImage'>
        <img src="<?php echo Yii::app()->baseUrl; ?>/gallery/<?php echo $model->header_image; ?>" alt="Business Name" />
    </div>

    <div id='content'>
        <div class='row border_right'>
            <h2><span class='blue'><?php echo $model->section1_title;?></span> </h2>
            <p><?php echo $model->section1_content;?></p>
            <br>
            <input type='button' value='Read more' class='read_more'>
        </div>

        <div class='row border_right'>
            <h2><span class='blue'><?php echo $model->section2_title;?></span></h2>
            <p><?php echo $model->section2_content;?></p>
            <br>
            <input type='button' value='Read more' class='read_more'>
        </div>

        <div class='row'>
            <h2><span class='blue'><?php echo $model->section3_title;?></span></h2>
            <p><?php echo $model->section3_content;?></p>
            <br>
            <input type='button' value='Read more' class='read_more'>
        </div>
    </div>

    <div id='spacer'>
    </div>

	<?php
	$url = $model->user->street.','.$model->user->state->state_name.' '.$model->user->postal_code;
	$urlencoded = 'http://maps.google.com/maps?q='.urlencode($url).'&amp;output=embed';
	?>

    <div id='footer'>
        <div id='map'>
            <iframe id='google_map' width="300" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo $urlencoded;?>"></iframe><br />
        </div>


        <div id='contact'>
                <span>
                <p id='business_name'><?php echo $model->business_profile_name;?></p>
                <p id='business_address'><?php echo $model->user->street.','.$model->user->state->state_iso.' '.$model->user->postal_code;?></p>
                <p id='business_phone'><?php echo $model->user->cell_phone;?></p>
                </span>
        </div>

        <div id='attribution'>
            <p>Copyright &copy;2013 GoodLynx</p>
        </div>
    </div>
</div>
