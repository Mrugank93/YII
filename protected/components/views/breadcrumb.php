<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sajib
 * Date: 3/22/13
 * Time: 2:35 AM
 * To change this template use File | Settings | File Templates.
 */
echo '<ul '.'class="'.$this->htmlOptions['class'].'">';

foreach($this->crumbs as $k => $crumb)
{
    if($crumb[0]=='Home')
        echo '<li' . ' class="'.$crumb['class'].'"'.'><i></i>';
    else
       echo '<li>';

    if(isset($crumb[1])) {
        echo CHtml::link($crumb[0], $crumb[1]);
    }
    else
    {
        echo $crumb[0];
    }

    echo '</li>';

    if(sizeof($this->crumbs) > ($k+1))
    {
        echo $this->divider;
    }
}


echo '</ul>';

?>