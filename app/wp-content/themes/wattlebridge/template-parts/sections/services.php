<?php
/**
 * Homepage — Recruitment Services
 *
 * Content managed through ACF/SCF.
 *
 * @package Wattlebridge
 */

$eyebrow = get_field('services_eyebrow');
$heading = get_field('services_heading');
$services = get_field('services_items');

if (!$heading && empty($services)) {
  return;
}
?>

<section class="services" <?php if ($heading): ?> aria-labelledby="services-heading" <?php else: ?>
    aria-label="Recruitment services" <?php endif; ?>>
  <div class="container">

    <!-- Section heading -->
    <div class="services__header">

      <?php if ($eyebrow): ?>
        <span class="services__eyebrow">
          <?php echo esc_html($eyebrow); ?>
        </span>
      <?php endif; ?>

      <?php if ($heading): ?>
        <h2 class="services__heading" id="services-heading">
          <?php echo esc_html($heading); ?>
        </h2>
      <?php endif; ?>

    </div>

    <?php if (!empty($services) && is_array($services)): ?>

      <div class="services__grid">

        <?php foreach ($services as $index => $service):

          $number = sprintf('%02d', $index + 1);

          $label = $service['service_label'] ?? '';
          $title = $service['service_title'] ?? '';
          $text = $service['service_description'] ?? '';
          $link = $service['service_link'] ?? null;

          $url = !empty($link['url'])
            ? $link['url']
            : '';

          $target = !empty($link['target'])
            ? $link['target']
            : '_self';

          ?>

          <article class="services__card">

            <div class="services__card-top">

              <span class="services__number">
                <?php echo esc_html($number); ?>
              </span>

              <span class="services__line" aria-hidden="true"></span>

            </div>

            <div class="services__card-content">

              <?php if ($label): ?>
                <span class="services__label">
                  <?php echo esc_html($label); ?>
                </span>
              <?php endif; ?>

              <?php if ($title): ?>
                <h3 class="services__title">
                  <?php echo esc_html($title); ?>
                </h3>
              <?php endif; ?>

              <?php if ($text): ?>
                <p class="services__text">
                  <?php echo esc_html($text); ?>
                </p>
              <?php endif; ?>

            </div>

            <?php if ($url): ?>
              <a class="services__link" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                <?php
                if ('_blank' === $target) {
                  echo 'rel="noopener noreferrer"';
                }
                ?>
                aria-label="<?php echo esc_attr('Learn more about service: ' . $title); ?>">
                <span>Learn more about service</span>

                <svg class="services__link-arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                  viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round"
                  stroke-linejoin="round" aria-hidden="true" focusable="false">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            <?php endif; ?>

          </article>

        <?php endforeach; ?>

      </div>

    <?php endif; ?>

  </div>
</section>