<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width">

    <!-- Set the viewport width to device width for mobile -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header" class="header">
    <div class="container">

        <?php if( $text_top = get_field('header_text_top', 'option') ): ?>
            <div class="header__top-text">
                <?php echo esc_html($text_top); ?>
            </div>
        <?php endif; ?>
        <div class="header__inner">
            <div class="header__logo">
                <?php thm_display_logo(); ?>
            </div>
            <?php if ( has_nav_menu( 'primary_menu' ) ): ?>
                <div class="header__navigation">
                    <nav id="primary-menu">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary_menu', 'container' => false, 'menu_id' => 'menu-header',  'menu_class' => 'list-inline' , 'walker' => new THM_Walker_Nav_Menu() ) ); ?>
                    </nav>
                </div>
            <?php endif; ?>
            <div class="header__buttons">
                <?php
                $btn_e_store = get_field('header_btn_e-store', 'option');
                $btn_connect = get_field('header_btn_connect', 'option');

                if( $btn_e_store ) thm_get_link($btn_e_store, '', array('class' => 'btn btn-store'));
                if( $btn_connect ) thm_get_link($btn_connect, '', array('class' => 'btn btn-connect')); ?>
            </div>
            <button class="navbar-toggle-button js-nav-toggle" type="button" aria-label="<?php _e( 'Toggle Header Menu', THM_TEXT_DOMAIN ); ?>">
                <span class="navbar-toggle-line"></span>
            </button>
        </div>
    </div>
</header>