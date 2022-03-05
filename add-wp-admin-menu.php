add_action('admin_menu', 'custom_menu');

function custom_menu() { 

  add_menu_page( 
      'Page Title Here', 
      'Menu Title Here', 
      'edit_posts', // User capability
      'page_slug_here', 
      'callback_function_name', 
      'dashicons-media-spreadsheet' // Icon
     );
}

function callback_function_name(){
	?>
	<div class="wrap">
		<h2>Page Heading here</h2>
		<hr/>
		
		<?php 
		// Add some PHP here
    
		?>
		
	</div>
	<?php
}
