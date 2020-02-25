<?php
/**
 * Mercantile sidebar layout options
 *
 * @since Mercantile  1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( !function_exists('mercantile_sidebar_layout_options') ) :
    function mercantile_sidebar_layout_options() {
        $mercantile_sidebar_layout_options = array(
	        'default-sidebar' => array(
		        'value'     => 'default-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/default-sidebar.png'
	        ),
	        'left-sidebar' => array(
		        'value'     => 'left-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/left-sidebar.png'
	        ),
	        'right-sidebar' => array(
		        'value' => 'right-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/right-sidebar.png'
	        ),
	        'both-sidebar' => array(
		        'value' => 'both-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/both-sidebar.png'
	        ),
	        'middle-col' => array(
		        'value'     => 'middle-col',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/middle-col.png'
	        ),
	        'no-sidebar' => array(
		        'value'     => 'no-sidebar',
		        'thumbnail' => get_template_directory_uri() . '/acmethemes/images/no-sidebar.png'
	        )
        );
        return apply_filters( 'mercantile_sidebar_layout_options', $mercantile_sidebar_layout_options );
    }
endif;

/**
 * Custom Metabox
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if( !function_exists( 'mercantile_meta_add_sidebar' )):
    function mercantile_meta_add_sidebar() {
        add_meta_box(
            'mercantile_sidebar_layout', // $id
            __( 'Sidebar Layout', 'mercantile' ), // $title
            'mercantile_meta_sidebar_layout_callback', // $callback
            'post', // $page
            'normal', // $context
            'high'
        ); // $priority

        add_meta_box(
            'mercantile_sidebar_layout', // $id
            __( 'Sidebar Layout', 'mercantile' ), // $title
            'mercantile_meta_sidebar_layout_callback', // $callback
            'page', // $page
            'normal', // $context
            'high'
        ); // $priority
    }
endif;
add_action('add_meta_boxes', 'mercantile_meta_add_sidebar');

/**
 * Callback function for metabox
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('mercantile_meta_sidebar_layout_callback') ) :
    function mercantile_meta_sidebar_layout_callback(){
        global $post;
        $mercantile_sidebar_layout_options = mercantile_sidebar_layout_options();
        $mercantile_sidebar_layout = 'default-sidebar';
        $mercantile_sidebar_meta_layout = get_post_meta( $post->ID, 'mercantile_sidebar_layout', true );
        if( !mercantile_is_null_or_empty($mercantile_sidebar_meta_layout) ){
            $mercantile_sidebar_layout = $mercantile_sidebar_meta_layout;
        }
        wp_nonce_field( basename( __FILE__ ), 'mercantile_sidebar_layout_nonce' );
        ?>
        <style>
            .hide-radio{
                position: relative;
                margin-bottom: 6px;
            }

            .hide-radio img, .hide-radio label{
                display: block;
            }

            .hide-radio input[type="radio"]{
                position: absolute;
                left: 50%;
                top: 50%;
                opacity: 0;
            }

            .hide-radio input[type=radio] + label {
                border: 3px solid #F1F1F1;
            }

            .hide-radio input[type=radio]:checked + label {
                border: 3px solid #F88C00;
            }
        </style>
        <table class="form-table page-meta-box">
            <tr>
                <td colspan="4"><h4><?php _e( 'Choose Sidebar Template', 'mercantile' ); ?></h4></td>
            </tr>
            <tr>
                <td>
                    <?php
                    foreach ($mercantile_sidebar_layout_options as $field) {
                        ?>
                        <div class="hide-radio radio-image-wrapper" style="float:left; margin-right:30px;">
                            <input id="<?php echo $field['value']; ?>" type="radio" name="mercantile_sidebar_layout" value="<?php echo $field['value']; ?>" <?php checked( $field['value'], $mercantile_sidebar_layout ); ?>/>
                            <label class="description" for="<?php echo $field['value']; ?>">
                                <img src="<?php echo esc_url( $field['thumbnail'] ); ?>" alt="" />
                            </label>
                        </div>
                    <?php } // end foreach
                    ?>
                    <div class="clear"></div>
                </td>
            </tr>
            <tr>
                <td><em class="f13"><?php _e( 'You can set up the sidebar content', 'mercantile' ); ?> <a href="<?php echo admin_url('/widgets.php'); ?>"><?php _e( 'here', 'mercantile' ); ?></a></em></td>
            </tr>
        </table>
    <?php
}
endif;

/**
 * save the custom metabox data
 * @hooked to save_post hook
 *
 * @since Mercantile 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('mercantile_save_sidebar_layout') ) :
    function mercantile_save_sidebar_layout( $post_id ) {
        /*
          * A Guide to Writing Secure Themes – Part 4: Securing Post Meta
          *https://make.wordpress.org/themes/2015/06/09/a-guide-to-writing-secure-themes-part-4-securing-post-meta/
          * */
        if (
            !isset( $_POST[ 'mercantile_sidebar_layout_nonce' ] ) ||
            !wp_verify_nonce( $_POST[ 'mercantile_sidebar_layout_nonce' ], basename( __FILE__ ) ) || /*Protecting against unwanted requests*/
            ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || /*Dealing with autosaves*/
            ! current_user_can( 'edit_post', $post_id )/*Verifying access rights*/
        ){
            return;
        }
        //Execute this saving function
        if(isset($_POST['mercantile_sidebar_layout'])){
            $old = get_post_meta( $post_id, 'mercantile_sidebar_layout', true);
            $new = sanitize_text_field($_POST['mercantile_sidebar_layout']);
            if ($new && $new != $old) {
                update_post_meta($post_id, 'mercantile_sidebar_layout', $new);
            } elseif ('' == $new && $old) {
                delete_post_meta($post_id,'mercantile_sidebar_layout', $old);
            }
        }
    }
endif;
add_action('save_post', 'mercantile_save_sidebar_layout');