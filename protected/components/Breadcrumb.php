<?php
/**
 * Created by JetBrains PhpStorm.
 * User: sajib
 * Date: 3/22/13
 * Time: 2:34 AM
 * To change this template use File | Settings | File Templates.
 */
class BreadCrumb extends CWidget
{
    public $crumbs = array();
    public $divider = ' / ';
    public $homeLink = array('Home' => true);
    public $htmlOptions = array();

    public function run()
    {
        $this->render('breadcrumb');
    }
}