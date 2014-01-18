<?php

/* == Text == */

function afc_text() {
	
	global $smof_data;
	$output;
	
	if($smof_data['afc_after_post_text']) {
		$output .= '<div class="afc-text">' . $smof_data['afc_after_post_text'] . '</div>';
	}
	
	return $output;
}

?>