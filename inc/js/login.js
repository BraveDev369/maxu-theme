console.log("login js loaded");

jQuery(function ($) {
  $(".js-login-form").on("submit", function (e) {
    $(".login-error").remove();

    let hasError = false;

    const username = $.trim($(".js-login-username").val());
    const password = $.trim($(".js-login-password").val());

    function showError($input, message) {
      $input.after(
        '<small class="text-red login-error">' + message + "</small>",
      );

      hasError = true;
    }

    if (username === "") {
      showError($(".js-login-username"), "نام کاربری یا ایمیل را وارد کنید.");
    }

    if (password === "") {
      showError($(".js-login-password"), "رمز عبور را وارد کنید.");
    }

    if (hasError) {
      e.preventDefault();
    }
  });
});
