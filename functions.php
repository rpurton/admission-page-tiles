function create_posttype() {
 
    register_post_type( 'page_button',
//     CPT Options
        array(
            'labels' => array(
                'name' => __( 'Page Buttons' ),
                'singular_name' => __( 'Page Button' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'page_button'),
            'taxonomies' => array('category'),
            'supports' => array('title', 'post-formats', 'custom-fields'),
            'menu_icon' => 'dashicons-excerpt-view',
       )
       );

    register_post_type( 'page_tile',
//     CPT Options
    array(
        'labels' => array(
            'name' => __( 'Page Tiles' ),
            'singular_name' => __( 'Page Tile' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'page_tile'),
        'taxonomies' => array('category'),
        'supports' => array('title', 'post-formats', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'),
        'menu_icon' => 'dashicons-screenoptions',
        'hierarchical' => false,
   )
   );
}