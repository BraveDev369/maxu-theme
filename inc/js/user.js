jQuery(function ($) {
  $(".header-user-toggle").on("click", function (e) {
    e.preventDefault();

    $(".header-user-dropdown").stop(true, true).slideToggle(200);
  });

  $(document).on("click", function (e) {
    if (!$(e.target).closest(".header-user").length) {
      $(".header-user-dropdown").slideUp(200);
    }
  });
});
