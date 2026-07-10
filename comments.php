<?php
if (! defined('ABSPATH')) exit;

$user_avatar    = get_field('user_avatar_image', 'option');
$admin_avatar    = get_field('admin_avatar_image', 'option');

global $post;
$post_id = $post->ID;
$args = array(
	'post_id' => $post_id,
	'status' => 'approve'
);

$comments_query = new WP_Comment_Query();
$comments = $comments_query->query($args);
if ($comments) {
	foreach ($comments as $comment) {
		if ($comment->comment_parent == 0) {
			$rating = get_comment_meta($comment->comment_ID, 'rating', true);
?>
			<div class="single_comment">
				<div class="comment_thumb">
					<?php if ($user_avatar): ?>

						<img src="<?= esc_url($user_avatar); ?>" alt="">

					<?php else: ?>

						<img src="<?= esc_url(get_template_directory_uri() . '/assets/images/default/avatar.jfif'); ?>" alt="">

					<?php endif; ?>
				</div>
				<div class="single_comment_title_text">
					<div class="single_comment_title_text_bg"></div>
					<div class="single_comment_title">
						<h3><?= esc_html($comment->comment_author) ?></h3>
						<p><?= jdate('l j F Y', strtotime($comment->comment_date_gmt)); ?></p>
						<p><?= $rating ? str_repeat('<i class="rating-star-show fa fa-star"></i>', $rating) : '-'; ?></p>
					</div>
					<div class="single_comment_text">
						<p><?= esc_html($comment->comment_content) ?></p>
					</div>
				</div>
			</div>
			<?php
			$args = array(
				'parent' => $comment->comment_ID,
				'status' => 'approve'
			);
			$replies = get_comments($args);
			if ($replies) {
				foreach ($replies as $reply) {
					$rating = get_comment_meta($reply->comment_ID, 'rating', true);

			?>
					<div class="single_comment2">
						<div class="comment_thumb">
							<?php if ($admin_avatar): ?>

								<img src="<?= esc_url($admin_avatar); ?>" alt="">

							<?php else: ?>

								<img src="<?= esc_url(get_field('user_image', 'user_' . $reply->user_id)['url']) ?>" alt="">

							<?php endif; ?>
						</div>
						<div class="single_comment_title_text2">
							<div class="single_comment_title_text_bg"></div>
							<div class="single_comment_title">
								<h3><?= esc_html($reply->comment_author) ?></h3>
								<p><?= jdate('l j F Y', strtotime($reply->comment_date_gmt)); ?></p>
								<p><?= $rating ? str_repeat('<i class="rating-star-show fa fa-star"></i>', $rating) : '-'; ?></p>
							</div>
							<div class="single_comment_text">
								<p><?= esc_html($reply->comment_content) ?></p>
							</div>
						</div>
					</div>
<?php
				}
			}
		}
	}
}
?>