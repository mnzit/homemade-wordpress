jQuery(document).ready(function($) {
    $("#owl-demo").owlCarousel({
    autoPlay : true,
    stopOnHover : false,
    goToFirstSpeed : 1000,
    autoHeight : true,
    dots:false;
    pagination:false;
    dotEach:false;
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
    $(".heading").click(function(){
        $(".drop-page").slideUp();
        var idd = $(this).attr('id');
        idd = idd.split('-');
        var id = idd[1];
        if (!$('#page-' + id).is(":visible")) {
            $('#page-' + id).slideDown();
        }
    });

});