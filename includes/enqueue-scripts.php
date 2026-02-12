<?php
if ( ! function_exists( 'thm_enqueue_critical_resources' ) ) {
	function thm_enqueue_critical_resources() {
		$fonts_css_file  = get_template_directory() . '/dist/css/fonts.css';
		$global_css_file = get_template_directory() . '/dist/css/global.css';
		$header_css_file = get_template_directory() . '/dist/css/header.css';

		if ( file_exists($fonts_css_file) ) {
			$fonts_css_critical = file_get_contents($fonts_css_file);

			wp_register_style( 'thm-critical-fonts-style', false );
			wp_enqueue_style( 'thm-critical-fonts-style' );
			wp_add_inline_style( 'thm-critical-fonts-style', $fonts_css_critical );
		}

		if ( file_exists($global_css_file) ) {
			$global_css_critical = file_get_contents($global_css_file);

			wp_register_style( 'thm-critical-global-style', false );
			wp_enqueue_style( 'thm-critical-global-style' );
			wp_add_inline_style( 'thm-critical-global-style', $global_css_critical );
		}

		if ( file_exists($header_css_file) ) {
			$header_css_critical = file_get_contents($header_css_file);

			wp_register_style( 'thm-critical-header-style', false );
			wp_enqueue_style( 'thm-critical-header-style' );
			wp_add_inline_style( 'thm-critical-header-style', $header_css_critical );
		}
	}
}

if ( ! function_exists( 'thm_enqueue_resources' ) ) {
    add_action( 'wp_enqueue_scripts', 'thm_enqueue_resources' );

    function thm_enqueue_resources() {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
        wp_dequeue_style( 'wc-block-style' );
        wp_dequeue_style( 'storefront-gutenberg-blocks' );

        /* Critical CSS */
        if ( function_exists( 'thm_enqueue_critical_resources' ) ) {
	        thm_enqueue_critical_resources();
        }

        /* Styles */
	    wp_enqueue_style( 'thm-footer-style', get_template_directory_uri() . '/dist/css/footer.css', array(), THM_VERSION, 'screen' );

        if ( is_404() ) {
            wp_enqueue_style( 'thm-404-style', get_template_directory_uri() . '/dist/css/pages/404.css', array(), THM_VERSION, 'screen' );
        }
        /* Scripts */
        wp_enqueue_script( 'thm-lazy-load', get_template_directory_uri() . '/dist/js/thm-lazy-load.min.js', array(), THM_VERSION, array(
			'in_footer' => true,
	        'strategy'  => 'defer'
        ) );

        wp_enqueue_script( 'thm-header-script', get_template_directory_uri() . '/dist/js/header.min.js', array('jquery'), THM_VERSION, array(
            'in_footer' => true,
            'strategy'  => 'defer'
        ) );
        
        /*Localize*/
        wp_localize_script( 'thm-header-script', 'thmLocalize', array(
            'ajaxUrl' => admin_url( 'admin-ajax.php' ),
            'themeUrl' => get_template_directory_uri()
        ) );

        //Libs
        wp_register_script( 'thm-fancybox', get_template_directory_uri() . '/dist/js/libs/fancybox.min.js', array(), THM_VERSION, array(
            'in_footer' => true,
            'strategy'  => 'defer'
        ) );

        wp_register_script( 'thm-aos', get_template_directory_uri() . '/dist/js/libs/aos.min.js', array(), THM_VERSION, array(
            'in_footer' => true,
            'strategy'  => 'defer'
        ));

        /*  Flexible Content */
	    thm_enqueue_scripts_flexible_sections();
    }
}

