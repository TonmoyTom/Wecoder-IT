"use strict";

$(document).ready(function(){
  
var $a = $(".tabs li");
$a.click(function() {
    $a.removeClass("active");
    $(this).addClass("active");
});





// //   $('.btn_body').click(function(e){
// //   	 var menuItem = $( e.currentTarget );
// //  	 //  $('.btn_body').find('i').removeClass('fas fa-plus');
// // 	  // $('.btn_body').find('i').addClass('fas fa-minus');
// // 	  // $(this).find('i').removeClass('fas fa-minus');
// // 	  // $(this).find('i').addClass('fas fa-plus');

// // 	  if($(".btn_body").attr("aria-expanded") == "true"){
// // 	  	$(this).find('i').toggleClass('fas fa-plus fas fa-minus');
// //       if ($(".btn_body").not(this).find("i").hasClass("fas fa-plus")) {
// //           $(".btn_body").not(this).find("i").toggleClass('fas fa-minus fas fa-plus');
// //       }
// // 	  }
	  
// // });

// //  var intvl = setInterval(function() {
// //      if ($("#dropdownMenu1").attr("aria-expanded") == "true") {
// // 			$("#change-this").children(".fa-stack-1x").removeClass("fa-plus").addClass("fa-minus")	
// //         } else {
// //    			$("#change-this").children(".fa-stack-1x").removeClass("fa-minus").addClass("fa-plus")	   
// //         }
// // },10);

});

$(document).ready(function(){
	$('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
		$(this).toggleClass('open');
	});


	// Tab slider js
  $('.tab-contents').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows:true,
    autoplaySpeed: 3000,
    speed:2000,
    nextArrow: '<i class="fas fa-chevron-right arrows_right"></i>',
    prevArrow: '<i class="fas fa-chevron-left arrows_left"></i>',

});

$('.leader-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows:true,
    autoplaySpeed: 3000,
    fade:true,
    speed:2000,
});


$(".back2").click(function() {
    $('html, body').animate({
        scrollTop: 0,
    }, 1000);
});


 // //animation scroll js
 //  $(".click").click(function() {
 //      $('html, body').animate({
 //          scrollTop: $("#myDiv").offset().top
 //      }, 500);
 //  });


$(window).on('scroll', function(){
var scrolling = $(this).scrollTop();
if(scrolling > 500){
  $('.back2').addClass('arrow');
  $('.arrow').fadeIn(500);
}
else if(scrolling > 200){
  $('.arrow').fadeOut(500);
}
if(scrolling > 163){
  $('.navigationwarp').addClass('fixed-menu');
}
else{
  $('.navigationwarp').removeClass('fixed-menu');
}
});



$('select[name="category_id"]').on('change', function(){
  var category_id = $(this).val();
  if(category_id) {
      $.ajax({
          url: "/subcat/"+category_id,
          type:"GET",
          dataType:"json",
          success:function(data) {
             var d =$('select[name="subcategory_id"]').empty();
                $.each(data, function(key, value){

                    $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>');

                });

          },
         
      });
  } else {
      alert('danger');
  }

});










});

