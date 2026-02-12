<?php
if ( ! function_exists( 'thm_theme_support_setup' ) ) {
    add_action( 'after_setup_theme', 'thm_theme_support_setup' );
    function thm_theme_support_setup() {
        $defaults = array(
            'height'               => 100,
            'width'                => 300,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => false,
        );

        add_theme_support( 'custom-logo', $defaults );
        add_theme_support('post-thumbnails');
        add_theme_support( 'title-tag' );
    }
}

if ( ! function_exists( 'thm_register_nav_menu' ) ) {
    add_action( 'after_setup_theme', 'thm_register_nav_menu', 0 );
    function thm_register_nav_menu(){
        register_nav_menus( array(
            'primary_menu' => __( 'Header Menu', THM_TEXT_DOMAIN ),
            'footer_menu'  => __( 'Footer Menu', THM_TEXT_DOMAIN ),
            'footer_bottom_menu' => __( 'Footer Bottom Menu', THM_TEXT_DOMAIN ),
        ) );
    }
}

if ( ! function_exists( 'thm_allow_svg_upload' ) ) {
    add_filter('upload_mimes', 'thm_allow_svg_upload');
    function thm_allow_svg_upload($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
}

if ( ! function_exists( 'thm_allow_svg_in_media_library' ) ) {
    add_filter('wp_prepare_attachment_for_js', 'thm_allow_svg_in_media_library', 10, 3);
    function thm_allow_svg_in_media_library($response, $attachment, $meta) {
        $response['width']  = (int) ( $meta['width'] ?? 300 );
        $response['height'] = (int) ( $meta['height'] ?? 300 );
        return $response;
    }
}

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

if (  ! function_exists( 'thm_add_wysiwyg_format_selector' ) ) {
    add_filter( 'mce_buttons_2', 'thm_add_wysiwyg_format_selector' );
    function thm_add_wysiwyg_format_selector( $buttons ) {
        array_unshift( $buttons, 'styleselect' );

        return $buttons;
    }
}

if ( ! function_exists( 'thm_insert_formats_to_select' )) {
    add_filter( 'tiny_mce_before_init', 'thm_insert_formats_to_select' );
    function thm_insert_formats_to_select( $init_array ) {
        $select_values = array(
            array(
                'title'    => 'Format H1',
                'classes'  => 'h1',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format H2',
                'classes'  => 'h2',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format H3',
                'classes'  => 'h3',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format H4',
                'classes'  => 'h4',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format H5',
                'classes'  => 'h5',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format H6',
                'classes'  => 'h6',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Format p',
                'classes'  => 'p',
                'selector' => 'h1,h2,h3,h4,h5,h6,p,li',
                'wrapper'  => false,
            ),
            array(
                'title'    => 'Button Link',
                'classes'  => 'btn',
                'selector' => 'a',
                'wrapper'  => false,
            ),
            array(
                'title'  => 'Small text',
                'inline' => 'small',
            ),
            array(
                'title'  => 'Mark',
                'inline' => 'mark',
            )
        );

        $init_array['style_formats'] = json_encode( $select_values );

        return $init_array;
    }
}

add_editor_style();

 if ( ! function_exists('thm_set_editor_custom_palette_colors_array') ) {
     function thm_set_editor_custom_palette_colors_array() {
         return array(
             array( 'name' => 'Black', 'slug' => 'black', 'color' => '#000000' ),
             array( 'name' => 'Burnt orange', 'slug' => 'burnt-orange', 'color' => '#993300' ),
             array( 'name' => 'Dark olive', 'slug' => 'dark-olive', 'color' => '#333300' ),
             array( 'name' => 'Dark green', 'slug' => 'dark-green', 'color' => '#003300' ),
             array( 'name' => 'Dark azure', 'slug' => 'dark-azure', 'color' => '#003366' ),
             array( 'name' => 'Navy Blue', 'slug' => 'navy-blue', 'color' => '#000080' ),
             array( 'name' => 'Indigo', 'slug' => 'indigo', 'color' => '#333399' ),
             array( 'name' => 'Very dark gray', 'slug' => 'very-dark-gray', 'color' => '#333333' ),
             array( 'name' => 'Marron', 'slug' => 'marron', 'color' => '#800000' ),
             array( 'name' => 'Orange', 'slug' => 'orange', 'color' => '#FF6600' ),
             array( 'name' => 'Olive', 'slug' => 'olive', 'color' => '#808000' ),
             array( 'name' => 'Green', 'slug' => 'green', 'color' => '#008000' ),
             array( 'name' => 'Teal', 'slug' => 'teal', 'color' => '#008080' ),
             array( 'name' => 'Blue', 'slug' => 'blue', 'color' => '#0000FF' ),
             array( 'name' => 'Grayish blue', 'slug' => 'grayish-blue', 'color' => '#666699' ),
             array( 'name' => 'Red', 'slug' => 'red', 'color' => '#FF0000' ),
             array( 'name' => 'Amber', 'slug' => 'amber', 'color' => '#FF9900' ),
             array( 'name' => 'Yellow green', 'slug' => 'yellow-green', 'color' => '#99CC00' ),
             array( 'name' => 'Sea green', 'slug' => 'sea-green', 'color' => '#339966' ),
             array( 'name' => 'Turquoise', 'slug' => 'turquoise', 'color' => '#33CCCC' ),
             array( 'name' => 'Royal blue', 'slug' => 'royal-blue', 'color' => '#3366FF' ),
             array( 'name' => 'Purple', 'slug' => 'purple', 'color' => '#800080' ),
             array( 'name' => 'Medium gray', 'slug' => 'medium-gray', 'color' => '#999999' ),
             array( 'name' => 'Magenta', 'slug' => 'magenta', 'color' => '#FF00FF' ),
             array( 'name' => 'Gold', 'slug' => 'gold', 'color' => '#FFCC00' ),
             array( 'name' => 'Yellow', 'slug' => 'yellow', 'color' => '#FFFF00' ),
             array( 'name' => 'Lime', 'slug' => 'lime', 'color' => '#00FF00' ),
             array( 'name' => 'Aqua', 'slug' => 'aqua', 'color' => '#00FFFF' ),
             array( 'name' => 'Sky blue', 'slug' => 'sky-blue', 'color' => '#00CCFF' ),
             array( 'name' => 'Brown', 'slug' => 'brown', 'color' => '#993366' ),
             array( 'name' => 'Silver', 'slug' => 'silver', 'color' => '#C0C0C0' ),
             array( 'name' => 'Pink', 'slug' => 'pink', 'color' => '#FF99CC' ),
             array( 'name' => 'Peach', 'slug' => 'peach', 'color' => '#FFCC99' ),
             array( 'name' => 'Light yellow', 'slug' => 'light-yellow', 'color' => '#FFFF99' ),
             array( 'name' => 'Pale green', 'slug' => 'pale-green', 'color' => '#CCFFCC' ),
             array( 'name' => 'Pale cyan', 'slug' => 'pale-cyan', 'color' => '#CCFFFF' ),
             array( 'name' => 'Light sky blue', 'slug' => 'light-sky-blue', 'color' => '#99CCFF' ),
             array( 'name' => 'Plum', 'slug' => 'plum', 'color' => '#CC99FF' ),
             array( 'name' => 'White', 'slug' => 'white', 'color' => '#FFFFFF' )
         );
     }
 }

 if ( ! function_exists( 'thm_set_editor_custom_palette_colors' ) ) {
     add_filter( 'tiny_mce_before_init', 'thm_set_editor_custom_palette_colors' );
     function thm_set_editor_custom_palette_colors( $settings ) {
         /* Default Editor Colors */
         $default_editor_colors = thm_set_editor_custom_palette_colors_array();

         /* Custom Editor Colors */
         $additional_editor_colors = array(
             array(
                 "name" => "Brand Scarlet",
                 "color" => "#FF3800"
             )
         );

         $editor_palette_array = array_merge( $default_editor_colors, $additional_editor_colors );
         $editor_palette = '';

         foreach ( $editor_palette_array as $color ) {
             $editor_palette .= '"' . str_replace( '#', '', $color['color'] ) . '","' . $color['name'] . '",';
         }

         $settings['textcolor_map']  = '[' . $editor_palette . ']';
         $settings['textcolor_rows'] = ceil( count(  $editor_palette_array ) / 8 );

         return $settings;
     }
}

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Excerpt length and more
if ( ! function_exists('thm_excerpt_length')) {
    function thm_excerpt_length() {
        return 20;
    }
    
    add_filter( 'excerpt_length', 'thm_excerpt_length', 999 );
}

if ( ! function_exists('thm_excerpt_more')) {
    function thm_excerpt_more() {
        return '...';
    }
    
    add_filter('excerpt_more', 'thm_excerpt_more');
}


// Logo from customizer to login page
 if ( ! function_exists('thm_login_logo') ) {
     add_action('login_enqueue_scripts', 'thm_login_logo');

     function thm_login_logo() {
         ob_start();

         if ( has_custom_logo() ) {
             $custom_logo_id = get_theme_mod('custom_logo');
             $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

             if ( $logo !== false ) {
                 echo '<style>
                    #login h1 a, .login h1 a {
                        background-image: url(' . esc_url($logo[0]) . ');
                        max-width: 100%;
                        width: auto;
                        height: auto;
                        background-size: contain;
                        background-repeat: no-repeat;
                        padding-bottom: 30px;
                    }
                    .login h1 {
                        width: auto;
                    }
                </style>';
             }
         }

         $styles = ob_get_clean();
         echo $styles;
     }
 }

 if ( ! function_exists( 'thm_theme_lazy_load' ) ) {
	 add_filter('wp_get_attachment_image_attributes',  'thm_theme_lazy_load', 10, 1);

	 function thm_theme_lazy_load($attr) {
		 if (
			 wp_doing_ajax() ||
			 ( !empty($attr['class']) && ( strpos($attr['class'], 'skip-lazy') !== false || strpos($attr['class'], 'custom-logo') !== false ) )
		 ) {
			 return $attr;
		 }

		 if (isset($attr['class'])) {
			 $attr['class'] = !empty($attr['class']) ? $attr['class'] . ' thm-lazy-loading' : 'thm-lazy-loading';
		 }

		 if (isset($attr['src'])) {
			 $attr['data-src'] = $attr['src'];
			 unset($attr['src']);
		 }

		 if (isset($attr['srcset'])) {
			 $attr['data-srcset'] = $attr['srcset'];
			 unset($attr['srcset']);
		 }

		 if (isset($attr['sizes'])) {
			 $attr['data-sizes'] = $attr['sizes'];
			 unset($attr['sizes']);
		 }

		 unset($attr['loading']);

		 return $attr;
	 }
 }

 if ( ! function_exists( 'thm_theme_svg_sprites' ) ) {
	 add_action('wp_footer', 'thm_theme_svg_sprites', 999);

	 function thm_theme_svg_sprites() {
		 get_template_part('parts/svg-sprites');
	 }
 }
