<?php
/**
 * Approach section — editorial split layout.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

// ------------------------------------------------------------
// ACF / SCF fields
// ------------------------------------------------------------

$page_id = get_queried_object_id();

$get_text = static function ($field_name) use ($page_id) {
  if (!function_exists('get_field')) {
    return '';
  }

  $value = get_field($field_name, $page_id);

  return is_string($value) ? trim($value) : '';
};

$eyebrow = $get_text('section_eyebrow');
$heading = $get_text('section_heading');
$intro = $get_text('section_intro');

$feature_eyebrow = $get_text('feature_eyebrow');
$feature_heading = $get_text('feature_heading');
$feature_desc = $get_text('feature_description');

$cta_heading = $get_text('cta_heading');
$cta_description = $get_text('cta_description');

$process_heading = $get_text('process_heading');
$process_intro = $get_text('process_intro');

// ------------------------------------------------------------
// CTA link
// ------------------------------------------------------------

$cta_link = function_exists('get_field')
  ? get_field('cta_link', $page_id)
  : null;

$cta_url = '';
$cta_label = '';
$cta_target = '_self';

if (is_array($cta_link)) {
  $cta_url = isset($cta_link['url'])
    && is_string($cta_link['url'])
    ? $cta_link['url']
    : '';

  $cta_label = isset($cta_link['title'])
    && is_string($cta_link['title'])
    ? $cta_link['title']
    : '';

  $cta_target = isset($cta_link['target'])
    && $cta_link['target'] === '_blank'
    ? '_blank'
    : '_self';
}

// ------------------------------------------------------------
// Process steps
// ------------------------------------------------------------

$steps = function_exists('get_field')
  ? get_field('process_steps', $page_id)
  : [];

$steps = is_array($steps) ? $steps : [];

$valid_steps = [];

foreach ($steps as $step) {
  if (!is_array($step)) {
    continue;
  }

  $title = $step['step_title'] ?? '';
  $description = $step['step_description'] ?? '';

  $title = is_string($title) ? trim($title) : '';
  $description = is_string($description)
    ? trim($description)
    : '';

  if ($title === '' && $description === '') {
    continue;
  }

  $valid_steps[] = [
    'title' => $title,
    'description' => $description,
  ];

  if (count($valid_steps) >= 3) {
    break;
  }
}

// ------------------------------------------------------------
// Visibility checks
// ------------------------------------------------------------

$has_feature = (
  $feature_eyebrow !== ''
  || $feature_heading !== ''
  || $feature_desc !== ''
  || $cta_heading !== ''
  || $cta_description !== ''
  || $cta_url !== ''
);

$has_process = (
  $process_heading !== ''
  || $process_intro !== ''
  || !empty($valid_steps)
);

if (
  $eyebrow === ''
  && $heading === ''
  && $intro === ''
  && !$has_feature
  && !$has_process
) {
  return;
}

$heading_id = wp_unique_id('approach-heading-');
?>

<section class="section approach" <?php if ($heading !== ''): ?> aria-labelledby="<?php echo esc_attr($heading_id); ?>"
  <?php else: ?> aria-label="<?php esc_attr_e('Our approach', 'wattlebridge'); ?>" <?php endif; ?>>
  <div class="container">

    <!-- Section introduction -->
    <?php if ($eyebrow || $heading || $intro): ?>
      <div class="approach__header">

        <?php if ($eyebrow !== ''): ?>
          <p class="approach__eyebrow">
            <?php echo esc_html($eyebrow); ?>
          </p>
        <?php endif; ?>

        <?php if ($heading !== ''): ?>
          <h2 class="approach__heading" id="<?php echo esc_attr($heading_id); ?>">
            <?php echo nl2br(esc_html($heading)); ?>
          </h2>
        <?php endif; ?>

        <?php if ($intro !== ''): ?>
          <p class="approach__intro">
            <?php echo esc_html($intro); ?>
          </p>
        <?php endif; ?>

      </div>
    <?php endif; ?>

    <!-- Two-column content -->
    <?php if ($has_feature || $has_process): ?>
      <div class="approach__grid">

        <!-- Left: Forest feature panel -->
        <?php if ($has_feature): ?>
          <div class="approach__feature">

            <div class="approach__feature-content">

              <?php if ($feature_eyebrow !== ''): ?>
                <p class="approach__feature-eyebrow">
                  <?php echo esc_html($feature_eyebrow); ?>
                </p>
              <?php endif; ?>

              <?php if ($feature_heading !== ''): ?>
                <h3 class="approach__feature-heading">
                  <?php echo esc_html($feature_heading); ?>
                </h3>
              <?php endif; ?>

              <?php if ($feature_desc !== ''): ?>
                <p class="approach__feature-description">
                  <?php echo esc_html($feature_desc); ?>
                </p>
              <?php endif; ?>

            </div>

            <?php if (
              $cta_heading !== ''
              || $cta_description !== ''
              || $cta_url !== ''
            ): ?>
              <div class="approach__cta">

                <div class="approach__cta-content">

                  <?php if ($cta_heading !== ''): ?>
                    <h4 class="approach__cta-heading">
                      <?php echo esc_html($cta_heading); ?>
                    </h4>
                  <?php endif; ?>

                  <?php if ($cta_description !== ''): ?>
                    <p class="approach__cta-description">
                      <?php echo esc_html($cta_description); ?>
                    </p>
                  <?php endif; ?>

                </div>

                <?php if ($cta_url !== ''): ?>
                  <a class="approach__cta-link" href="<?php echo esc_url($cta_url); ?>"
                    target="<?php echo esc_attr($cta_target); ?>" <?php if ($cta_target === '_blank'): ?>
                      rel="noopener noreferrer" <?php endif; ?> aria-label="<?php echo esc_attr(
                           $cta_label !== ''
                           ? $cta_label
                           : __('Contact us', 'wattlebridge')
                         ); ?>">
                    <span aria-hidden="true">↗</span>
                  </a>
                <?php endif; ?>

              </div>
            <?php endif; ?>

          </div>
        <?php endif; ?>

        <!-- Right: Three-step process -->
        <?php if ($has_process): ?>
          <div class="approach__process">

            <?php if ($process_heading !== ''): ?>
              <h3 class="approach__process-heading">
                <?php echo esc_html($process_heading); ?>
              </h3>
            <?php endif; ?>

            <?php if ($process_intro !== ''): ?>
              <p class="approach__process-intro">
                <?php echo esc_html($process_intro); ?>
              </p>
            <?php endif; ?>

            <?php if (!empty($valid_steps)): ?>
              <ol class="approach__steps">

                <?php foreach ($valid_steps as $index => $step): ?>
                  <li class="approach__step">

                    <span class="approach__number" aria-hidden="true">
                      <?php echo esc_html(
                        sprintf('%02d', $index + 1)
                      ); ?>
                    </span>

                    <div class="approach__step-content">

                      <?php if ($step['title'] !== ''): ?>
                        <h4 class="approach__step-title">
                          <?php echo esc_html($step['title']); ?>
                        </h4>
                      <?php endif; ?>

                      <?php if ($step['description'] !== ''): ?>
                        <p class="approach__step-description">
                          <?php echo esc_html($step['description']); ?>
                        </p>
                      <?php endif; ?>

                    </div>

                  </li>
                <?php endforeach; ?>

              </ol>
            <?php endif; ?>

          </div>
        <?php endif; ?>

      </div>
    <?php endif; ?>

  </div>
</section>