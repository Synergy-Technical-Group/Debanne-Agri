<?php
$footer_logo = get_field( 'footer_logo', 'option' );
$copyright   = get_field( 'copyright', 'option' );
?>
<footer id="footer" class="footer">
    <div class="container">
        <div class="footer__logo">
		    <?php if ( $footer_logo ): ?>
                <a href="<?php echo home_url(); ?>">
                    <span class="custom-logo-link">
                        <?php echo wp_get_attachment_image( $footer_logo, 'medium' ); ?>
                    </span>
                </a>
		    <?php else:
			    thm_display_logo( false );
		    endif; ?>
        </div>
        <div class="footer__navigation">
		    <?php if ( has_nav_menu( 'footer_menu' ) ): ?>
                <nav id="footer-menu">
				    <?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu_class' => 'list-inline', 'container'=> false, 'depth' => 1) ); ?>
                </nav>
		    <?php endif; ?>
        </div>
    </div>
    <?php if ( $copyright ): ?>
        <div class="footer__copyright">
            <div class="container">
                <div class="footer__copyright-text">
                    <?php echo $copyright; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>