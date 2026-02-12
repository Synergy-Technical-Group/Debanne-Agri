
<section class="services">
    <div class="container">
        <?php
        $services_title = get_sub_field('services_title');
        $services_sub_title = get_sub_field('services_sub_title');

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

                            <?php if ( $button ): ?>
                                <a href="<?php echo esc_url($button['url']); ?>" class="services__btn">
                                    <?php echo esc_html($button['title']); ?>
                                    <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3.81846 5L-4.28277e-07 8.88906L1.09077 10L6 5L1.09077 -2.14589e-07L-8.83182e-08 1.11172L3.81846 5.00079L3.81846 5Z" fill="#05A65D"/>
                                    </svg>
                                </a>
                            <?php endif; ?>
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