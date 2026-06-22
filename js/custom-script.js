var $ = jQuery.noConflict();

jQuery(document).ready(function () {
  // current year
  $("current-year").text(new Date().getFullYear());

  // foo toggler

  $(".foo-toggler-item").click(function () {
    $(this).toggleClass("active");

    if ($(this).hasClass("active")) {
      $(this)
        .find(".toggle-icon img")
        .attr("src", "/wp-content/themes/salient-child/images/minus.png");
    } else {
      $(this)
        .find(".toggle-icon img")
        .attr("src", "/wp-content/themes/salient-child/images/plus.png");
    }
  });
});
