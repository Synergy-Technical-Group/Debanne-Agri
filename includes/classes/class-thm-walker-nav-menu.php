<?php

if ( ! class_exists(  'THM_Walker_Nav_Menu') ) {
    class THM_Walker_Nav_Menu extends Walker_Nav_Menu {
        private $curItem;

        function start_lvl( &$output, $depth = 0, $args = array() ) {
            $output .= '<ul class="sub-menu">';
        }
        function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
            global $wp_query;

            $this->curItem = $item;

            $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

            // depth dependent classes
            $depth_classes = array(
                ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
                ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
                ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
                'menu-item-depth-' . $depth
            );
            $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

            // passed classes
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;

            $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

            // build html
            $output .= $indent . '<li id="menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

            // link attributes
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

            $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
                $args->before,
                $attributes,
                $args->link_before,
                apply_filters( 'the_title', $item->title, $item->ID ) . ( in_array( 'menu-item-has-children', $item->classes ) ? '<span class="menu-chevron"><svg class="icon" width="18" height="18"><use xlink:href="#icon-chevron"></use></svg></span>' : false ),
                $args->link_after,
                $args->after
            );

            // build html
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
}