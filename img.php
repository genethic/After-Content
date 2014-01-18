<?php

/* == Image == */

function afc_img() {
	
	global $smof_data;
	$output;
	
	if($smof_data['afc_after_post_img']) {
		$output .= '<div class="afc-image"><img src="' . $smof_data['afc_after_post_img'] . '"/></div>';
	}
	
	return $output;
}

?>