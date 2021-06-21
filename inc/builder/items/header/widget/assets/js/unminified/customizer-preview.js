(function ($) {
  var widgetItems = kemetWidgetData.widgetItems;

  $.each(widgetItems, function (index, widget) {
    kemet_widget_css(widget);
  });
})(jQuery);
