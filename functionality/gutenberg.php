<?php

// changes width for gutenberg

function redlum_gutenberg_width() {
  echo '<style>
    @media screen and ( min-width: 768px ) {
    .editor-post-title {
      display:none;
    }
    .edit-post-visual-editor .editor-post-title,
    .edit-post-visual-editor .editor-block-list__block {
        max-width:	1100px;
      }
    }
  </style>';
}

add_action('admin_head', 'redlum_gutenberg_width');


// no gutenberg for posts

function redlum_gutenberg_cpt( $can_edit, $post_type ) {
	$gutenberg_supported_types = array( 'page' );
	if ( ! in_array( $post_type, $gutenberg_supported_types, true ) ) {
		$can_edit = false;
	}
	return $can_edit;
}
add_filter( 'gutenberg_can_edit_post_type', 'redlum_gutenberg_cpt', 10, 2 );
