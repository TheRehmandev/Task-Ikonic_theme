<?php
	$labels = array(
		'name'              => _x( 'Project Types', 'taxonomy general name', 'noors-task' ),
		'singular_name'     => _x( 'Project Type', 'taxonomy singular name', 'noors-task' ),
		'search_items'      => __( 'Search Project Types', 'noors-task' ),
		'all_items'         => __( 'All Project Types', 'noors-task' ),
		'parent_item'       => __( 'Parent Project Type', 'noors-task' ),
		'parent_item_colon' => __( 'Parent Project Type:', 'noors-task' ),
		'edit_item'         => __( 'Edit Project Type', 'noors-task' ),
		'update_item'       => __( 'Update Project Type', 'noors-task' ),
		'add_new_item'      => __( 'Add New Project Type', 'noors-task' ),
		'new_item_name'     => __( 'New Project Type Name', 'noors-task' ),
		'menu_name'         => __( 'Project Type', 'noors-task' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'noors-task' ),
		'hierarchical' => false,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);