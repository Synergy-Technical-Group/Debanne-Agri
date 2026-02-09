<?php
if ( have_rows( 'hero_slider' ) ) : ?>
	<section class="hero-slider">
        <div class="container">
            <div class="hero-slider__list swiper">
                <div class="swiper-wrapper">
                    <?php while ( have_rows( 'hero_slider' ) ) : the_row();
                        $image = get_sub_field( 'image' );
                        $title = get_sub_field( 'title' );
                        $link  = get_sub_field( 'link' ); ?>
                        <div class="hero-slider__item swiper-slide">
                            <div class="hero-slider__image-wrapper">
                                <?php echo thm_get_attachment_by_id($image, 'large', 'medium', false, array(
                                    'class' => 'hero-slider__image skip-lazy',
                                )); ?>
                            </div>
                            <?php if ( ! empty( $title ) || ! empty( $link ) ): ?>
                                <div class="hero-slider__content">
                                    <?php if ( ! empty( $title ) ): ?>
                                        <h2 class="hero-slider__title">
                                            <?php echo $title; ?>
                                        </h2>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <div class="hero-slider_arrow swiper-button-prev"></div>
            <div class="hero-slider_arrow swiper-button-next"></div>
        </div>
	</section>
<?php endif; ?>
