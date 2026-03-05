<?php if ( have_rows('hero_slider') ) : ?>

    <section class="hero-slider">
        <div class="hero-slider__list swiper">
            <div class="swiper-wrapper">

                <?php while ( have_rows('hero_slider') ) : the_row();
                    $image        = get_sub_field('image');
                    $title        = get_sub_field('title');
                    $title_bottom = get_sub_field('title_bottom');
                    $link         = get_sub_field('link');

                    $slide_events = get_sub_field('slide_events') ?: [];
                    $events = [];

                    foreach ( $slide_events as $ev ) {
                        $event_id = is_object($ev) ? $ev->ID : (int) $ev;

                        $event_date = get_field('event_date', $event_id);
                        $ts = $event_date ? strtotime(str_replace('/', '-', $event_date)) : false;

                        $events[] = [
                                'title' => get_the_title($event_id),
                                'link'  => get_permalink($event_id),
                                'day'   => $ts ? date('d', $ts) : '',
                                'month' => $ts ? strtoupper(date('M', $ts)) : '',
                        ];
                    }

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