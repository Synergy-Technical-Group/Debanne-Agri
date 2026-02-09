<?php
if ( ! function_exists( 'thm_display_logo' ) ) {
    function thm_display_logo( $heading_wrap = true ) {
        ob_start();

            if ( has_custom_logo() ) :
                the_custom_logo(); ?>
                <span class="logo-title"><?php echo get_bloginfo( 'name' ); ?></span>
            <?php else: ?>
                <a class="custom-logo-link" href="<?php echo home_url(); ?>" aria-label="<?php echo get_bloginfo( 'name' ); ?>">
                    <?php echo get_bloginfo( 'name' ); ?>
                </a>
            <?php endif;

        $logo_content =  ob_get_clean();

        if (  $heading_wrap ) {
            echo '<div class="site-logo">' . $logo_content . '</div>';
        } else {
            echo $logo_content;
        }
    }
}

if ( ! function_exists( 'thm_get_link' ) ) {
    function thm_get_link( $link, $content = '', $attrs = array(), $display = true, $content_before_title = true ) {
        $link_url     = '#';
        $link_attrs   = '';
        $link_content = $content;

        if ( isset( $link ) && ! empty( $link_url ) ) {
            if ( gettype( $link ) === 'string' ) {
                $link_url = $link;
            } else {
                $link_url = $link['url'];

                if ( $content_before_title ) {
                    $link_content = $content . $link['title'];
                } else {
                    $link_content = $link['title'] . $content;
                }

                if ( $link['target'] == '_blank' ) {
                    $attrs['target'] = $link['target'];
                }
            }

            if ( count( $attrs ) > 0 )  {
                foreach ( $attrs as $attr_name => $attr_value ) {
                    $link_attrs .= sprintf( ' %s="%s"', $attr_name, $attr_value );
                }
            }
        }

        $result = sprintf(  '<a href="%s" %s>%s</a>', $link_url, $link_attrs, $link_content );

        if ( $display ) {
            echo $result;
        } else {
            return $result;
        }

        return true;
    }
}

if ( ! function_exists( 'thm_display_no_img' ) ) {
    function thm_display_no_img( $display = true, $title = '' ) {
        if ( empty( $title ) ) {
            $title = get_the_title() ?? get_blog_info( 'name' );
        }
	    $width = 300;
        $height = 300;

        $image = sprintf( '<img src="%s/src/images/sg-no-image.svg" width="%s" height="%s" alt="%s">', get_template_directory_uri(), $width, $height, $title );

        if ( $display ) {
            echo $image;
        } else {
            return $image;
        }

        return '';
    }
}

if ( ! function_exists( 'thm_get_attachment_by_id' ) ) {
    function thm_get_attachment_by_id( $id = -1, $size = 'full', $mobile_size = 'medium', $icon = false, $attr = array() ) {
        $display_size = ( wp_is_mobile() ? $mobile_size : $size );
        $image = wp_get_attachment_image( $id, $display_size, $icon, $attr );

       if ( $image ) {
           return $image;
       } else {
           return thm_display_no_img( false );
       }
    }
}

if ( ! function_exists( 'thm_pagination' ) ) {
    function thm_pagination( $query = '') {
        if ( ! isset( $query ) || empty( $query ) ) {
            global $wp_query;
            $query = $wp_query;
        }

        $big_int       = 999999999;
        $page          = ( ( $query->query_vars['paged'] ?? 0 ) > 0 ) ? $query->query_vars['paged'] : ( $query->query_vars['page'] ?? 1 );

        $pagination_args = array(
            'base'      => str_replace( $big_int, '%#%', get_pagenum_link( $big_int ) ),
            'format'    => 'paged=%#%',
            'current'   => max( 1, $page ),
            'total'     => $query->max_num_pages,
            'prev_next' => true,
            'prev_text' => '<span class="prev-page-arrow"><</span>',
            'next_text' => '<span class="next-page-arrow">></span>',
        );

        if ( $pagination = paginate_links( $pagination_args ) ) {
            echo  '<div class="pagination">' . $pagination . '</div>';
        }
    }
}

if ( ! function_exists( 'thm_get_tel_format' ) ) {
    function thm_get_tel_format( $phone ) {
        return preg_replace( '/\D/', '', $phone );
    }
}

if ( ! function_exists( 'thm_display_gform' ) ) {
    function thm_display_gform ( $form_id, $ajax = 'true', $title = 'false', $description = 'false', $args = array() ) {
        if ( ! class_exists('THM_ACF_Gravity_Form_Field') && ! $form_id ) {
            return;
        }

        $shortcode_args = "";

        if ( is_array( $args ) && count( $args ) > 0 ) {
            foreach ( $args as $key => $value ) {
                $shortcode_args .= ' ' . $key . '="' . $value . '"';
            }
        }

        echo do_shortcode( '[gravityform id="' . $form_id . '" ajax="' . ( (string) $ajax ) . '" title="' . $title . '" description="' . $description . '"' . $shortcode_args . ']' );
    }
}

if ( ! function_exists( 'thm_display_flexible_content' ) ) {
    function thm_display_flexible_content( $post_id = '', $name = 'flexible_content' ) {
        if (  ! isset( $post_id ) || empty( $post_id ) ) {
            $post_id = get_the_ID();
        }

        ob_start();
            if (have_rows($name, $post_id)):
                $i = 0;
                while (have_rows($name, $post_id)): the_row();
                    get_template_part('parts/flexible/flexible', str_replace('_', '-', get_row_layout()), array('i' => $i++));
                endwhile;
            endif;
	    echo ob_get_clean();
    }
}
