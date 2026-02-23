<?php if ( have_rows('hero_slider') ) :

    $events_q = new WP_Query([
            'post_type'      => 'event',
            'post_status'    => 'publish',
            'posts_per_page' => 2,
            'meta_key'       => 'event_date',
            'orderby'        => 'meta_value',
            'order'          => 'DESC',
    ]);

    $events = [];

    if ( $events_q->have_posts() ) {
        while ( $events_q->have_posts() ) { $events_q->the_post();

            $event_date = get_field('event_date');
            $ts = $event_date ? strtotime($event_date) : false;

            $events[] = [
                    'title' => get_the_title(),
                    'link'  => get_permalink(),
                    'day'   => $ts ? date('d', $ts) : '',
                    'month' => $ts ? date('M', $ts) : '',
            ];
        }
        wp_reset_postdata();
    }
    ?>
    <section class="hero-slider">
        <div class="hero-slider__list swiper">
            <div class="swiper-wrapper">

                <?php while ( have_rows('hero_slider') ) : the_row();
                    $image        = get_sub_field('image');
                    $title        = get_sub_field('title');
                    $title_bottom = get_sub_field('title_bottom');
                    $link         = get_sub_field('link');
                    ?>
                    <div class="hero-slider__item swiper-slide">
                        <div class="hero-slider__image-wrapper">
                            <?php echo thm_get_attachment_by_id($image, 'large', 'medium', false, [
                                    'class' => 'hero-slider__image skip-lazy',
                            ]); ?>
                        </div>

                        <?php if ( $title || $title_bottom || $link ) : ?>
                            <div class="container">
                                <div class="hero-slider__content">
                                    <?php if ( $title ) : ?>
                                        <p class="hero-slider__title"><?php echo esc_html($title); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $title_bottom ) : ?>
                                        <p class="hero-slider__title-bottom"><?php echo esc_html($title_bottom); ?></p>
                                    <?php endif; ?>

                                    <?php if ( $link ) : ?>
                                        <div class="hero-slider__btn">
                                            <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-hero">
                                                <?php echo esc_html($link['title']); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ( !empty($events) ) : ?>
                            <div class="hero-slider__events">
                                <div class="container">
                                    <div class="hero-slider__events-block">
                                        <?php foreach ( $events as $e ) : ?>
                                            <a href="<?php echo esc_url($e['link']); ?>" class="hero-slider__event-item event-item">
                                                <?php if ( $e['day'] && $e['month'] ) : ?>
                                                    <p class="event-item__date">
                                                        <span class="event-item__date__day"><?php echo esc_html($e['day']); ?></span>
                                                        <span class="event-item__date__month"><?php echo esc_html($e['month']); ?></span>
                                                    </p>
                                                <?php endif; ?>

                                                <h3 class="event-item__title"><?php echo esc_html($e['title']); ?></h3>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endwhile; ?>

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
<?php endif; ?>