(function ($) {
  var htmlItems = kemetMobileHTMLData.htmlItems;

  $.each(htmlItems, function (index, html) {
    console.log(html);
    kemet_html_css(html);
  });
})(jQuery);
