<?php
$section_title  = get_sub_field('title');
$posts          = get_sub_field('featured_post');
$read_more_link = get_sub_field('read_more_link');

if (empty($posts) || !is_array($posts)) {
    return;
}
?>

<section class="news-views">
    <?php if (!empty($section_title)) : ?>
        <h2 class="news-views__title"><?php echo esc_html($section_title); ?></h2>
    <?php endif; ?>

    <div class="news-views__grid">
        <?php foreach ($posts as $p) : ?>
            <?php
            $id = is_object($p) ? (int) $p->ID : (int) $p;
            if (!$id) continue;

            $title = get_the_title($id) ?: '';
            $link  = get_permalink($id) ?: '';
            $thumb_id = (int) get_post_thumbnail_id($id);

            // ✅ повний контент (без обрізання)
            $content = get_post_field('post_content', $id);
            $content = trim($content);
            ?>

            <div class="news-views__card">
                <div class="news-views__card__media">
                    <?php
                    if ($thumb_id) {
                        echo thm_get_attachment_by_id($thumb_id, 'large', 'medium', false, array(
                                'class' => 'news-views__img',
                                'alt' => $title,
                                'loading' => 'lazy',
                        ));
                    } else {
                        echo thm_display_no_img(true, $title);
                    }
                    ?>
                </div>

                <div class="news-views__overlay">
                    <?php if (!empty($title)) : ?>
                        <h4 class="news-views__card__title h4"><?php echo esc_html($title); ?></h4>
                    <?php endif; ?>

                    <?php if (!empty($content)) : ?>
                        <div class="news-views__card__excerpt">
                            <?php echo wp_kses_post( wpautop($content) ); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    $read_more_link = get_sub_field('read_more_link');

                    if (is_array($read_more_link) && !empty($read_more_link['title']) && !empty($link)) {

                        $btn = $read_more_link;
                        $btn['url'] = $link;

                        $a_html = thm_get_link($btn, '', array('class' => 'news-views__btn__more'), false, true);

                        $icon_html =
                                '<span class="arrow-white"><svg class="icon" width="6" height="10" aria-hidden="true" focusable="false">'
                                . '<use xlink:href="#arrow-white"></use>'
                                . '</svg></span>';

                        echo str_replace('</a>', ' ' . $icon_html . '</a>', $a_html);
                    }
                    ?>

                </div>
            </div>

        <?php endforeach; ?>
    </div>
</section>
