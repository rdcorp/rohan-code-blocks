<?php

/**
 * [genese_user_registration]
 *	Outputs the user registration form
 */
function func_genese_user_registration($atts){
	$out = "";
	if ( is_admin() ) return;
	if ( is_user_logged_in() ) return;
   
	do_action( 'woocommerce_before_customer_login_form' );
	wp_enqueue_script("wc-password-strength-meter");
	ob_start();
?>
		
<!-- Add your HTML / CSS / JS code here! -->
	<div class="woocommerce">
		<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >
			
			<?php //do_action( 'woocommerce_register_form_start' ); ?>
					
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				<label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>">			
			</p>

			
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
               <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
               <input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
            </p>
			
			<div class="woocommerce-privacy-policy-text"><p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
			</div>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>

				<input type="hidden" name="_wp_http_referer" value="/my-account/">				
				
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
			</p>
			<?php do_action( 'woocommerce_register_form_end' ); ?>
					
		</form>
	</div>
<?php
	$out.= ob_get_contents();
	ob_end_clean();
	return $out;
}
add_shortcode("genese_user_registration","func_genese_user_registration");

add_action('user_register', 'add_store_id');    
add_action('personal_options_update', 'add_store_id' );    
add_action('edit_user_profile_update','add_store_id' );    
function add_store_id( $user_id ) {    
    update_user_meta( $user_id, 'store_id', 41); 
}

