<?php
if (! defined('ABSPATH')) exit;

$our_team = get_fields();
?>

<div class="team_area" id="team">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section_title">
          <h2><?= esc_html($our_team['section_title']); ?></h2>
          <p><?= esc_html($our_team['section_description']); ?></p>
        </div>
      </div>
    </div>

    <!-- left -->
    <div class="col-md-6 col-sm-12">
      <div class="single_apps">
        <div class="apps_title">
          <h1><?= esc_html($our_team['right_title_1']); ?></h1>
          <h2><?= esc_html($our_team['right_title_2']); ?></h2>
          <p><?= esc_html($our_team['right_description']); ?></p>
        </div>

        <div class="apps_content_title">
          <?php if (!empty($our_team['features'])) : ?>
            <ul>
              <?php foreach ($our_team['features'] as $feature) : ?>
                <li><?= esc_html($feature['text']); ?></li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div>

        <!-- Button -->
        <?php
        $button_url    = $our_team['button_link']['url'] ?? '#';
        $button_target = $our_team['button_link']['target'] ?? '_self';
        ?>

        <div class="app_btn">
          <a href="<?= esc_url($button_url); ?>"
            target="<?= esc_attr($button_target); ?>"
            <?= $button_target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>
            <?= esc_html($our_team['button_text']); ?>
          </a>
        </div>
      </div>
    </div>

    <!-- right -->
    <div class="col-md-6 col-sm-12">
      <div class="row">

        <?php if (!empty($our_team['team_members'])) : ?>
          <?php foreach ($our_team['team_members'] as $member) : ?>

            <div class="col-md-6 col-sm-6">
              <div class="single_team">
                <div class="single_team_inner">

                  <!-- thumb -->
                  <div class="single_team_thumb">
                    <img
                      src="<?= esc_url($member['member_image']['url'] ?? ''); ?>"
                      alt="<?= esc_attr($member['member_name'] ?? ''); ?>">

                    <?php if (!empty($member['social_medias'])) : ?>
                      <div class="team_socal_icon">
                        <ul>

                          <?php foreach ($member['social_medias'] as $sm) :

                            $url    = $sm['address']['url'] ?? '#';
                            $target = $sm['address']['target'] ?? '_self';
                          ?>

                            <li>
                              <a href="<?= esc_url($url); ?>"
                                target="<?= esc_attr($target); ?>"
                                <?= $target === '_blank' ? 'rel="noopener noreferrer"' : ''; ?>>

                                <i class="<?= esc_attr($sm['icon']); ?>"></i>

                              </a>
                            </li>

                          <?php endforeach; ?>

                        </ul>
                      </div>
                    <?php endif; ?>

                  </div>

                  <!-- title -->
                  <div class="team_content">
                    <h2><?= esc_html($member['member_name']); ?></h2>
                  </div>

                </div>
              </div>
            </div>

          <?php endforeach; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>