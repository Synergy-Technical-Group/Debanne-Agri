<?php
$title      = get_sub_field('partners_title');
$subtitle   = get_sub_field('partners_subtitle');
$btn        = get_sub_field('collaborators_button');
$logos      = get_sub_field('partners_logo');

?>

<section class="partners">
    <div class="container">

        <?php if (!empty($title)) : ?>
            <h2 class="partners__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($subtitle)) : ?>
            <p class="partners__subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <?php if (is_array($btn) && !empty($btn['url']) && !empty($btn['title'])) : ?>
            <div class="partners__btn">
                <?php thm_get_link($btn, '', ['class' => 'btn partners__button']); ?>
            </div>
        <?php endif; ?>

        <div class="partners__swiper swiper">
            <div class="swiper-wrapper">

                <?php foreach ($logos as $img) : ?>
                    <?php
                    $img_id  = is_array($img) && !empty($img['ID']) ? (int) $img['ID'] : (int) $img;
                    if (!$img_id) continue;

                    $img_html = wp_get_attachment_image($img_id, 'medium', false, [
                        'class' => 'partners__logo',
                        'loading' => 'lazy',
                    ]);
                    ?>
                    <div class="swiper-slide">
                        <?php echo $img_html; ?>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
            <button class="partners__prev swiper-button-prev" type="button" aria-label="Previous"></button>
            <button class="partners__next swiper-button-next" type="button" aria-label="Next"></button>

    </div>
</section>
