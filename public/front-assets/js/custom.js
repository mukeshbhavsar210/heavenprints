$(document).ready(function(){
    $("#payment_cod").click(function(){
        if ($(this).is(":checked") == true){
            $("#cod-form").removeClass('d-none');
            $("#razorpay-form").addClass('d-none');
        }
    });

    $("#payment_razorpay").click(function(){
        if ($(this).is(":checked") == true){
            $("#cod-form").addClass('d-none');
            $("#razorpay-form").removeClass('d-none');
        }
    });

    $("#neonBtn").click(function(){
        if ($(this).is(":checked") == true){
            $("#neon-form").removeClass('d-none');
            $("#floro-form").addClass('d-none');
            $("#neon-body").removeClass('d-none');            
        }
    });

    $("#floroBtn").click(function(){
        if ($(this).is(":checked") == true){
            $("#neon-form").addClass('d-none');
            $("#floro-form").removeClass('d-none');
            $("#neon-body").addClass('d-none');            
        }
    });

    //Sticky header
    // const header = document.querySelector(".page-header");
    // const toggleClass = "is-sticky";

    // window.addEventListener("scroll", () => {
    //     const currentScroll = window.pageYOffset;
    //     if (currentScroll > 100) {
    //         header.classList.add(toggleClass);
    //     } else {
    //         header.classList.remove(toggleClass);
    //     }
    // });


    $(".product input").on("change", function() {
        $(".product").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".size input").on("change", function() {
        $(".size").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".wrap_01 input").on("change", function() {
        $(".wrap_01").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".wrap_02 input").on("change", function() {
        $(".wrap_02").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".wrap_03 input").on("change", function() {
        $(".wrap_03").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".hardware_style input").on("change", function() {
        $(".hardware_style").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".hardware_display input").on("change", function() {
        $(".hardware_display").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".hardware_finishing input").on("change", function() {
        $(".hardware_finishing").removeClass("active");
        $(this).parent().addClass("active");
    });

    $(".lamination input").on("change", function() {
        $(".lamination").removeClass("active");
        $(this).parent().addClass("active");
    });

   

//back to top 
 var $backToTop = $(".back-to-top");
  $backToTop.hide();

  $(window).on('scroll', function() {
      if ($(this).scrollTop() > 100) {
          $backToTop.fadeIn();
      } else {
          $backToTop.fadeOut();
      }
  });

  $backToTop.on('click', function(e) {
      $("html, body").animate({scrollTop: 0}, 500);
  });
  //back to top end



    var lazyLoadInstance = new LazyLoad({elements_selector:"img.lazy, video.lazy, div.lazy, section.lazy, header.lazy, footer.lazy,iframe.lazy"});
    let bannerHeight = $(window).height();
    $("#related-products").not('.slick-initialized').slick({
        centerMode: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        prevArrow:'<i class="icon-left-arrow right-arrow arrow"></i>',
        nextArrow:'<i class="icon-right-arrow left-arrow arrow"></i>',
        responsive: [{
            breakpoint: 1200,
            settings: {
                centerMode: false,
                centerPadding: '0px',
                slidesToShow: 5,
                slidesToScroll: 1,
                
            }
        },{
            breakpoint: 1300,
            settings: {
                 centerMode: false,
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 1200,
            settings: {
                 centerMode: false,
                slidesToShow: 3,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 1024,
            settings: {
                 centerMode: false,
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 992,
            settings: {
                 centerMode: false,
                slidesToShow: 2,
                slidesToScroll: 1,
            }
        },{
            breakpoint: 576,
            settings: {
                 centerMode: false,
                slidesToShow: 1,
                slidesToScroll: 1,      
            }
        }]     
    });
});


$('.btnNext').click(function(){
    $('.nav-tabs > .active').next('li').find('a').trigger('click');
  });
  
    $('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');
  });

$("#isShippingDiffernt").click(function(){
    if ($(this).is(':checked') == true) {
        $("#shippingForm").removeClass('d-none');
    } else {
        $("#shippingForm").addClass('d-none');
    }
});