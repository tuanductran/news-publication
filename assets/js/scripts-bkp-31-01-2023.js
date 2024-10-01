$ = jQuery;
// Header collapse styling
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200 ) {
   // document.getElementsByClassName('collapsible-header')[0].style.opacity = "1";
 

  } else if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200 ) {
   // document.getElementsByClassName('collapsible-header')[0].style.opacity = "0";
  } else {
    //document.getElementsByClassName('collapsible-header')[0].style.opacity = "0";


  }
}

$(function() {
  //caches a jQuery object containing the header element
  var header = $("#expanded-header");
  $(window).scroll(function() {
      var scroll = $(window).scrollTop();
      if (scroll >= 100) {
        //  header.addClass("sticky-header");
      } else {
      //    header.removeClass("sticky-header");
      }
  });
});

//Animate X icon
// const icons = document.querySelectorAll('.icon');
// icons.forEach (icon => {  
//   icon.addEventListener('click', (event) => {
//     icon.classList.toggle("open");
//   });
// });

//Toggle mobile menu overlay
function toggle_visibility(overlay) {
  elements = document.getElementsByClassName('overlay');
  document.body.classList.toggle("mobile_nav_visiable");
  for (var i = 0; i < elements.length; i++) {
      elements[i].style.display = elements[i].style.display == 'block' ? 'none' : 'block';
      // document.body.style.overflowY =  document.body.style.overflowY == 'hidden' ? 'scroll' : 'hidden';
  }
}

$(document).ready(function(){
    $('.navigation-mobile-overlay li.menu-item-has-children').each(function () {
      $(this).append('<span class=\'toggle_arrow\'></span>');
    });
  $(document).on("click",".toggle_arrow",function() {
    $(this).parents('.menu-item-has-children').toggleClass('sub_menu_open');
    $(this).parents('.menu-item-has-children').find('.sub-menu').slideToggle();
  });
});

$(window).on('scroll', function () {
  var scrollPos = $(window).scrollTop()
  var winHeight = $(window).height()
  var docHeight = $(document).height()
  var perc = 100 * scrollPos / (docHeight - winHeight)
  $('#indicator').width(perc + '%')
})

/***scroll navebar***/      
// $(window).scroll(function(){
//   var sticky = $('.nav-top , .center-header'),
// 	  scroll = $(window).scrollTop();

//   if (scroll >= 100) sticky.addClass('fixed');
//   else sticky.removeClass('fixed');
// });
// 
// 
var sticky = $('.nav-top').offset().top;
jQuery( window ).scroll(function() {
  var scroll = $(window).scrollTop();
  var stickyd = $('.nav-top , .center-header');
  if (scroll >= sticky ) {
    stickyd.addClass('fixed animated fadeInDown');
  }else{
    stickyd.removeClass('fixed animated fadeInDown');
  }
}); 