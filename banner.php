<?php

/* == Text == */

function afc_banner() {
	
	global $smof_data;
	$output;
	
	if($smof_data['afc_adsense_banner_code']) {
		$output .= '<div class="afc-banner">' .  $smof_data['afc_adsense_banner_code'] . '</div>';
	}
	
	return $output;
}

?>