if ( ! function_exists( 'thm_enqueue_scripts_flexible_sections' ) ) {
	function thm_enqueue_scripts_flexible_sections() {
		$id                = get_the_ID();
        $flexible_sections = array(
                'main-hero' => array(
                        'css' => array(
                                'path'   => '/dist/css/flexible/flexible-main-hero.css',
                                'deps'   => array(),
                                'inline' => true
                        ),
                        'js' => array(
                                'path'     => '/dist/js/flexible/flexible-main-hero.min.js',
                                'deps'     => array(),
                                'strategy' => array(
                                        'in_footer'  => true,
                                        'strategy'   => 'defer'
                                )
                        )
                ),
                'our-services' => array(
                        'css' => array(
                                'path'   => '/dist/css/flexible/flexible-our-services.css',
                                'deps'   => array(),
                                'inline' => false
                        ),
                        'js' => array(
                                'path'     => '/dist/js/flexible/flexible-our-services.min.js',
                                'deps'     => array(),
                                'strategy' => array(
                                        'in_footer'  => true,
                                        'strategy'   => 'defer'
                                )
                        )
                ),
                'news' => array(
                        'css' => array(
                                'path'   => '/dist/css/flexible/flexible-news.css',
                                'deps'   => array(),
                                'inline' => false
                        ),
                        'js' => array(
                                'path'     => '/dist/js/flexible/flexible-news.min.js',
                                'deps'     => array(),
                                'strategy' => array(
                                        'in_footer'  => true,
                                        'strategy'   => 'defer'
                                )
                        )
                ),
                'fancy-box-gallery' => array(
                        'css' => array(
                                'path'   => '/dist/css/flexible/flexible-fancy-box-gallery.css',
                                'deps'   => array(),
                                'inline' => false
                        ),
                        'js' => array(
                                'path'     => '/dist/js/flexible/flexible-fancy-box-gallery.min.js',
                                'deps'     => array('thm-fancybox', 'thm-aos'),
                                'strategy' => array(
                                        'in_footer'  => true,
                                        'strategy'   => 'defer'
                                )
                        )
                )
        );


        if ( is_archive() ) {
			$archive_slug = get_query_var( 'post_type' );
			$id = $archive_slug;
		}

		if ( is_tax() ) {
			$term = get_queried_object();
			$id = $term;
		}

		if (  have_rows( 'flexible_content', $id ) ) {
			foreach ( $flexible_sections as $key => $value ) {
				$css = $value['css'] ?? false;
                $js  = $value['js'] ?? false;

                if ( $css ) {
                    if ( ! ($css['inline'] ?? false) ) {
                        wp_register_style( 'thm-flexible-' . $key, get_template_directory_uri() . $css['path'] ?? '', $css['deps'] ?? array(), THM_VERSION, 'screen' );
                    } else {
                        wp_register_style( 'thm-flexible-' . $key, false );
                    }
                }

                if ( $js ) {
                    wp_register_script( 'thm-flexible-' . $key, get_template_directory_uri() . $js['path'] ?? '', $js['deps'] ?? array(), THM_VERSION, $js['strategy'] ?? true );
                }
			}

			while ( have_rows( 'flexible_content', $id ) ) {
				the_row();

				$handle  = 'thm-flexible-' . str_replace( '_', '-', get_row_layout() );
				$section = $flexible_sections[ str_replace( '_', '-', get_row_layout() ) ] ?? false;

                if ( $section ) {
                    $css = $section['css'] ?? false;
                    $js  = $section['js'] ?? false;

                    if ( $css && ! wp_style_is( $handle, 'enqueued' ) ) {
                        $inline = $section['css']['inline'] ?? false;

	                    wp_enqueue_style( $handle );

                        if ( $inline ) {
                            $path = get_template_directory() . $css['path'] ?? '';

                            if ( file_exists( $path ) ) {
                                $css_content = file_get_contents( get_template_directory() . $css['path'] ?? '' );
                                wp_add_inline_style( $handle, $css_content );
                            }
                        }
                    }

	                if ( $js && ! wp_script_is( $handle, 'enqueued' ) ) {
		                wp_enqueue_script( $handle );
	                }
                }
			}
		}
	}
}

if ( ! function_exists( 'thm_disable_jquery_migrate' ) ) {
	add_action('wp_default_scripts', 'thm_disable_jquery_migrate');

	function thm_disable_jquery_migrate( $scripts ) {
		if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];

			if ( $script->deps ) {
				$script->deps = array_diff( $script->deps, [ 'jquery-migrate' ] );
			}
		}
	}
}

if ( ! function_exists( 'thm_defer_default_scripts' ) ) {
	add_filter('script_loader_tag', 'thm_defer_default_scripts', 10, 3);

    function thm_defer_default_scripts($tag, $handle, $src) {
	    $defer_scripts = ['jquery', 'jquery-core', 'jquery-migrate'];

	    if ( ! is_user_logged_in() && in_array( $handle, $defer_scripts, true ) ) {
		    if (false === strpos($tag, 'defer')) {
			    return '<script id="' . $handle . '-js" src="' . esc_url($src) . '" defer></script>';
		    }
	    }

	    return $tag;
    }
}

if ( ! function_exists( 'thm_preload_fonts' ) ) {
	add_action( 'wp_head', 'thm_preload_fonts' );

	function thm_preload_fonts() {
		?>
		<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/src/fonts/lato/Lato-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<link rel="preload" href="<?php echo get_template_directory_uri(); ?>/src/fonts/roboto/Roboto-Regular.woff2" as="font" type="font/woff2" crossorigin="anonymous">
		<?php
	}

}