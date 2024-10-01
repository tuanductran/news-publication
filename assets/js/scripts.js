$ = jQuery
// Header collapse styling
window.onscroll = function () {
  scrollFunction()
}

function scrollFunction() {
  if (
    document.body.scrollTop > 200 ||
    document.documentElement.scrollTop > 200
  ) {
    // document.getElementsByClassName('collapsible-header')[0].style.opacity = "1";
  } else if (
    document.body.scrollTop > 200 ||
    document.documentElement.scrollTop > 200
  ) {
    // document.getElementsByClassName('collapsible-header')[0].style.opacity = "0";
  } else {
    //document.getElementsByClassName('collapsible-header')[0].style.opacity = "0";
  }
}

$(function () {
  //caches a jQuery object containing the header element
  var header = $('#expanded-header')
  $(window).scroll(function () {
    var scroll = $(window).scrollTop()
    if (scroll >= 100) {
      //  header.addClass("sticky-header");
    } else {
      //    header.removeClass("sticky-header");
    }
  })
})

//Animate X icon
// const icons = document.querySelectorAll('.icon');
// icons.forEach (icon => {
//   icon.addEventListener('click', (event) => {
//     icon.classList.toggle("open");
//   });
// });

//Toggle mobile menu overlay
function toggle_visibility(overlay) {
  elements = document.getElementsByClassName('overlay')
  var root = document.getElementsByTagName('html')[0]
  root.classList.toggle('mobile_nav_visiable')
  document.body.classList.toggle('mobile_nav_visiable')
  for (var i = 0; i < elements.length; i++) {
    elements[i].style.display =
      elements[i].style.display == 'block' ? 'none' : 'block'
    // document.body.style.overflowY =  document.body.style.overflowY == 'hidden' ? 'scroll' : 'hidden';
  }
}

$(document).ready(function () {
  $('.navigation-mobile-overlay li.menu-item-has-children').each(function () {
    $(this).append("<span class='toggle_arrow'></span>")
  })
  $(document).on('click', '.toggle_arrow', function () {
    $(this).parents('.menu-item-has-children').toggleClass('sub_menu_open')
    $(this).parents('.menu-item-has-children').find('.sub-menu').slideToggle()
  })
})

$(window).on('scroll', function () {
  var scrollPos = $(window).scrollTop()
  var winHeight = $(window).height()
  var docHeight = $(document).height()
  var perc = (100 * scrollPos) / (docHeight - winHeight)
  $('#indicator').width(perc + '%')
})

/***scroll navebar***/
var sticky = 0
if (0 < $('.nav-top').length) {
  sticky = $('.nav-top').offset().top
}
jQuery(window).scroll(function () {
  var scroll = $(window).scrollTop()
  var stickyd = $('.nav-top , .center-header')
  if (scroll >= sticky) {
    stickyd.addClass('fixed animated fadeInDown')
    $('body').addClass('body-fixed')
  } else {
    stickyd.removeClass('fixed animated fadeInDown')
    $('body').removeClass('body-fixed')
  }
})

/*** Sidebar Position ***/
$(document).ready(function () {
  if (0 < $('.article-banner-top-title-small').length) {
    sidebar_position()
  }
})
$(window).resize(function () {
  if (0 < $('.article-banner-top-title-small').length) {
    sidebar_position()
  }
})
function sidebar_position() {
  var mt = 0
  if (0 < $('.article-banner-top-title-small .img-div').length) {
    mt = '-' + (sidebarofset - imgofset - 30) + 'px'
    var imgofset = $('.article-banner-top-title-small .img-div').offset().top
    var sidebarofset = $('.article-content-sidebar .article-body').offset().top
  }
  if (1024 < $(window).width()) {
    $(
      '.single-post.article-banner-top-title-small .sticky-side-disabled.sidebar-cont'
    ).css('margin-top', mt)
  } else {
    $(
      '.single-post.article-banner-top-title-small .sticky-side-disabled.sidebar-cont'
    ).removeAttr('style')
  }
}

/*** mega menu padding ***/
$(document).ready(function () {
  if (
    0 < $('.col-lg-1.col-1.mobile-nav-btn.wrapper').length ||
    0 < $('.mobile-nav-btn-expanded.wrapper').length
  ) {
    megamenu_position()
  }
})
$(window).resize(function () {
  if (0 < $('.article-banner-top-title-small').length) {
    megamenu_position()
  }
})
function megamenu_position() {
  var dmpadd = 0
  var dmpadde = 0
  if (1279 < $(window).width()) {
    if (0 < $('.col-lg-1.col-1.mobile-nav-btn.wrapper').length) {
      dmpaddoffset = $('.col-lg-1.col-1.mobile-nav-btn.wrapper').offset().top
      if (0 < $('body.admin-bar').length) {
        dmpadd = dmpaddoffset - 58
      } else {
        dmpadd = dmpaddoffset - 26
      }
      $('body').append(
        '<style>body.mobile_nav_visiable:not(.body-fixed) .mega_menu_wrapper{padding-top: ' +
          dmpadd +
          'px;}</style>'
      )
    }

    if (0 < $('.mobile-nav-btn-expanded.wrapper').length) {
      dmpaddoffsete = $('.mobile-nav-btn-expanded.wrapper').offset().top
      if (0 < $('body.admin-bar').length) {
        dmpadde = dmpaddoffsete - 52
      } else {
        dmpadde = dmpaddoffsete - 20
      }
      $('body').append(
        '<style>body.mobile_nav_visiable:not(.body-fixed) .mega_menu_wrapper{padding-top: ' +
          dmpadde +
          'px;}</style>'
      )
    }
  }
}

/* Check in view */
function isElementInViewport(el, offset) {
  const rect = el.getBoundingClientRect()
  return rect.top <= window.innerHeight - offset && rect.bottom >= offset
}

function handleViewportClass() {
  const elementsToObserve = document.querySelectorAll('.check-in-view')

  elementsToObserve.forEach(element => {
    const offset = parseInt(element.getAttribute('data-offset')) || 100
    if (isElementInViewport(element, offset)) {
      element.classList.add('in-view')
    }
  })
}

handleViewportClass()
window.addEventListener('scroll', handleViewportClass)
