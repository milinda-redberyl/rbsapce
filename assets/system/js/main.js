$(document).ready(function () {





    $('#carousel-property').owlCarousel({

        loop: true,

        nav: true,

        autoplay: false,

        autoplayHoverPause: true,

        autoplayTimeout: 3000,

        dots: false,

        margin: 20,

        lazyLoad: true,

        navText: '',

        responsive: {

            0: {

                items: 1

            },

            550: {

                items: 1

            },

            650: {

                items: 2

            },

            768: {

                items: 2

            },

            992: {

                items: 3

            },

            1200: {

                items: 3

            },

        }

    });



    $('#carousel-meeting-spaces').owlCarousel({

        loop: true,
        nav: true,
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 3000,
        dots: false,
        margin: 10,
        lazyLoad: true,
        navText: '',

        responsive: {
            0: {
                items: 1
            },
            550: {
                items: 1
            },
            650: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 4
            },
            1200: {
                items: 4
            },
        }
    });



    $('#carousel-builder').owlCarousel({

        loop: true,

        nav: false,

        autoplay: false,

        autoplayHoverPause: true,

        autoplayTimeout: 3000,

        dots: false,

        margin: 10,

        lazyLoad: true,

        navText: '',

        responsive: {

            0: {

                items: 1

            },

            350: {

                items: 2

            },

            650: {

                items: 3

            },

            768: {

                items: 4

            },

            992: {

                items: 5

            },

            1200: {

                items: 6

            },

        }

    });





    $('.carousel-business').owlCarousel({

        loop: true,

        nav: false,

        autoplay: true,

        autoplayTimeout: 3000,

        dots: true,

        lazyLoad: true,

        items: 1

    });





    $('.carousel-press').owlCarousel({

        loop: true,

        nav: false,

        autoplay: true,

        dots: false,

        lazyLoad: true,

        navText: '',

        items: 1,

        animateOut: 'slideOutUp',

        animateIn: 'slideInUp'

    });



    $('.carousel-press-img').owlCarousel({

        loop: true,

        nav: false,

        autoplay: true,

        dots: false,

        lazyLoad: true,

        navText: '',

        items: 1,

    });





    // menu scroll

    (function ($) {



        /*$(".mission-scroll").mCustomScrollbar({

            scrollButtons: {enable: false},

            theme: "light-thick",

            scrollbarPosition: "outside",

            mouseWheelPixels: 150 //change this to a value, that fits your needs

        });*/





        /*$(".map-ppt-scroll").mCustomScrollbar({

            scrollButtons: {enable: false},

            theme: "light-thick",

            scrollbarPosition: "outside",

            mouseWheelPixels: 150 //change this to a value, that fits your needs

        });*/





    })(jQuery);





    // parallax --------------



    $(function () {

        //parallaxInit('.parallax')

    });





// ende document ready

});





// banner animation

/* Demo Scripts for Bootstrap Carousel and Animate.css article

 * on SitePoint by Maria Antonietta Perna

 */

(function ($) {



    //Function to animate slider captions

    function doAnimations(elems) {

        //Cache the animationend event in a variable

        var animEndEv = 'webkitAnimationEnd animationend';



        elems.each(function () {

            var $this = $(this),

                $animationType = $this.data('animation');

            $this.addClass($animationType).one(animEndEv, function () {

                $this.removeClass($animationType);

            });

        });

    }



    //Variables on page load

    var $myCarousel = $('#carousel-banner'),

        $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");



    //Initialize carousel

    $myCarousel.carousel();



    //Animate captions in first slide on page load

    doAnimations($firstAnimatingElems);



    //Pause carousel

    $myCarousel.carousel('pause');





    //Other slides to be animated on carousel slide event

    $myCarousel.on('slide.bs.carousel', function (e) {

        var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");

        doAnimations($animatingElems);

    });



})(jQuery);









    

