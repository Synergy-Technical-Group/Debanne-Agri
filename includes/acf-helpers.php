<?php
if ( ! function_exists( 'thm_acf_redeclare_functions' ) ) {
	add_action( 'wp', 'thm_acf_redeclare_functions', PHP_INT_MAX );

	function thm_acf_redeclare_functions() {
		if ( ! class_exists('ACF') ) {
			if ( ! function_exists( 'get_field' ) ) {
				function get_field( $field = '', $id = '' ) {
					return '';
				}
			}

			if ( ! function_exists( 'the_field' ) ) {
				function the_field( $field = '', $id = '' ) {
					echo '';
				}
			}

			if ( ! function_exists( 'have_rows' ) ) {
				function have_rows( $field = '', $id = '' ) {
					return false;
				}
			}
		}
	}
}

if ( ! function_exists('thm_acf_include') ) {
    add_action('acf/init', 'thm_acf_include', PHP_INT_MAX);

    function thm_acf_include() {
	    if( function_exists('acf_add_options_page') ) {
		    acf_add_options_page(array(
			    'page_title' => __( 'Theme General Settings', THM_TEXT_DOMAIN ),
			    'menu_title' => __( 'Theme Settings', THM_TEXT_DOMAIN ),
			    'menu_slug'  => 'theme-general-settings',
			    'capability' => 'edit_posts',
			    'redirect'   => false
		    ));
	    }

        //Additional fields
        include_once(get_template_directory() . '/includes/classes/class-thm-acf-gravity-form-field.php');
    }
}



if ( ! function_exists( 'thm_acf_json_save_point' ) ) {
    add_filter( 'acf/settings/save_json', 'thm_acf_json_save_point' );
    function thm_acf_json_save_point() {
        return get_template_directory() . '/acf-json';
    }
}

if ( ! function_exists( 'thm_acf_json_load_point' ) ) {
    add_filter( 'acf/settings/load_json', 'thm_acf_json_load_point' );
    function thm_acf_json_load_point( $paths ) {
        unset($paths[0]);

        // Append the new path and return it.
        $paths[] = get_template_directory() . '/acf-json';

        return $paths;
    }
}

if ( ! function_exists('thm_acf_add_taxonomy_category') ) {
	function thm_acf_add_taxonomy_category() {
		$args = array(
			'label' => 'ACF Categories',
			'singular_label' => 'ACF Category',
			'rewrite' => array(
				'slug' => 'acf-category',
				'with_front' => false
			),
			'hierarchical' => true
		);

		register_taxonomy('acf_category', array('acf-field-group'), $args);

		if (taxonomy_exists('acf_category')) {
			$default_terms = array('Options', 'Flexible Group', 'Post/Pages', 'Taxonomies');

			foreach ($default_terms as $term_name) {
				if (!term_exists($term_name, 'acf_category')) {
					wp_insert_term($term_name, 'acf_category');
				}
			}
		}
	}

	add_action('acf/init', 'thm_acf_add_taxonomy_category');

	add_filter('views_edit-acf-field-group', function($views) {
		$taxonomy = 'acf_category';
		$terms = get_terms([
			'taxonomy' => $taxonomy,
			'hide_empty' => false,
		]);

		if (empty($terms) || is_wp_error($terms)) {
			return $views;
		}

		foreach ($terms as $term) {
			$class = (isset($_GET[$taxonomy]) && (int) $_GET[$taxonomy] === $term->term_id) ? 'current' : '';
			$url = add_query_arg([$taxonomy => $term->term_id]);

			$views[$term->slug] = sprintf(
				'<a href="%s" class="%s">%s <span class="count">(%d)</span></a>',
				esc_url($url),
				$class,
				esc_html($term->name),
				$term->count
			);
		}

		return $views;
	});

	add_action('pre_get_posts', function($query) {
		if (!is_admin() || !$query->is_main_query()) {
			return;
		}

		global $pagenow;

		if ($pagenow === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'acf-field-group') {
			if (!empty($_GET['acf_category'])) {
				$term_id = (int) $_GET['acf_category'];

				if (isset($query->query_vars['acf_category'])) {
					unset($query->query_vars['acf_category']);
				}

				$query->set('tax_query', [
					[
						'taxonomy' => 'acf_category',
						'field'    => 'term_id',
						'terms'    => $term_id,
					],
				]);
			}
		}
	});

	add_filter('acf/location/rule_types', function($choices) {
		$choices['Custom']['сlone_location'] = __('Clone Location', THM_TEXT_DOMAIN);
		return $choices;
	});
}
