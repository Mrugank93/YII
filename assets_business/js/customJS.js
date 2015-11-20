/**
 * Created with JetBrains PhpStorm.
 * User: sajib
 * Date: 4/16/13
 * Time: 2:03 AM
 * To change this template use File | Settings | File Templates.
 */

$(document).ready(function() {



    $('.banner').hover(function()
    {

        $(this).stop().animate({opacity: "0.6"}, 500, function(){

            $('.show_on_hover_header').fadeIn(200, function(){
                $('#uploadFile').fadeIn(100);
            });

        } );

    }, function()
    {
        $(this).stop().animate({opacity: "1"}, 'slow');
        $('.show_on_hover_header').fadeOut(300);
    });

    $('#section1').hover(function()
    {
        $('.show_on_hover_section1').fadeIn(500);
    }, function()
    {
        $('.show_on_hover_section1').fadeOut(300);
    });

    $('#section2').hover(function()
    {
        $('.show_on_hover_section2').fadeIn(500);
    }, function()
    {
        $('.show_on_hover_section2').fadeOut(300);
    });


    $('#section3').hover(function()
    {
        $('.show_on_hover_section3').fadeIn(500);
    }, function()
    {
        $('.show_on_hover_section3').fadeOut(300);
    });


    $('.span5').hover(function()
    {
        $('.show_on_hover_hours').fadeIn(500);
    }, function()
    {
        $('.show_on_hover_hours').fadeOut(300);
    });


    $('.show_on_hover_header').hide();
    $('.show_on_hover_hours').hide();
    $('.show_on_hover_section1').hide();
    $('.show_on_hover_section2').hide();
    $('.show_on_hover_section3').hide();
    $('#uploadFile').hide();


    var options2 = {
        'maxCharacterSize': 400,
        'originalStyle': 'originalTextareaInfo',
        'warningStyle' : 'warningTextareaInfo',
        'warningNumber': 40,
        'displayFormat' : '#left Characters Left / #max | #words words'
    };

    $('#modelSectionContent1').textareaCount(options2);

    $('#modelSectionContent2').textareaCount(options2);

    $('#modelSectionContent3').textareaCount(options2);




    $('form[data-async-section1]').live('submit', function(event)
    {
        var $form = $(this);
        var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                $target.html(data);
                $('#section1 h2').text($('#modelSectionTitle1').val());
                $('#section1 p').text($('#modelSectionContent1').val());
                $('#ModelSection1').modal('hide');

            }
        });

        event.preventDefault();
    });


    $('form[data-async-section2]').live('submit', function(event)
    {
        var $form = $(this);
        var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                $target.html(data);
                $('#section2 h2').text($('#modelSectionTitle2').val());
                $('#section2 p').text($('#modelSectionContent2').val());
                $('#ModelSection2').modal('hide');

            }
        });

        event.preventDefault();
    });

    $('form[data-async-section3]').live('submit', function(event)
    {
        var $form = $(this);
        var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                $target.html(data);
                $('#section3 h2').text($('#modelSectionTitle3').val());
                $('#section3 p').text($('#modelSectionContent3').val());
                $('#ModelSection3').modal('hide');

            }
        });

        event.preventDefault();
    });



    $('form[data-async-hours]').live('submit', function(event) {
        var $form = $(this);
        var $target = $($form.attr('data-target'));

        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),

            success: function(data, status) {
                $target.html(data);
                $('#hours p.hours').html("<b>Business Hours:</b> "+$('#modelHours').val());
                $('#ModelHours').modal('hide');


            }
        });

        event.preventDefault();
    });

    //$('#headerImage').adipoli();

    $('#loadingDivSection1').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
    } ).ajaxStop ( function(){
        $(this).hide(); // hide loading div
    });

    $('#loadingDivSection2').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
    } ).ajaxStop ( function(){
        $(this).hide(); // hide loading div
    });
    $('#loadingDivSection3').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
    } ).ajaxStop ( function(){
        $(this).hide(); // hide loading div
    });
    $('#loadingDivHours').hide().ajaxStart( function() {
        $(this).show();  // show Loading Div
    } ).ajaxStop ( function(){
        $(this).hide(); // hide loading div
    });


});