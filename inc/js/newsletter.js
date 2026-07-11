console.log("newsletter");
jQuery(function ($) {
  const $form = $(".newsletter-form");

  if (!$form.length) {
    return;
  }

  $form.on("submit", function (e) {
    const $email = $form.find(".js-newsletter-email");
    const email = $.trim($email.val());

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    $form.find(".nl-error-message").text("");

    if (email === "") {
      $("#nl-error-message").text("لطفاً ایمیل خود را وارد کنید.");

      e.preventDefault();
      return;
    }

    if (!emailRegex.test(email)) {
      $("#nl-error-message").text("ایمیل وارد شده معتبر نیست.");

      e.preventDefault();
    }
  });
});

console.log("newsletter");
jQuery(function ($) {
  const $form = $(".footer-newsletter-form");

  if (!$form.length) {
    return;
  }

  $form.on("submit", function (e) {
    const $email = $form.find(".js-newsletter-email");
    const email = $.trim($email.val());

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    $form.find(".fnl-error-message").text("");

    if (email === "") {
      $email.next(".fnl-error-message").text("لطفاً ایمیل خود را وارد کنید.");

      e.preventDefault();
      return;
    }

    if (!emailRegex.test(email)) {
      $email.next(".fnl-error-message").text("ایمیل وارد شده معتبر نیست.");

      e.preventDefault();
    }
  });
});
