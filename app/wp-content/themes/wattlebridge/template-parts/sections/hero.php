<?php
/**
 * Homepage hero section.
 *
 * Heading, description and image are editable through SCF.
 * Button labels and destinations are theme-controlled.
 *
 * @package Wattlebridge
 */

defined('ABSPATH') || exit;

// ------------------------------------------------------------
// Default content
// ------------------------------------------------------------

$heading = 'IT and technical recruitment built around your team';

$description = 'Wattlebridge Technical Recruitment helps employers across Perth and Western Australia recruit IT and technical professionals for permanent and contract roles. We start by understanding the work, the team and the skills that matter.';

$image_id = 0;

// ------------------------------------------------------------
// SCF content
// ------------------------------------------------------------

$home_page_id = (int) get_queried_object_id();

if (function_exists('get_field')) {
  $field_heading = get_field('hero_heading', $home_page_id);
  $field_description = get_field('hero_description', $home_page_id);
  $field_image = get_field('hero_image', $home_page_id);

  if (is_string($field_heading) && trim($field_heading) !== '') {
    $heading = $field_heading;
  }

  if (is_string($field_description) && trim($field_description) !== '') {
    $description = $field_description;
  }

  if (is_numeric($field_image)) {
    $image_id = (int) $field_image;
  } elseif (is_array($field_image) && !empty($field_image['ID'])) {
    $image_id = (int) $field_image['ID'];
  }
}

// ------------------------------------------------------------
// Page destinations
// ------------------------------------------------------------

$employers_page = get_page_by_path('employers');
$contact_page = get_page_by_path('contact');

$employers_url = $employers_page instanceof WP_Post
  ? get_permalink($employers_page)
  : home_url('/employers/');

$contact_url = $contact_page instanceof WP_Post
  ? get_permalink($contact_page)
  : home_url('/contact/');

?>

<section class="hero" aria-labelledby="hero-heading">

  <?php if ($image_id > 0): ?>
    <div class="hero__media" aria-hidden="true">
      <?php
      echo wp_get_attachment_image(
        $image_id,
        'full',
        false,
        [
          'class' => 'hero__image',
          'alt' => '',
          'loading' => 'eager',
          'fetchpriority' => 'high',
          'decoding' => 'async',
          'sizes' => '100vw',
        ]
      );
      ?>
    </div>
  <?php endif; ?>

  <div class="hero__overlay" aria-hidden="true"></div>

  <div class="hero__container container">
    <div class="hero__content">

      <!-- Main page heading: H1 -->
      <h1 class="hero__title" id="hero-heading">
        <?php echo esc_html($heading); ?>
      </h1>

      <p class="hero__description">
        <?php echo nl2br(esc_html($description)); ?>
      </p>

      <div class="hero__actions">

        <a class="button button--primary" href="<?php echo esc_url($employers_url); ?>">
          <span>Employer start here</span>

          <span class="button__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" focusable="false">
              <path d="M2 12h20m-7-7 7 7-7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </span>
        </a>

        <a class="button button--outline-light" href="<?php echo esc_url($contact_url); ?>">
          <span>Candidate start here</span>

          <span class="button__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" focusable="false">
              <path d="M2 12h20m-7-7 7 7-7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                stroke-linejoin="round" />
            </svg>
          </span>
        </a>

      </div>

    </div>
  </div>

</section>