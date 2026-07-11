console.log("register js loaded");

jQuery(function ($) {
  $(".js-register-form").on("submit", function (e) {
    $(".register-error").remove();

    let hasError = false;

    const username = $.trim($(".js-register-username").val());
    const email = $.trim($(".js-register-email").val());
    const password = $.trim($(".js-register-password").val());
    const confirmPassword = $.trim($(".js-register-confirm-password").val());

    function showError($input, message) {
      $input.after(
        '<small class="text-red register-error">' + message + "</small>",
      );

      hasError = true;
    }

    if (username === "") {
      showError($(".js-register-username"), "نام کاربری را وارد کنید.");
    }

    if (email === "") {
      showError($(".js-register-email"), "ایمیل را وارد کنید.");
    } else {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!emailRegex.test(email)) {
        showError($(".js-register-email"), "ایمیل معتبر نیست.");
      }
    }

    if (password === "") {
      showError($(".js-register-password"), "رمز عبور را وارد کنید.");
    } else if (password.length < 8) {
      showError(
        $(".js-register-password"),
        "رمز عبور باید حداقل ۸ کاراکتر باشد.",
      );
    }

    if (confirmPassword === "") {
      showError(
        $(".js-register-confirm-password"),
        "تکرار رمز عبور را وارد کنید.",
      );
    } else if (password !== confirmPassword) {
      showError(
        $(".js-register-confirm-password"),
        "رمز عبور و تکرار آن یکسان نیست.",
      );
    }

    if (hasError) {
      e.preventDefault();
    }
  });
});
