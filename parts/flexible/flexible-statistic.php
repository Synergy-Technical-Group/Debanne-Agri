<?php
$title    = get_sub_field('statistic_title');
$subtitle = get_sub_field('statistic_subtitle');
$btn      = get_sub_field('statistic_button');

?>

<section class="statistic">
    <div class="container">

        <?php if ( ! empty($title) ) : ?>
            <h2 class="statistic__title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ( ! empty($subtitle) ) : ?>
            <p class="statistic__subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <?php if ( have_rows('statistic_block') ) : ?>
            <div class="statistic__flex">
                <?php while ( have_rows('statistic_block') ) : the_row(); ?>
                    <?php
                    $number = get_sub_field('number');
                    $text   = get_sub_field('text');
                    ?>

                    <div class="statistic__item">
                        <?php if ( ! empty($number) ) : ?>
                            <div class="statistic__number"><?php echo esc_html($number); ?></div>
                        <?php endif; ?>

                        <?php if ( ! empty($text) ) : ?>
                            <div class="statistic__text"><?php echo esc_html($text); ?></div>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php endif; ?>

        <?php if ( is_array($btn) && ! empty($btn['url']) && ! empty($btn['title']) ) : ?>
            <div class="statistic__btn">
                <?php thm_get_link($btn, '', array('class' => 'btn statistic__button')); ?>
            </div>
        <?php endif; ?>

    </div>
</section>
