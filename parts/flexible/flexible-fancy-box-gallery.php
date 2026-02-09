<?php
$section_iteration = $args['i'] ?? 0;
$images            = get_sub_field( 'images' ) ?? [];

if ( ! empty( $images ) ) : ?>
	<section class="fancy-gallery">
        <div class="container">
            <div class="fancy-gallery__list">
                <?php foreach ( $images as $image ) :
                    if ( ! $image ) continue;
                    $image_url = wp_get_attachment_url( $image ); ?>
                    <div class="fancy-gallery__item" data-aos="fade-up">
                        <a href="<?php echo $image_url; ?>" class="fancy-gallery__image-wrapper" data-fancybox="fancy-gallery-<?php echo $section_iteration; ?>">
                            <?php echo thm_get_attachment_by_id($image, 'full', 'medium', false, array(
                                'class' => 'fancy-gallery__image',
                            )); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
	</section>
<?php endif; ?>
