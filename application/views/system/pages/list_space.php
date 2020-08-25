<div class="ins-search-wrap-3">

    <div class="container">

        <div class="hm-search-form space-height-1">

            <div class="row search-row">

                <div class="col-md-12 col-sm-12 col-xs-12 search-padd list-space text-center" >

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 list-space text-center wow lightSpeedIn animated" data-wow-delay="0.5s" data-wow-duration="1500ms">
                    <div class="left-sd">
                        <h2 class="text-center mt-50">Become a Space host</h2>
                        <a href="" data-toggle="modal" data-target="#signupModal" class="login btn btn-danger btn-raised btn-lg">
                            Sign Up
                            <div class="ripple-container"></div>
                        </a>
                    </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 list-space text-center wow lightSpeedIn animated" data-wow-delay="0.5s" data-wow-duration="1500ms">
                    <div class="right-sd">
                        <h2 class="text-center mt-50  wow fadeIn">Have an account?</h2>
                        <a href="" data-toggle="modal" data-target="#loginModal" class="login btn btn-danger btn-raised btn-lg">
                            Login
                            <div class="ripple-container"></div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>


<section class="services-section">
    <div class="auto-container">
        <div class="inner-container">
            <div class="row clearfix">

                <!--Services Block-->
                <div class="services-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <h3><a href="business-consult.html">Sign Up</a></h3>
                        <div class="icon-box">
                            <i class="fa fa-sign-in"></i>
                        </div>
                        <div class="text">Create a listing that showcases your space. Write a description, upload photos, and choose your own pricing.<br>&nbsp;</div>
                        <div class="more-link"><a class="read-more" href="business-consult.html"><span class="arrow fa fa-angle-right"></span> Start My Listing</a></div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                        <h3><a href="business-consult.html">Connect & Manage</a></h3>
                        <div class="icon-box">
                            <i class="fa fa-signal"></i>
                        </div>
                        <div class="text">Start receiving inquiries and managing leads from people & brands looking to host events in spaces like yours. We have the tools to help you stay organized.</div>
                        <div class="more-link"><a class="read-more" href="business-consult.html"><span class="arrow fa fa-angle-right"></span> Start My Listing</a></div>
                    </div>
                </div>

                <!--Services Block-->
                <div class="services-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                        <h3><a href="business-consult.html">Begin Hosting</a></h3>
                        <div class="icon-box">
                            <i class="fa fa-braille"></i>
                        </div>
                        <div class="text">Host on your own terms. Whether it’s a cocktail party, pop-up shop, or photo shoot, you choose what type of events will happen in your space.</div>
                        <div class="more-link"><a class="read-more" href="business-consult.html"><span class="arrow fa fa-angle-right"></span> Start My Listing</a></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="space-title-3 text-center">What We Do, & Why</h2>
                <h5 class="space-txt-2 text-center">MillionSpaces is an online marketplace where people can list, discover and book unique spaces. We believe we can improve the way we use and share space in order to foster creativity, build community and promote a more sustainable model of urban life. Our marketplace gives access to undiscovered and underutilized spaces, offering extraordinary arenas for events, experiences and activations of all shapes and sizes.</h5>
            </div>
        </div>


    </div>
</section>




<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
<script>
    var ml4 = {};
    ml4.opacityIn = [0,1];
    ml4.scaleIn = [0.2, 1];
    ml4.scaleOut = 3;
    ml4.durationIn = 800;
    ml4.durationOut = 600;
    ml4.delay = 500;

    anime.timeline({loop: true})
        .add({
            targets: '.ml4 .letters-1',
            opacity: ml4.opacityIn,
            scale: ml4.scaleIn,
            duration: ml4.durationIn
        }).add({
        targets: '.ml4 .letters-1',
        opacity: 0,
        scale: ml4.scaleOut,
        duration: ml4.durationOut,
        easing: "easeInExpo",
        delay: ml4.delay
    }).add({
        targets: '.ml4 .letters-2',
        opacity: ml4.opacityIn,
        scale: ml4.scaleIn,
        duration: ml4.durationIn
    }).add({
        targets: '.ml4 .letters-2',
        opacity: 0,
        scale: ml4.scaleOut,
        duration: ml4.durationOut,
        easing: "easeInExpo",
        delay: ml4.delay
    }).add({
        targets: '.ml4 .letters-3',
        opacity: ml4.opacityIn,
        scale: ml4.scaleIn,
        duration: ml4.durationIn
    }).add({
        targets: '.ml4 .letters-3',
        opacity: 0,
        scale: ml4.scaleOut,
        duration: ml4.durationOut,
        easing: "easeInExpo",
        delay: ml4.delay
    }).add({
        targets: '.ml4',
        opacity: 0,
        duration: 500,
        delay: 500
    });
</script>

<script>
    $("figure").mouseleave(
        function() {
            $(this).removeClass("hover");
        }
    );
</script>