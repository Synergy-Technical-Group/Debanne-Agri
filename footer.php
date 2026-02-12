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
                <!-- TITLE -->
                <?php if ( $footer_title_point ) : ?>
                    <h4 class="footer__title">
                        <?php echo esc_html( $footer_title_point ); ?>
                    </h4>
                <?php endif; ?>

                <!-- POINTS -->
                <?php if ( have_rows('footer_point', 'option') ) : ?>
                    <ul class="footer__points">
                        <?php while ( have_rows('footer_point', 'option') ) : the_row();
                            $icon = get_sub_field('footer_point_icon');
                            $link = get_sub_field('footer_point_name');
                            ?>
                            <li class="footer__point">
                                <?php if ( $icon ): ?>
                                    <span class="footer__point-icon">
                                        <?php echo wp_get_attachment_image( $icon, 'full' ); ?>
                                    </span>
                                <?php endif; ?>

                                <?php if ( $link ):
                                    $phone_formatted = thm_get_tel_format($link['title']); // форматуємо номер
                                    ?>
                                    <a href="tel:<?php echo esc_attr($phone_formatted); ?>" target="<?php echo esc_attr($link['target'] ?: '_self'); ?>">
                                        <?php echo esc_html($link['title']); ?>
                                    </a>
                                <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>

                <!-- LOCATION BUTTON -->
                <?php if ( $footer_location_btn ) : ?>
                    <a href="<?php echo esc_url( $footer_location_btn['url'] ); ?>"
                       class="footer__location-btn btn"
                       target="<?php echo esc_attr( $footer_location_btn['target'] ?: '_self' ); ?>">
                        <?php echo esc_html( $footer_location_btn['title'] ); ?>
                        <svg width="31" height="27" viewBox="0 0 31 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_5807_388)">
                                <path d="M11.1021 14.8276C10.4012 13.7119 9.85851 12.5516 9.38368 11.3578C8.96537 10.309 8.66012 9.23795 8.54706 8.12225C8.41139 6.62721 8.67142 5.18795 9.41759 3.84911C10.3107 2.2425 11.6335 1.07101 13.3859 0.468528C16.2801 -0.524447 18.8917 0.0445614 21.1189 2.10861C22.453 3.33588 23.1652 4.88671 23.3461 6.68299C23.4479 7.68712 23.3122 8.6801 23.0522 9.66192C22.6565 11.1123 22.046 12.4735 21.3337 13.79C21.1189 14.1805 20.9041 14.5599 20.6667 14.9615C20.7006 14.9838 20.7345 15.0173 20.7684 15.0396C21.7294 15.5751 22.6904 16.0995 23.6514 16.6239C23.7305 16.6685 23.8549 16.6908 23.9453 16.6685C25.6864 16.3003 27.4161 15.921 29.1572 15.5417C29.4625 15.4747 29.779 15.4078 30.0843 15.352C30.3104 15.3074 30.5365 15.2962 30.74 15.4636C31.0226 15.6979 31.0905 16.0772 30.8417 16.345C30.4347 16.7913 30.0051 17.2264 29.5755 17.6503C28.1736 19.045 26.7717 20.4508 25.3585 21.8454C24.2506 22.9499 23.1313 24.0322 22.046 25.1479C21.6955 25.5161 21.2659 25.6165 20.8023 25.7169C18.8804 26.1297 16.9584 26.5202 15.0365 26.9665C14.5956 27.0669 14.2451 27.0111 13.8607 26.788C11.837 25.6611 9.80198 24.5677 7.77828 23.4408C7.59739 23.3404 7.42781 23.3293 7.23561 23.3962C5.16668 24.1214 3.09775 24.8355 1.01752 25.5495C0.870548 25.6053 0.700964 25.6388 0.542686 25.6276C0.293962 25.6053 0.124378 25.4491 0.0452385 25.2148C-0.0339008 24.9917 -0.0112896 24.7685 0.1696 24.5789C0.723575 24.0322 1.26625 23.4855 1.82022 22.9388C4.26223 20.5289 6.71555 18.1078 9.15757 15.6979C9.36107 15.497 9.59848 15.3408 9.86982 15.2516C10.2768 15.1289 10.6838 14.9838 11.1021 14.8276ZM15.9409 19.2681C15.9862 19.2123 16.0201 19.1454 16.0653 19.1008C17.6368 17.2822 19.0274 15.3408 20.1692 13.221C20.8476 11.9603 21.4355 10.6772 21.7972 9.29373C22.1816 7.80985 22.1816 6.33712 21.5372 4.90902C20.3501 2.30944 17.5237 0.747454 14.3581 1.51729C11.8483 2.11977 9.96026 4.38464 9.81329 6.91729C9.75676 7.82101 9.89243 8.70241 10.1298 9.5615C10.6951 11.6144 11.6787 13.4665 12.8206 15.2516C13.725 16.6685 14.7652 17.9851 15.9409 19.2681ZM13.1937 18.0297C11.7013 19.5024 10.209 20.9751 8.70534 22.459C8.76187 22.4925 8.8297 22.5371 8.90884 22.5706C9.4289 22.8607 9.96026 23.1396 10.4803 23.4185C11.7466 24.1103 13.0128 24.8132 14.279 25.5049C14.3695 25.5495 14.4373 25.6053 14.539 25.5049C16.0766 23.9764 17.6142 22.4479 19.1517 20.9305C20.2936 19.8037 21.4355 18.6656 22.5886 17.5276C22.5434 17.5053 22.5095 17.4718 22.4643 17.4495C21.6955 17.0256 20.938 16.6016 20.1692 16.1665C20.011 16.0772 19.9318 16.0884 19.8301 16.2334C19.05 17.2822 18.2699 18.3309 17.4672 19.3685C17.128 19.8037 16.7549 20.2165 16.3819 20.607C16.0879 20.9194 15.7487 20.9194 15.4435 20.6293C15.1722 20.3727 14.9234 20.1049 14.6747 19.8148C14.1886 19.2346 13.6911 18.621 13.1937 18.0297ZM16.6419 25.2594C16.7323 25.2483 16.7889 25.2483 16.8341 25.2483C18.1229 24.9694 19.4118 24.6904 20.7006 24.4115C20.8476 24.378 21.0172 24.3111 21.1302 24.2107C22.6112 22.7491 24.0697 21.2875 25.5394 19.826C26.3647 19.0003 27.2013 18.1747 28.0379 17.3491C28.1171 17.271 28.1849 17.1818 28.298 17.059C28.1849 17.0702 28.1397 17.0813 28.0945 17.0813C26.9074 17.3379 25.7203 17.5946 24.5332 17.84C24.228 17.907 23.9679 18.0074 23.7305 18.2417C21.4468 20.5177 19.1517 22.7714 16.8567 25.0363C16.7889 25.1032 16.7323 25.1702 16.6419 25.2594ZM3.23342 23.3404C3.24473 23.3516 3.24473 23.3739 3.25603 23.3851C3.32387 23.3739 3.38039 23.3627 3.44823 23.3404C4.64662 22.9165 5.85633 22.5037 7.05472 22.0797C7.19039 22.0351 7.31475 21.957 7.4165 21.8565C9.05581 20.2499 10.6951 18.6322 12.3231 17.0256C12.3684 16.9809 12.3797 16.8694 12.3571 16.8247C12.1875 16.557 12.0066 16.2892 11.8257 16.0214C11.8031 15.9879 11.7126 15.9545 11.6561 15.9768C11.283 16.0995 10.9099 16.2446 10.5368 16.3673C10.2768 16.4454 10.0733 16.5904 9.88112 16.7689C7.71045 18.9222 5.52846 21.0644 3.35778 23.2177C3.30126 23.2623 3.26734 23.2958 3.23342 23.3404Z" fill="white"/>
                                <path d="M15.9297 11.4025C13.759 11.4695 11.7466 9.57277 11.8144 7.18517C11.8709 5.23269 13.5781 3.16864 16.1219 3.28021C18.3604 3.38062 20.1467 5.1769 20.0562 7.53104C19.9658 9.81823 17.9534 11.4583 15.9297 11.4025ZM15.941 4.59674C14.5956 4.4517 13.1033 5.69013 13.1033 7.33021C13.1033 8.85872 14.3582 10.1195 15.8844 10.1306C17.4898 10.1418 18.7448 8.92566 18.7674 7.37484C18.7787 5.67897 17.2411 4.44054 15.941 4.59674Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_5807_388">
                                    <rect width="31" height="27" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>

                    </a>
                <?php endif; ?>

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
</footer>
<?php wp_footer(); ?>
</body>
</html>