
$(document).ready(function () {

'use strict';
$(".se-pre-con").fadeOut("slow");
    //sticky navbar
    var $header = $('nav');
    $(window).scroll(function () {
        var scroll = $(this).scrollTop();
        if (scroll >= 40) {
            $header.addClass('navbar-fixed-top');
            $('body').addClass('add-nav-padding');
        }
        else {
            $header.removeClass('navbar-fixed-top');
            $('body').removeClass('add-nav-padding');
        }
    });

    //owl carousel
    var owl = $("#owl-slider");
    owl.owlCarousel({
       autoPlay: 4000,
        navigation: true,
        pagination: false,
        singleItem: true,
        transitionStyle: "fade",
        navigationText: [
            "<i class='fa fa-arrow-left'></i>",
            "<i class='fa fa-arrow-right'></i>"
        ],
        eforeInit: function (elem) {
            //Parameter elem pointing to $("#owl-demo")
            random(elem);
        }
    });


    //datepicker
    $("#datepicker").datepicker({dateFormat: 'yy-mm-dd'});


    //date picker
    var dateToday = new Date(); 
    $(".datepicker1").datepicker(
    {
        dateFormat: 'yy-mm-dd',
        showMonths: true,
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        minDate: dateToday
    });



    $("#datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        showOtherMonths: true,
        selectOtherMonths: true,
        changeMonth: true,
        changeYear: true
    });


    $(".datepicker3").datepicker(
    {
        dateFormat: 'yy-mm-dd',
        showMonths: true,
        minDate: 0
    });



    //counter
    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    //tab
        $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');

        $('.tab ul.tabs li a').click(function (g) {
            var tab = $(this).closest('.tab'),
                    index = $(this).closest('li').index();

            tab.find('ul.tabs > li').removeClass('current');
            $(this).closest('li').addClass('current');

            tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
            tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();

            g.preventDefault();
        });


});












