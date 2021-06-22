(function ($) {
  var buttonItems = kemetMobileButtonData.mobileButtonItems;

  $.each(buttonItems, function (index, button) {
    kemet_button_css(button);
  });
})(jQuery);
