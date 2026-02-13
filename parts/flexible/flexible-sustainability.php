<?php
$bg          = get_sub_field('sustainability_background');
$title       = get_sub_field('sustainability_title');
$desc        = get_sub_field('sustainability_description');
$btn         = get_sub_field('sustainability_button');
$color       = get_sub_field('style_color') ?: 'green';
$position    = get_sub_field('content_position') ?: 'left';

$allowed_colors = ['green', 'blue'];
$allowed_pos    = ['left', 'right'];

if (!in_array($color, $allowed_colors, true)) $color = 'green';
if (!in_array($position, $allowed_pos, true)) $position = 'left';


$bg_id  = is_array($bg) && !empty($bg['ID']) ? (int)$bg['ID'] : (int)$bg;
$bg_url = $bg_id ? wp_get_attachment_image_url($bg_id, 'full') : '';
?>

<section class="sustainability sustainability--<?php echo esc_attr($color); ?> sustainability--<?php echo esc_attr($position); ?>">
    <div class="container">

        <div class="sustainability__grid">

            <div class="sustainability__content">
                <?php if (!empty($title)) : ?>
                    <h4 class="sustainability__title"><?php echo esc_html($title); ?></h4>
                <?php endif; ?>

                <?php if (!empty($desc)) : ?>
                    <?php echo wp_kses_post(wpautop($desc)); ?>
                <?php endif; ?>

                <?php if (is_array($btn) && !empty($btn['url']) && !empty($btn['title'])) : ?>
                    <div class="sustainability__btn">
                        <?php thm_get_link($btn, '', array('class' => 'btn sustainability__button')); ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="sustainability__media">
                <?php if (!empty($bg_id)) : ?>
                    <?php
                    echo wp_get_attachment_image($bg_id, 'full', false, array(
                        'class'   => 'sustainability__img',
                        'loading' => 'lazy',
                        'alt'     => is_array($bg) && !empty($bg['alt']) ? $bg['alt'] : '',
                    ));
                    ?>
                <?php endif; ?>
            </div>

        </div>

    </div>
</section>
