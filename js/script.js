jQuery(document).ready(function($) {
    $("#owl-demo").owlCarousel({
    autoHeight : true,
    autoplay:true,
    autoplayTimeout:3000,
    dots:false,
    pagination:false,
    dotEach:false,
    autoplayHoverPause: true,
    loop:true,
    controlsClass:"owl-controls",
    transitionStyle:"fade",
    responsive:{
        0:{
            items:1,
      
        },
        600:{
            items:1,
    
        },
        1000:{
            items:1,
          
        }
    }
  });
    $('#page-2').fadeIn(2000);
    $('#heading-2').addClass("activer");

$(".slider_contents").load(function(){
    
});
    // $(".heading").click(function(){
    //     $(".heading").removeClass("activer");
    //     $(".drop-page").slideUp();
    //     var idd = $(this).attr('id');
    //     idd = idd.split('-');
    //     var id = idd[1];
    //     if (!$('#page-' + id).is(":visible")) {
    //         $('#page-' + id).fadeIn(1000);

    //         $('#heading-'+id).addClass("activer");
    //     }
    // });

    $(".heading").click(function(){
        var idd = $(this).attr('id');
        idd = idd.split('-');
        var id = idd[1];
        if($('#page-'+id).is(":visible")){
            //do nothing
        }else{
            $(".drop-page").slideUp();
            $(".heading").removeClass("activer");
            $('#page-' + id).fadeIn(1000);
            $('#heading-'+id).addClass("activer");
        }

    });

    var wow = new WOW(
  {
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true,       // act on asynchronously loaded content (default is true)
    callback:     function(box) {
      // the callback is fired every time an animation is started
      // the argument that is passed in is the DOM node being animated
    },
    scrollContainer: null // optional scroll container selector, otherwise use window
  }
);
wow.init();
});