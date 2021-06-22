(function ($) {
  var buttonItems = kemetButtonData.buttonItems;

  $.each(buttonItems, function (index, button) {
    kemet_button_css(button);
  });
})(jQuery);
