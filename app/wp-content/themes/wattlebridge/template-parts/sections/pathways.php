<?php
/**
 * Homepage — Employer and Candidate Pathways
 *
 * @package Wattlebridge
 */

$pathways = [
  [
    'type' => 'employer',
    'image' => get_field('pathway_employer_image'),
    'heading' => get_field('pathway_employer_heading'),
    'description' => get_field('pathway_employer_description'),
    'link' => get_field('pathway_employer_link'),
    'button_text' => 'Employer start here',
  ],
  [
    'type' => 'candidate',
    'image' => get_field('pathway_candidate_image'),
    'heading' => get_field('pathway_candidate_heading'),
    'description' => get_field('pathway_candidate_description'),
    'link' => get_field('pathway_candidate_link'),
    'button_text' => 'Candidate start here',
  ],
];

$has_content = false;

foreach ($pathways as $pathway) {
  if ($pathway['heading'] || $pathway['description']) {
    $has_content = true;
    break;
  }
}

if (!$has_content) {
  return;
}
?>

<section class="pathways" aria-label="Explore recruitment pathways">
  <div class="container">

    <div class="pathways__grid">

      <?php foreach ($pathways as $pathway):

        $image = $pathway['image'];
        $link = $pathway['link'];

        $image_id = is_array($image)
          ? (int) ($image['ID'] ?? 0)
          : (int) $image;

        $url = is_array($link)
          ? ($link['url'] ?? '')
          : '';

        $target = is_array($link)
          ? ($link['target'] ?? '_self')
          : '_self';

        $button_text = $pathway['button_text'];

        ?>

        <article class="pathways__card pathways__card--<?php echo esc_attr($pathway['type']); ?>">

          <?php if ($image_id): ?>
            <?php
            echo wp_get_attachment_image(
              $image_id,
              'large',
              false,
              [
                'class' => 'pathways__image',
                'loading' => 'lazy',
                'decoding' => 'async',
                'sizes' => '(max-width: 767px) 100vw, 50vw',
                'alt' => '',
              ]
            );
            ?>
          <?php endif; ?>

          <div class="pathways__content">

            <?php if ($pathway['heading']): ?>
              <h2 class="pathways__heading">
                <?php echo esc_html($pathway['heading']); ?>
              </h2>
            <?php endif; ?>

            <?php if ($pathway['description']): ?>
              <p class="pathways__description">
                <?php echo esc_html($pathway['description']); ?>
              </p>
            <?php endif; ?>

            <?php if ($url): ?>
              <a class="pathways__button" href="<?php echo esc_url($url); ?>" target="<?php echo esc_attr($target); ?>"
                <?php if ('_blank' === $target): ?> rel="noopener noreferrer" <?php endif; ?>>
                <span><?php echo esc_html($button_text); ?></span>

                <svg class="pathways__button-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"
                  aria-hidden="true" focusable="false">
                  <path d="M5 12h14" />
                  <path d="m12 5 7 7-7 7" />
                </svg>
              </a>
            <?php endif; ?>

          </div>

        </article>

      <?php endforeach; ?>

    </div>

  </div>
</section>