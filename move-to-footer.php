<?php
add_action("wp_enqueue_scripts",function() {
	// Styles to be removed from head and placed in footer.
	$remove_these_from_head = array(
	
		"add-script-ids-here",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
	
	);
	$remove_these_for_sure = array("extra-fonts","et-builder-module-design-424-cached-inline");
	foreach($remove_these_for_sure as $rm){
		wp_dequeue_style($rm);	
	}
	foreach($remove_these_from_head as $rmh){
		wp_dequeue_style($rmh);	
	}
},10,2);
add_action("wp_footer",function() {
	// Styles to be removed from head and placed in footer.
	$remove_these_from_head = array(
		"add-script-ids-here",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
		"",
	);
	foreach($remove_these_from_head as $rmh){
		wp_enqueue_style($rmh);	
	}
},10,2);
