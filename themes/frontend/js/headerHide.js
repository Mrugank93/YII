/**
 * Created with JetBrains PhpStorm.
 * User: sajib
 * Date: 4/24/13
 * Time: 10:33 AM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {

$('.navbar navbar-fixed-top scroll').hover(function()
{
    alert('E');

    $('#header').fadeIn(300);

}, function()
{
    $('#header').fadeOut(300);
});

});