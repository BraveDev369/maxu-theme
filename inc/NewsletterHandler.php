<?php

if (!defined('ABSPATH')) {
  exit;
}

class NewsletterHandler
{
  private NewsletterRepository $repository;

  public function __construct()
  {
    $this->repository = new NewsletterRepository();

    add_action('admin_post_maxu_newsletter', [$this, 'handle']);
    add_action('admin_post_nopriv_maxu_newsletter', [$this, 'handle']);
  }

  public function handle()
  {
    check_admin_referer('maxu_newsletter', 'maxu_newsletter_nonce');

    $email = sanitize_email($_POST['email'] ?? '');

    $errors = [];

    if (empty($email)) {

      $errors['email'] = 'ایمیل را وارد کنید.';
    } elseif (!is_email($email)) {

      $errors['email'] = 'ایمیل معتبر نیست.';
    } elseif ($this->repository->exists($email)) {

      $errors['email'] = 'این ایمیل قبلاً عضو خبرنامه شده است.';
    }

    if (!empty($errors)) {

      $data = [
        'errors' => $errors,
        'old' => [
          'email' => $email,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'newsletter' => urlencode(
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

    $created = $this->repository->create($email);

    if (!$created) {

      $data = [
        'errors' => [
          'email' => 'خطایی در عضویت خبرنامه رخ داد.',
        ],
        'old' => [
          'email' => $email,
        ]
      ];

      wp_safe_redirect(
        add_query_arg(
          [
            'newsletter' => urlencode(
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

    wp_safe_redirect(
      add_query_arg(
        [
          'newsletter' => 'success',
        ],
        wp_get_referer()
      )
    );

    exit;
  }
}

new NewsletterHandler();
