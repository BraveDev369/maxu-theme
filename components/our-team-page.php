<?php

$title       = get_field('section_title');
$description = get_field('section_description');
$members     = get_field('team_members');

?>

<?php get_template_part('components/page-title'); ?>

<div class="team_area">
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="section_title">
          <h2><?= esc_html($title); ?></h2>
          <p><?= esc_html($description); ?></p>
        </div>
      </div>
    </div>

    <?php if (!empty($members)) : ?>
      <div class="row">

        <?php foreach ($members as $member) : ?>

          <div class="col-md-4 col-sm-6">
            <div class="single_team">
              <div class="single_team_inner">

                <div class="single_team_thumb">

                  <img
                    src="<?= esc_url($member['image']['url']); ?>"
                    alt="<?= esc_attr($member['image']['alt'] ?: $member['name']); ?>">

                  <?php if (!empty($member['socials'])) : ?>
                    <div class="team_socal_icon">
                      <ul>

                        <?php foreach ($member['socials'] as $social) : ?>

                          <?php if (!empty($social['address'])) : ?>
                            <li>
                              <a href="<?= esc_url($social['address']); ?>">
                                <i class="fa fa-<?= esc_attr($social['icon']); ?>"></i>
                              </a>
                            </li>
                          <?php endif; ?>

                        <?php endforeach; ?>

                      </ul>
                    </div>
                  <?php endif; ?>

                </div>

                <div class="team_content">
                  <h2><?= esc_html($member['name']); ?></h2>
                </div>

              </div>
            </div>
          </div>

        <?php endforeach; ?>

      </div>
    <?php endif; ?>

  </div>
</div>