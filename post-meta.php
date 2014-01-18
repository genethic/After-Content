<?php

/* == POST META == */

function afc_post_meta() {
	
	global $post;
	global $smof_data;
	$post_ID = $post->ID;

	$post_meta_keys = get_post_custom_keys($post_ID);
	
	$output = '<ul class="afc-post-meta">';
	
	$exclude = $smof_data['afc_exclude_meta'];
	$exclude_array = explode(',', $exclude);
	$count = count($exclude_array);
	for ($i=0; $i <= $count; $i++) {
		$exclude_array[$i] = trim($exclude_array[$i]);
		if (in_array($exclude_array[$i], $post_meta_keys)) {
			$keyx = array_search($exclude_array[$i], $post_meta_keys);
			unset($post_meta_keys[$keyx]);
		}
	}
	
	foreach($post_meta_keys as $key) {
		$post_meta_value = get_post_meta( $post_ID, $key, true );
		if ( '_' == $key{0} )
		continue;
		$output .= '<li><span>' . $key . ':</span> ' . $post_meta_value . '</li>';	
	}

	$output .= '</ul>';
	
	return $output;
}

?>