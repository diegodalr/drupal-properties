(function ($, Drupal) {
  Drupal.behaviors.isobarDev = {
    attach: function (context, settings) {
      // Fetch latest properties to render.
      jQuery.ajax({
        url: "/api/properties/latest",
        method: "GET",
        success: function (data) {
          var elementUl = $("<ul />"), elementLi, elementA, elementImg, blockLatestProperties = $(".home--latest-properties");
          $.each(data, function (key, item) {
            elementLi = $("<li />");
            elementA = $("<a />").attr("href", item.url).attr("title", item.title).html(item.title + "<br />");
            elementImg = $("<img />").attr("src", item.image).attr("alt", item.title);
            elementImg.appendTo(elementA);
            elementA.appendTo(elementLi);
            elementLi.appendTo(elementUl);
          });
          if (!blockLatestProperties.find("ul").length) {
            elementUl.appendTo(blockLatestProperties);
          }
        }
      });
    }
  };
})(jQuery, Drupal);
