<?php
$section_title = get_sub_field('agrotica_title');
$subtitle      = get_sub_field('agrotica_subtitle');
$btn_tpl       = get_sub_field('read_more_link');

$featured = get_sub_field('agrotical_posts') ?: [];
$featured_ids = [];

foreach ($featured as $p) {
    $id = is_object($p) ? (int)$p->ID : (int)$p;
    if ($id) $featured_ids[] = $id;
}

$post_type = 'article';

$q_sidebar = new WP_Query([
        'post_type'      => $post_type,
        'posts_per_page' => 6,
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post__not_in'   => $featured_ids,
        'no_found_rows'  => true,
]);
?>

<section class="agrotica">
    <div class="container">

        <?php if (!empty($section_title)) : ?>
            <h2 class="agrotica__title"><?php echo esc_html($section_title); ?></h2>
        <?php endif; ?>

        <?php if (!empty($subtitle)) : ?>
            <p class="agrotica__subtitle"><?php echo esc_html($subtitle); ?></p>
        <?php endif; ?>

        <div class="agrotica__flex">
            <?php if (!empty($featured_ids)) : ?>
                <div class="agrotica__left">
                    <?php foreach ($featured_ids as $id) : ?>
                        <?php
                        $post_title = get_the_title($id) ?: '';
                        $link       = get_permalink($id) ?: '';
                        $thumb      = get_the_post_thumbnail($id, 'large');

                        $btn = $btn_tpl;
                        if (is_array($btn)) $btn['url'] = $link;
                        ?>

                        <article class="agrotica-card">
                            <div class="agrotica-card__thumb"><?php echo $thumb; ?></div>
                                <div class="agrotica-card__inner">
                                    <?php if (!empty($post_title)) : ?>
                                        <h3 class="agrotica-card__title"><?php echo esc_html($post_title); ?></h3>
                                    <?php endif; ?>

                                    <?php
                                    if (is_array($btn) && !empty($btn['title']) && !empty($btn['url'])) {
                                        $a_html = thm_get_link($btn, '', ['class' => 'agrotica-card__link'], false, true);

                                        $icon_html =
                                                '<span class="arrow-white"><svg class="icon" width="6" height="10" aria-hidden="true" focusable="false">'
                                                . '<use xlink:href="#arrow-white"></use>'
                                                . '</svg></span>';

                                        echo str_replace('</a>', ' ' . $icon_html . '</a>', $a_html);
                                    }
                                    ?>
                                </div>
                        </article>

                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <?php if ($q_sidebar->have_posts()) : ?>
                <aside class="agrotica__sidebar">
                    <?php while ($q_sidebar->have_posts()) : $q_sidebar->the_post(); ?>
                        <?php
                        $id         = get_the_ID();
                        $post_title = get_the_title() ?: '';
                        $link       = get_permalink() ?: '';
                        $thumb      = get_the_post_thumbnail($id, 'thumbnail');

                        $btn = $btn_tpl;
                        if (is_array($btn)) $btn['url'] = $link;
                        ?>

                        <article class="agrotica__sidebar-item">
                            <div class="agrotica__sidebar-item__thumb"><?php echo $thumb; ?></div>

                            <div class="agrotica__sidebar-item__content">
                                <?php if (!empty($post_title)) : ?>
                                    <h4 class="agrotica__sidebar-item__title"><?php echo esc_html($post_title); ?></h4>
                                <?php endif; ?>

                                <?php
                                if (is_array($btn) && !empty($btn['title']) && !empty($btn['url'])) {
                                    $a_html = thm_get_link($btn, '', ['class' => 'agrotica-card__link'], false, true);

                                    $icon_html =
                                            '<span class="arrow-white"><svg class="icon" width="6" height="10" aria-hidden="true" focusable="false">'
                                            . '<use xlink:href="#arrow-white"></use>'
                                            . '</svg></span>';

                                    echo str_replace('</a>', ' ' . $icon_html . '</a>', $a_html);
                                }
                                ?>
                            </div>
                        </article>

                    <?php endwhile; wp_reset_postdata(); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>
</section>
