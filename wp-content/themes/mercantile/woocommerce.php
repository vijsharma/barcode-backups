<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Mercantile
 */
get_header();
global $mercantile_customizer_all_values;
?>
    <div class="wrapper inner-main-title">
        <div class="container">
            <div class="row">
                <header class="entry-header col-md-6 init-animate fadeInDown1">
                    <h1 class="entry-title">
                        <?php
                        if ( isset( $mercantile_customizer_all_values['mercantile-store-title']) ):
	                        $mercantile_store_title = $mercantile_customizer_all_values['mercantile-store-title'];
                            echo esc_html( $mercantile_store_title );
                        endif; 
                        ?>
                    </h1>
                </header><!-- .entry-header -->
                <?php
                if( 1 == $mercantile_customizer_all_values['mercantile-show-breadcrumb'] ){
                    mercantile_breadcrumbs();
                }
                ?>
            </div>
        </div>
    </div>
    <div id="content" class="site-content container clearfix">
	    <?php
	    $sidebar_layout = mercantile_sidebar_selection(get_the_ID());
	    if( 'both-sidebar' == $sidebar_layout ) {
		    echo '<div id="primary-wrap" class="clearfix">';
	    }
	    ?>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <?php if ( have_posts() ) :
                    woocommerce_content();
                endif;
                ?>
            </main><!-- #main -->
        </div><!-- #primary -->
        <?php
        get_sidebar( 'left' );
        get_sidebar();
        if( 'both-sidebar' == $sidebar_layout ) {
	        echo '</div>';
        }
        ?>
    </div><!-- #content -->
<?php get_footer();