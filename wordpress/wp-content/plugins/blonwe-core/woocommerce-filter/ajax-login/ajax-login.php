<?php

/*************************************************
## Ajax Login Scripts
*************************************************/ 
function blonwe_ajax_login_scripts() {
	wp_enqueue_script( 'wc-password-strength-meter');
	wp_enqueue_script( 'blonwe-ajax-login',   plugins_url( 'js/ajax-login.js', __FILE__ ), false, '1.0');
	wp_enqueue_style( 'blonwe-ajax-login',    plugins_url( 'css/ajax-login.css', __FILE__ ), false, '1.0');
	wp_localize_script( 'blonwe-ajax-login', 'MyAjax', array(
		'ajaxurl' => esc_url(admin_url( 'admin-ajax.php' )),
	));
}
add_action( 'woocommerce_before_customer_login_form', 'blonwe_ajax_login_scripts' );

/*************************************************
## Ajax Login CallBack
*************************************************/ 
add_action( 'wp_ajax_nopriv_ajax_login', 'blonwe_ajax_login_callback' );
add_action( 'wp_ajax_ajax_login', 'blonwe_ajax_login_callback' );
function blonwe_ajax_login_callback() {
	
	if ( is_user_logged_in() ) {
		return;
	}
	
	if(!isset($_POST['logindata'])){
		return;
	}
	
	parse_str($_POST['logindata'], $_data);
	
	try {
		$creds = array(
			'user_login'    => trim( wp_unslash( $_data['username'] ) ), // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			'user_password' => $_data['password'], // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
			'remember'      => isset( $_data['rememberme'] ), // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		);

		$validation_error = new WP_Error();
		$validation_error = apply_filters( 'woocommerce_process_login_errors', $validation_error, $creds['user_login'], $creds['user_password'] );

		if ( $validation_error->get_error_code() ) {
			throw new Exception( '<strong>' . esc_html__( 'Error:', 'blonwe-core' ) . '</strong> ' . $validation_error->get_error_message() );
		}

		if ( empty( $creds['user_login'] ) ) {
			throw new Exception( '<strong>' . esc_html__( 'Error:', 'blonwe-core' ) . '</strong> ' . esc_html__( 'Username is required.', 'blonwe-core' ) );
		}

		// On multisite, ensure user exists on current site, if not add them before allowing login.
		if ( is_multisite() ) {
			$user_data = get_user_by( is_email( $creds['user_login'] ) ? 'email' : 'login', $creds['user_login'] );

			if ( $user_data && ! is_user_member_of_blog( $user_data->ID, get_current_blog_id() ) ) {
				add_user_to_blog( get_current_blog_id(), $user_data->ID, 'customer' );
			}
		}

		// Perform the login.
		$user = wp_signon( apply_filters( 'woocommerce_login_credentials', $creds ), is_ssl() );

		if ( is_wp_error( $user ) ) {
			throw new Exception( $user->get_error_message() );
		} else {

			if ( ! empty( $_data['redirect'] ) ) {
				$redirect = wp_unslash( $_data['redirect'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			} elseif ( wc_get_raw_referer() ) {
				$redirect = wc_get_raw_referer();
			} else {
				$redirect = wc_get_page_permalink( 'myaccount' );
			}

			$data = array(
				'redirecturl' => apply_filters( 'woocommerce_login_redirect', remove_query_arg( 'wc_error', $redirect ), $user ), wc_get_page_permalink( 'myaccount' ),
			);
			// See also wp_send_json_error() and wp_send_json().
			wp_send_json_success( $data );

			exit;
		}
	} catch ( Exception $e ) {
		if ( $e->getMessage() ) {
			echo blonwe_sanitize_data($e->getMessage());
			exit;
		}
	}
}

/*************************************************
## Ajax Register CallBack
*************************************************/ 
add_action( 'wp_ajax_nopriv_ajax_register', 'blonwe_ajax_register_callback' );
add_action( 'wp_ajax_ajax_register', 'blonwe_ajax_register_callback' );
function blonwe_ajax_register_callback() {
	
	if ( is_user_logged_in() ) {
		return;
	}
	
	if(!isset($_POST['registerdata'])){
		return;
	}
	
	parse_str($_POST['registerdata'], $_data);

	$username = 'no' === get_option( 'woocommerce_registration_generate_username' ) && isset( $_data['username'] ) ? wp_unslash( $_data['username'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	$password = 'no' === get_option( 'woocommerce_registration_generate_password' ) && isset( $_data['password'] ) ? $_data['password'] : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized, WordPress.Security.ValidatedSanitizedInput.MissingUnslash
	$email    = wp_unslash( $_data['email'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

	try {
		$validation_error  = new WP_Error();
		$validation_error  = apply_filters( 'woocommerce_process_registration_errors', $validation_error, $username, $password, $email );
		$validation_errors = $validation_error->get_error_messages();

		if ( 1 === count( $validation_errors ) ) {
			throw new Exception( $validation_error->get_error_message() );
		} elseif ( $validation_errors ) {
			foreach ( $validation_errors as $message ) {
				wc_add_notice( '<strong>' . esc_html__( 'Error:', 'blonwe-core' ) . '</strong> ' . $message, 'error' );
			}
			throw new Exception();
		}

		$new_customer = wc_create_new_customer( sanitize_email( $email ), wc_clean( $username ), $password );

		if ( is_wp_error( $new_customer ) ) {
			throw new Exception( $new_customer->get_error_message() );
		}

		if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) ) {
			wc_add_notice( esc_html__( 'Your account was created successfully and a password has been sent to your email address.', 'blonwe-core' ) );
		} else {
			wc_add_notice( esc_html__( 'Your account was created successfully. Your login details have been sent to your email address.', 'blonwe-core' ) );
		}

		// Only redirect after a forced login - otherwise output a success notice.
		if ( apply_filters( 'woocommerce_registration_auth_new_customer', true, $new_customer ) ) {
			wc_set_customer_auth_cookie( $new_customer );

			if ( ! empty( $_data['redirect'] ) ) {
				$redirect = wp_sanitize_redirect( wp_unslash( $_data['redirect'] ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
			} elseif ( wc_get_raw_referer() ) {
				$redirect = wc_get_raw_referer();
			} else {
				$redirect = wc_get_page_permalink( 'myaccount' );
			}

			$data = array(
				'redirecturl' => wc_get_page_permalink( 'myaccount' ),
			);
			// See also wp_send_json_error() and wp_send_json().
			wp_send_json_success( $data );

			exit;
		}
	} catch ( Exception $e ) {
		if ( $e->getMessage() ) {
			echo blonwe_sanitize_data($e->getMessage());
			exit;
		}
	}


}