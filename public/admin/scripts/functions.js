jQuery(document).ready(function($) {

	// 'use strict';

  //***************************
    // Url base class add
    //***************************

    var url = window.location.href;
    var target = jQuery('a[href="'+url+'"]');
    target.addClass('mm-active');

    $('.mm-active').parents('ul').addClass('mm-show');
    $('.mm-show').parents('li').addClass('mm-active');


    // end


  //***************************
    // BannerOne Functions
    //***************************
    jQuery('.img-slider-wrap').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        fade: true,
        dots: false,
        asNavFor: '.mini-slider-wrap'
    });
    jQuery('.mini-slider-wrap').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        asNavFor: '.img-slider-wrap',
        dots: false,
        arrows: false,
        fade: false,
        vertical: false,
        centerMode: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    infinite: true,
                    vertical: false,
                }
            },
            {
                breakpoint: 800,
                    settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    vertical: false,
                }
            },
            {
                breakpoint: 400,
                    settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    vertical: false,
                }
            }
        ],
    });

    $(document).on('click','.fa-times',function () {
        var field= $(this).siblings('input');
        // console.log(id);
        field.val('');
    });

    // input calander Function
    //***************************
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.dp1').datepicker({
        onRender: function(date) {
            // return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    });


});




