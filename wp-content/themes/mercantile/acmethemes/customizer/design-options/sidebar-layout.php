<?php
/*adding sections for sidebar options */
$wp_customize->add_section( 'mercantile-design-sidebar-layout-option', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Single Post/Page Sidebar Layout', 'mercantile' ),
    'panel'          => 'mercantile-design-panel'
) );

/*Sidebar Layout*/
$wp_customize->add_setting( 'mercantile_theme_options[mercantile-single-sidebar-layout]', array(
    'capability'		=> 'edit_theme_options',
    'default'			=> $defaults['mercantile-single-sidebar-layout'],
    'sanitize_callback' => 'mercantile_sanitize_select'
) );
$choices = mercantile_sidebar_layout();
$wp_customize->add_control( 'mercantile_theme_options[mercantile-single-sidebar-layout]', array(
    'choices'  	=> $choices,
    'label'		=> __( 'Default Sidebar Layout', 'mercantile' ),
    'description'=> __( 'Generally home/front page does not have sidebar', 'mercantile' ),
    'section'   => 'mercantile-design-sidebar-layout-option',
    'settings'  => 'mercantile_theme_options[mercantile-single-sidebar-layout]',
    'type'	  	=> 'select'
) );