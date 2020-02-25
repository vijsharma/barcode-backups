<?php
/**
 * Add ... for more view
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return null
 *
 */

if ( !function_exists('mercantile_excerpt_more') ) :
    function mercantile_excerpt_more($more) {
		if( is_admin() ){
			return $more;
		}
        return '&hellip;';
    }
endif;
add_filter('excerpt_more', 'mercantile_excerpt_more');