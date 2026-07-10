<?php

// save phone number for comments 
add_action('comment_post', 'maxu_save_comment_meta');

function maxu_save_comment_meta($comment_id)
{
  // شماره تلفن
  if (isset($_POST['phone'])) {
    update_comment_meta(
      $comment_id,
      'phone',
      sanitize_text_field($_POST['phone'])
    );
  }

  // امتیاز
  if (isset($_POST['rating'])) {
    $rating = absint($_POST['rating']);

    if ($rating >= 1 && $rating <= 5) {
      update_comment_meta(
        $comment_id,
        'rating',
        $rating
      );
    }
  }
}

// show phone number and ratin in comment panel
add_filter('manage_edit-comments_columns', 'maxu_comment_columns');

function maxu_comment_columns($columns)
{
  $columns['phone'] = 'شماره تلفن';
  $columns['rating'] = 'امتیاز';

  return $columns;
}


add_action('manage_comments_custom_column', 'maxu_comment_column_content', 10, 2);

function maxu_comment_column_content($column, $comment_ID)
{
  if ($column === 'phone') {

    echo esc_html(
      get_comment_meta($comment_ID, 'phone', true)
    );
  }

  if ($column === 'rating') {

    $rating = get_comment_meta($comment_ID, 'rating', true);

    if ($rating) {
      echo str_repeat('⭐', $rating);
    } else {
      echo '-';
    }
  }
}


add_action('add_meta_boxes_comment', 'maxu_comment_meta_box');

function maxu_comment_meta_box()
{
  add_meta_box(
    'maxu-comment-meta',
    'اطلاعات تکمیلی',
    'maxu_comment_meta_callback',
    'comment',
    'normal'
  );
}

function maxu_comment_meta_callback($comment)
{
  $phone  = get_comment_meta($comment->comment_ID, 'phone', true);
  $rating = get_comment_meta($comment->comment_ID, 'rating', true);

?>

  <p>
    <strong>شماره تلفن:</strong>
    <?= esc_html($phone ?: '-'); ?>
  </p>

  <p>
    <strong>امتیاز:</strong>
    <?= $rating ? str_repeat('⭐', $rating) : '-'; ?>
  </p>

<?php
}



