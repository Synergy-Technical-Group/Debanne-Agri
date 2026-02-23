<?php
$footer_logo            = get_field( 'footer_logo', 'option' );
$copyright              = get_field( 'copyright', 'option' );
$footer_title_point     = get_field('footer_title_point', 'option');
$footer_location_btn    = get_field('footer_location_button', 'option');
?>


<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__inner">
            <div class="footer__left-side">

                <?php if ( $footer_title_point ) : ?>
                    <h4 class="footer__title">
                        <?php echo esc_html( $footer_title_point ); ?>
                    </h4>
                <?php endif; ?>

                <?php if ( have_rows('footer_point', 'option') ) : ?>
                    <ul class="footer__points">
                        <?php while ( have_rows('footer_point', 'option') ) : the_row();
                            $icon = get_sub_field('footer_point_icon');
                            $link = get_sub_field('footer_point_name');
                            if ( !is_array($link) || empty($link['title']) || empty($link['url']) ) continue;
                            ?>
                            <li class="footer__point">
                                <?php if ( $icon ) : ?>
                                    <span class="footer__point-icon">
            <?php echo wp_get_attachment_image($icon, 'full'); ?>
          </span>
                                <?php endif; ?>

                                <a href="<?php echo esc_url($link['url']); ?>"
                                   target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <?php
                if (is_array($footer_location_btn) && !empty($footer_location_btn['title']) && !empty($footer_location_btn['url'])) {

                    $a_html = thm_get_link(
                            $footer_location_btn,
                            '',
                            ['class' => 'footer__location-btn btn'],
                            false,
                            true
                    );
                    $icon_html =
                            '<svg class="footer__location-btn-icon icon" width="31" height="27" aria-hidden="true" focusable="false">'
                            . '<use xlink:href="#icon-location"></use>'
                            . '</svg>';

                    echo str_replace('</a>', ' ' . $icon_html . '</a>', $a_html);
                }
                ?>

            </div>

            <div class="footer__right-side">
                <div class="footer__form">
                    <?php thm_display_gform(1, true, false, false); ?>
                </div>

                <div class="footer__navigation">
                    <?php if ( has_nav_menu( 'footer_menu' ) ): ?>
                        <nav id="footer-menu">
                            <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'list-inline', 'container'=> false,) ); ?>
                        </nav>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="footer__bottom">
            <?php if ( has_nav_menu( 'footer_bottom_menu' ) ): ?>
                <nav class="footer__bottom-navigation">
                    <?php wp_nav_menu( array(
                            'theme_location' => 'footer_bottom_menu',
                            'container'      => false,
                            'menu_class'     => 'footer-bottom-menu',
                            'depth'          => 1,
                    ) ); ?>
                </nav>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer__bottom-content">
        <div class="container footer__bottom-content--inner ">
            <?php if ( have_rows('footer_social_links', 'option') ) : ?>
                <div class="footer__socials">
                    <ul class="footer__social-list">
                        <?php while ( have_rows('footer_social_links', 'option') ) : the_row();

                            $icon = get_sub_field('fotter_social_links_icon');
                            $link = get_sub_field('footer_social_link');
                            ?>
                            <?php if ( $link ) : ?>
                                <li class="footer__social-item">
                                    <a href="<?php echo esc_url( $link['url'] ); ?>"
                                       target="<?php echo esc_attr( $link['target'] ?: '_blank' ); ?>"
                                       rel="noopener">
                                        <?php if ( $icon ) :
                                            echo wp_get_attachment_image( $icon, 'full' );
                                        endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="footer__copyright">
                <div class="footer__copyright-text">
                    <?php echo do_shortcode( get_field('copyright', 'option') ); ?>
                </div>
            </div>
        </div>
    </div>

<div class="footer__scroll-top">
    <button class="scroll-top" type="button" aria-label="Scroll to top">
        <svg class="icon" width="12" height="12" aria-hidden="true" focusable="false">
            <use xlink:href="#icon-scroll-top"></use>
        </svg>
    </button>
</div>
</footer>
<?php wp_footer(); ?>



</body>
</html>