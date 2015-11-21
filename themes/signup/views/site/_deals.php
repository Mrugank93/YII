<?php
/* @var $this CityListController */
/* @var $data CityList */
?>

<div class="span3 feature column-deals<?php $column =(($index+1)%5); if($column==0) { $column = 5;} echo $column?>">
    <h3><?php echo $data->deal_name; ?></h3>
    <img src="<?php echo Yii::app()->baseUrl; ?>/images/deals/<?php echo $data->deal_image; ?>" alt="feature1" class="thumb">


    <div class="description">
        <div class="offername"><?php echo $data->deal_description1; ?></div>
        <div class="offercompany"><?php echo $data->deal_description2; ?></div>
        <div class="offerprice"><span><?php echo $data->deal_regular_price; ?></span>   <?php echo $data->deal_sale_price; ?></div>
    </div>
    <div class="buynow"><a href="#" class="btn btn-default">Buy&nbsp;Now</a></div>
</div>

