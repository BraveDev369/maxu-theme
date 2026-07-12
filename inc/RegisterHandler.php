<?php

if (!defined('ABSPATH')) {
  exit;
}

class RegisterHandler
{
  public function __construct()
  {
    add_action('admin_post_maxu_register', [$this, 'handle']);
    add_action('admin_post_nopriv_maxu_register', [$this, 'handle']);
  }

  public function handle()
  {
    check_admin_referer('maxu_register', 'maxu_register_nonce');

    $username         = sanitize_user($_POST['username'] ?? '');
    $email            = sanitize_email($_POST['email'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirmPassword  = $_POST['confirm_password'] ?? '';

    $errors = [];

    if (empty($username)) {
      $errors['username'] = 'نام کاربری را وارد کنید.';
    } elseif (username_exists($username)) {
      $errors['username'] = 'این نام کاربری قبلاً ثبت شده است.';
    }

    if (empty($email)) {
      $errors['email'] = 'ایمیل را وارد کنید.';
    } elseif (!is_email($email)) {
      $errors['email'] = 'ایمیل معتبر نیست.';
    } elseif (email_exists($email)) {
      $errors['email'] = 'این ایمیل قبلاً ثبت شده است.';
    }

    if (empty($password)) {
      $errors['password'] = 'رمز عبور را وارد کنید.';
    } elseif (strlen($password) < 8) {
      $errors['password'] = 'رمز عبور باید حداقل ۸ کاراکتر باشد.';
    }

    if (empty($confirmPassword)) {
      $errors['confirm_password'] = 'تکرار رمز عبور را وارد کنید.';
    } elseif ($password !== $confirmPassword) {
      $errors['confirm_password'] = 'رمز عبور و تکرار آن یکسان نیست.';
    }

    if (!empty($errors)) {

      $data = [
        'errors' => $errors,
        'old' => [
          'username' => $username,
          'email'    => $email,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'register' => urlencode(
              base64_encode(
                wp_json_encode($data)
              )
            )
          ],
          wp_get_referer()
        )
      );

      exit;
    }

    $user_id = wp_create_user(
      $username,
      $password,
      $email
    );

    if (is_wp_error($user_id)) {

      $data = [
        'errors' => [
          'general' => $user_id->get_error_message(),
        ],
        'old' => [
          'username' => $username,
          'email'    => $email,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'register' => urlencode(
              base64_encode(
                wp_json_encode($data)
              )
            )
          ],
          wp_get_referer()
        )
      );

      exit;
    }

    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    wp_safe_redirect(add_query_arg(
      'register',
      'success',
      home_url('/register/')
    ));


    exit;
  }
}

new RegisterHandler();
