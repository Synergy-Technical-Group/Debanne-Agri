<?php
    $services_title = get_sub_field('services_title');
    $services_sub_title = get_sub_field('services_sub_title');
    ?>

<section class="services">
    <div class="container">
        <?php

        if( $services_title ): ?>
        <h2 class="services__title"><?php echo esc_html($services_title); ?></h2>
        <?php endif;

        if( $services_sub_title ): ?>
        <p class="services__subtitle"><?php echo esc_html($services_sub_title); ?></p>
        <?php endif;

        if( have_rows('services_cards') ): ?>
            <div class="services__cards swiper">
                <div class="swiper-wrapper">
                    <?php while( have_rows('services_cards') ): the_row();
                        $image  = get_sub_field('image');
                        $icon   = get_sub_field('icon');
                        $title  = get_sub_field('title');
                        $button = get_sub_field('button');
                        ?>
                        <div class="services__card swiper-slide">
                            <?php if ( $image ): ?>
                                <div class="services__card-image">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
                                </div>
                            <?php endif; ?>

                            <?php if ( $icon ): ?>
                                <div class="services__card-icon">
                                    <img src="<?php echo esc_url($icon['url']); ?>" alt="">
                                </div>
                            <?php endif; ?>

                            <?php if ( $title ): ?>
                                <h3 class="services__card-title"><?php echo esc_html($title); ?></h3>
                            <?php endif; ?>

                            <?php
                            if (is_array($button) && !empty($button['title']) && !empty($button['url'])) {
                                $a_html = thm_get_link($button, '', array('class' => 'services__btn'), false, true);
                                $icon_html =
                                        '<svg class="services__btn-icon icon" width="6" height="10" aria-hidden="true" focusable="false">'
                                        . '<use href="#icon-arrow-green"></use>'
                                        . '</svg>';

                                echo str_replace('</a>', ' ' . $icon_html . '</a>', $a_html);
                            }
                            ?>
                        </div>
                    <?php endwhile; ?>
                </div>
          </div>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</section>