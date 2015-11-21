<?php
$this->breadcrumbs=array(
    'Dashboard',
);
?>
<?php $this->pageTitle=Yii::app()->name; ?>

<div id="features">
    <div class="container">


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
    <?php
    $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_deals',
        'ajaxUpdate'=>true,
        'itemsCssClass'=>'',
        'htmlOptions' => array('class' => 'row deals-container'),
        'pagerCssClass'=>'pagination',
        'summaryText'=>'',
        'enableSorting' => true,
//        'sortableAttributes'=>array(
//            'deal_id',
//        ),
        'pager'=>array(
            'cssFile'=>false,
            //'maxButtonCount' => 2,
            'class'=>'CLinkPager',
            'header'=>'',
            'firstPageLabel'=>'&lt;&lt;',
            'prevPageLabel'=>'&lt;',
            'nextPageLabel'=>'&gt;',
            'lastPageLabel'=>'&gt;&gt;',

    )));

    ?>
    </div><!-- content -->
</div>