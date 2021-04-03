
add_action("wp_enqueue_scripts",function() {
	// Styles to be removed from head and placed in footer.
	$remove_these_from_head = array("cookie-law-info","dashicons","admin-bar","xt-icons","xt_framework_add-to-cart","wp-block-library","wc-block-vendors-style","wc-block-style","cookie-law-info-gdpr","wcsob","woo-multi-currency","wmc-flags","xtfw_notice","xt-woo-floating-cart","yoast-seo-adminbar","magnific-popup","woocommerce-layout","woocommerce-smallscreen","woocommerce-general","extra-fonts","extra-style","dashicons","admin-bar");
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
	$remove_these_from_head = array("cookie-law-info","dashicons","admin-bar","xt-icons","xt_framework_add-to-cart","wp-block-library","wc-block-vendors-style","wc-block-style","cookie-law-info-gdpr","wcsob","woo-multi-currency","wmc-flags","xtfw_notice","xt-woo-floating-cart","yoast-seo-adminbar","magnific-popup","woocommerce-layout","woocommerce-smallscreen","woocommerce-general","extra-fonts","extra-style","dashicons","admin-bar");
	foreach($remove_these_from_head as $rmh){
		wp_enqueue_style($rmh);	
	}
},10,2);
