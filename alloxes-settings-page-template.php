<?php
// alloxes-settings-page-template.php

// A simple php code block for creating a new options page

// Step 1 : Create an action function for adding the settings page.


	add_action( 'admin_menu', 'alloxes_settings_page_add_menu' );
	function alloxes_settings_page_add_menu(){
		$alloxes_settings_page_name = "Settings Page Name"; // The name of the Settings Page
		$alloxes_settings_page_title = "Settings Page Title"; // The Page Title of the Settings Page
		$alloxes_settings_page_user_level = "manage_options"; // Setting it for Administrator for now.
		$alloxes_settings_page_slug = "settings_page_slug"; // The Settings Page slug
		$alloxes_settings_page_callback = "settings_page_callback"; // The Settings Page Callback Function Name
		$alloxes_settings_page_dashicon = "dashicons-admin-links"; // The Dashicon for the page
		
		add_menu_page( $alloxes_settings_page_name, $alloxes_settings_page_title, $alloxes_settings_page_user_level, $alloxes_settings_page_slug, $alloxes_settings_page_callback, $alloxes_settings_page_dashicon, 90 );
	}
	
// Step 2 : Define the callback function

	function alloxes_settings_page_callback(){
		
		$message = ""; // The message to be shown on the page when options are saved.
		
		if( isset( $_POST['alloxes-settings-page-submit'] ) ){
			
			// If the user had hit the submit button, we save the option 
			
			update_option( 'alloxes_settings_option1', $_POST['alloxes-settings-option1'], false );
			
			$message = 'Settings saved!';
		
		}
		
		$alloxes_settings_option1 = get_option( 'alloxes-settings-option1', '' );
		
		
		?>
		<div class="wrap">
			<h1>Alloxes Settings [Replace this with your own unique heading]</h1>
			<?php
			echo $message;
			?>
			<form method="post">
				<table class="form-table" role="presentation">
					<tbody>
						<tr>
							<th scope="row"><label for="alloxes-settings-option-1">Option 1 - Textbox</label></th>
							<td><input name="alloxes-settings-option-1" type="text" id="alloxes-settings-option-1" value="<?php echo $alloxes_settings_option1; ?>" class="regular-text" required="required" ></td>
							<p class="description" id="zoho-default-lead-owner-email-description">Make sure you have user on your ZOHO account with this email. This will be used to assign Owner of Contact generated through API when form is submitted without Affiliate.</p>
						</tr>
					</tbody>
				</table>
				<hr>
				<p class="submit"><input type="submit" name="alloxes-settings-page-submit" id="submit" class="button button-primary" value="Save Changes"></p>
			</form>
		</div>
		<?php
	}
