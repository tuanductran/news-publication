jQuery(document).ready(function ($) {
  jQuery(document).on('click', '.npub-acc-head', function (e) {
    e.preventDefault()
    jQuery(this)
      .parents('.npub-acc')
      .toggleClass('acc-active')
      .siblings()
      .removeClass('acc-active')
  })
})
