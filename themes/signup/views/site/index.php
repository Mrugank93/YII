<?php
$this->breadcrumbs=array(
    'Dashboard',
);
?>
<?php $this->pageTitle=Yii::app()->name; ?>

<?php

    $deal = new Deals();

    //print_r($deal);

    $criteria=new CDbCriteria(array(
        //'order'=>'status desc',
        'condition'=>"deal_status='Active'",

    ));

    $dataProvider=new CActiveDataProvider('deals', array(
        'criteria'=>$criteria,
    ));

    $dataProvider->pagination->pageSize=10;

    //print_r($dataProvider);
?>


<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-warning dropdown-toggle">Sort by <span class="caret"></span></button>
    <ul class="dropdown-menu">
        <li><a href="#">Newest deals</a></li>
        <li><a href="#">Ending soonest</a></li>
        <li><a href="#">Most popular</a></li>
        <li><a href="#">Category</a></li>
        <li><a href="#">My favourities</a></li>
    </ul>
</div>

<!-- feature list -->
<div class="row deals-container">
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_deals',
        'itemsCssClass'=>'',
        'pagerCssClass'=>'pagination',
        'summaryText'=>'',
        'enableSorting' => true,
//        'sortableAttributes'=>array(
//            'deal_id',
//        ),
        'pager'=>array(
            'cssFile'=>false,
            'class'=>'CLinkPager',
            'header'=>'',//text before it
            'firstPageLabel'=>'First',//overwrite firstPage lable
            'lastPageLabel'=>'Last',//overwrite lastPage lable
            'nextPageLabel'=>'Next',//overwrite nextPage lable
            'prevPageLabel'=>'Perv',//overwrite prePage lable
        ),

    ));

   ?>

</div>
