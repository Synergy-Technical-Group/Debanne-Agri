<?php
$content  = get_sub_field('quote_content');
$author   = get_sub_field('quote_author');
$position = get_sub_field('quote_position');
$image    = get_sub_field('quote_image');
?>

<section class="quote">
    <div class="container">

        <div class="quote__wrap">

            <div class="quote__content">

                <?php if ( ! empty($content) ) : ?>
                    <div class="quote__text">
                        <?php echo wp_kses_post($content); ?>
                    </div>
                <?php endif; ?>

                <?php if ( ! empty($author) || ! empty($position) ) : ?>
                    <div class="quote__meta">
                        <?php if ( ! empty($author) ) : ?>
                            <p class="quote__author"><?php echo esc_html($author); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty($position) ) : ?>
                            <p class="quote__position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>

            <?php if ( ! empty($image) ) : ?>

                <div class="quote__image">
                    <?php
                    if ( is_numeric($image) ) {
                        echo wp_get_attachment_image((int)$image, 'medium', false, array(
                            'loading' => 'lazy',
                            'alt'     => $author ? esc_attr($author) : '',
                        ));
                    }
                    elseif ( is_array($image) && ! empty($image['ID']) ) {
                        echo wp_get_attachment_image((int)$image['ID'], 'medium', false, array(
                            'loading' => 'lazy',
                            'alt'     => $author ? esc_attr($author) : '',
                        ));
                    }
                    ?>
                </div>
            <?php endif; ?>

        </div>

    </div>
</section>
