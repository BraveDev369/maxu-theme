<?php

if (!defined('ABSPATH')) {
  exit;
}

class LoginHandler
{
  public function __construct()
  {
    add_action('admin_post_maxu_login', [$this, 'handle']);
    add_action('admin_post_nopriv_maxu_login', [$this, 'handle']);
  }

  public function handle()
  {
    check_admin_referer('maxu_login', 'maxu_login_nonce');

    $username = sanitize_user($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $errors = [];

    if (empty($username)) {
      $errors['username'] = 'نام کاربری یا ایمیل را وارد کنید.';
    }

    if (empty($password)) {
      $errors['password'] = 'رمز عبور را وارد کنید.';
    }

    if (!empty($errors)) {

      $data = [
        'errors' => $errors,
        'old' => [
          'username' => $username,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'login' => urlencode(
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

    $credentials = [
      'user_login'    => $username,
      'user_password' => $password,
      'remember'      => true,
    ];

    $user = wp_signon($credentials, is_ssl());

    if (is_wp_error($user)) {

      $data = [
        'errors' => [
          'password' => 'نام کاربری یا رمز عبور اشتباه است.',
        ],
        'old' => [
          'username' => $username,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'login' => urlencode(
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

    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, true);

    wp_safe_redirect(add_query_arg(
      'login',
      'success',
      home_url('/login/')
    ));

    exit;
  }
}

new LoginHandler();
