jQuery(function ($) {
  const $form = $(".contact-form");

  if (!$form.length) return;

  $form.on("submit", function (e) {
    let valid = true;

    $form.find(".error-message").text("");

    //--------------------------------

    const $name = $form.find(".js-name");
    const name = $name.val().trim();

    if (name === "") {
      $name.next(".error-message").text("نام الزامی است.");
      valid = false;
    }

    //--------------------------------

    const $email = $form.find(".js-email");
    const email = $email.val().trim();

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (email === "") {
      $email.next(".error-message").text("ایمیل الزامی است.");
      valid = false;
    } else if (!emailRegex.test(email)) {
      $email.next(".error-message").text("ایمیل معتبر نیست.");
      valid = false;
    }

    //--------------------------------

    const $phone = $form.find(".js-phone");
    const phone = $phone.val().trim();

    if (phone !== "") {
      if (!/^09\d{9}$/.test(phone)) {
        $phone.next(".error-message").text("شماره تماس معتبر نیست.");
        valid = false;
      }
    }

    //--------------------------------

    const $website = $form.find(".js-website");
    const website = $website.val().trim();

    if (website !== "") {
      try {
        new URL(website);
      } catch {
        $website.next(".error-message").text("آدرس وب‌سایت معتبر نیست.");
        valid = false;
      }
    }

    //--------------------------------

    const $message = $form.find(".js-message");
    const message = $message.val().trim();

    if (message.length < 10) {
      $message.next(".error-message").text("پیام باید حداقل ۱۰ کاراکتر باشد.");
      valid = false;
    }

    //--------------------------------

    if (!valid) {
      e.preventDefault();
    }
  });
});
