<?php
if ( have_rows( 'hero_slider' ) ) : ?>
    <section class="hero-slider">
        <div class="hero-slider__list swiper">
            <div class="swiper-wrapper">
                <?php while ( have_rows( 'hero_slider' ) ) : the_row();
                    $image = get_sub_field( 'image' );
                    $title = get_sub_field( 'title' );
                    $title_bottom = get_sub_field( 'title_bottom' );
                    $link  = get_sub_field( 'link' ); ?>
                    <div class="hero-slider__item swiper-slide">
                        <div class="hero-slider__image-wrapper">
                            <?php echo thm_get_attachment_by_id($image, 'large', 'medium', false, array(
                                    'class' => 'hero-slider__image skip-lazy',
                            )); ?>
                        </div>
                        <?php if ( ! empty( $title ) || ! empty( $title_bottom ) || ! empty( $link ) ): ?>
                            <div class="container">
                                    <div class="hero-slider__content">
                                    <?php if ( ! empty( $title ) ): ?>
                                        <p class="hero-slider__title"><?php echo $title; ?></p>
                                    <?php endif; ?>

                                    <?php if ( ! empty( $title_bottom ) ): ?>
                                        <p class="hero-slider__title-bottom"><?php echo $title_bottom; ?></p>
                                    <?php endif; ?>

                                    <?php if( $link ): ?>
                                    <div class="hero-slider__btn">
                                        <a href="<?php echo esc_url($link['url']); ?>" class="btn btn-hero">
                                            <?php echo esc_html($link['title']); ?>
                                        </a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if( have_rows('block_events', 'option') ): ?>
                            <div class="hero-slider__events">
                                <div class="container">
                                    <div class="hero-slider__events-block">
                                    <?php while( have_rows('block_events', 'option') ): the_row();
                                        $event_title = get_sub_field('title');   // назва події
                                        $event_date  = get_sub_field('date');    // дата події
                                    ?>
                                        <div class="hero-slider__event-item event-item">
                                            <?php if( $event_date ):
                                                $day   = date('d', strtotime($event_date));
                                                $month = date('M', strtotime($event_date)); ?>
                                                <p class="event-item__date">
                                                    <span class="event-item__date__day"><?php echo esc_html($day); ?></span>
                                                    <span class="event-item__date__month"><?php echo esc_html($month); ?></span>
                                                </p>
                                            <?php endif; ?>

                                            <?php if ( $event_title ): ?>
                                                <h3 class="event-item__title"><?php echo esc_html($event_title); ?></h3>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
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
