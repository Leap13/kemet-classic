(function ($) {
  var menuItems = kemetMenuData.menuItems;

  $.each(menuItems, function (index, menu) {
    kemet_menu_css(menu);
  });
})(jQuery);
