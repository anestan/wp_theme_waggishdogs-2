<?php
add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // highlight block
        acf_register_block_type( array(
            'title'			=> __( 'Highlight', 'client_textdomain' ),
            'name'			=> 'highlight',
            'render_template'	=> 'template-parts/blocks/highlight.php',
            'mode'			=> 'preview',
            'supports'		=> [
                'align'			=> false,
                'anchor'		=> true,
                'customClassName'	=> true,
                'jsx' 			=> true,
            ]
        ));
    }
}



?>