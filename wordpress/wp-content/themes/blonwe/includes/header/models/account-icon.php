<?php

if ( ! function_exists( 'blonwe_account_icon' ) ) {
	function blonwe_account_icon(){
		$headersearch = get_theme_mod('blonwe_header_account','0');
		if($headersearch == 1){
			
		$buttontype = get_theme_mod('blonwe_header_popup_login') == 1 ? 'popup' : '';	
			
		?>

			<?php if( get_theme_mod( 'blonwe_header_account_type' ) == 'type4') { ?>	
				<div class="header-action login-button row-style <?php echo esc_attr($buttontype); ?>">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="action-link">
						<div class="action-icon">
							<i class="klb-icon-profile-circled"></i>
						</div><!-- action-icon -->
						<div class="action-text">
							<?php if(is_user_logged_in()){ ?>
								<?php $current_user = wp_get_current_user(); ?>
								<span><?php esc_html_e('Welcome','blonwe'); ?></span>
								<p><?php echo esc_html($current_user->user_login); ?></p>
							<?php } else { ?>
								<span><?php esc_html_e('Sign In','blonwe'); ?></span>
								<p><?php esc_html_e('Account','blonwe'); ?></p>
							<?php } ?>
						</div><!-- action-text -->
					</a>
                </div><!-- header-action --> 
			<?php } elseif( get_theme_mod( 'blonwe_header_account_type' ) == 'type3') { ?>		
				<div class="header-action login-button row-style <?php echo esc_attr($buttontype); ?>">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="action-link">
						<div class="action-icon">
							<i class="klb-icon-user-cut"></i>
						</div><!-- action-icon -->
						<div class="action-text">
							<?php if(is_user_logged_in()){ ?>
								<?php $current_user = wp_get_current_user(); ?>
								<span><?php esc_html_e('Welcome','blonwe'); ?></span>
								<p><?php echo esc_html($current_user->user_login); ?></p>
							<?php } else { ?>
								<span><?php esc_html_e('Sign In','blonwe'); ?></span>
								<p><?php esc_html_e('Account','blonwe'); ?></p>
							<?php } ?>
						</div><!-- action-text -->
					</a>
				</div><!-- header-action -->
			<?php } elseif( get_theme_mod( 'blonwe_header_account_type' ) == 'type2') { ?>	
				<div class="header-action login-button column-style <?php echo esc_attr($buttontype); ?>">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="action-link">
						<div class="action-icon">
						   <i class="klb-icon-profile-circled"></i>
						</div><!-- action-icon -->
						<div class="action-text">
						   <p><?php esc_html_e('My Account','blonwe'); ?></p>
						</div><!-- action-text -->
					</a>
				</div><!-- header-action --> 
			<?php } else { ?>
				<div class="header-action login-button row-style <?php echo esc_attr($buttontype); ?>">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="action-link">
						<div class="action-icon">
							<i class="klb-icon-user-big"></i>
						</div><!-- action-icon -->
						<div class="action-text">
							<?php if(is_user_logged_in()){ ?>
								<?php $current_user = wp_get_current_user(); ?>
								<span><?php esc_html_e('Welcome','blonwe'); ?></span>
								<p><?php echo esc_html($current_user->user_login); ?></p>
							<?php } else { ?>
								<span><?php esc_html_e('Sign In','blonwe'); ?></span>
								<p><?php esc_html_e('Account','blonwe'); ?></p>
							<?php } ?>
						</div><!-- action-text -->
					</a>
				</div><!-- header-action -->
				
			<?php } ?>
	<?php  }
	}
}

if ( ! function_exists( 'blonwe_login_popup' ) ) {
	function blonwe_login_popup(){
		
	if(get_theme_mod('blonwe_header_popup_login') != 1 || is_user_logged_in()){
		return;
	}
	
	wp_enqueue_script( 'blonwe-popup-login');

	?>
	
	<div class="klb-modal-root authentication-modal">
		<div class="klb-modal-inner">
			<?php if(get_theme_mod( 'blonwe_header_popup_login_image' )){ ?>
				<div class="authentication-modal-banner min-1024 ">
					<a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>">
						<img src="<?php echo esc_url( wp_get_attachment_url(get_theme_mod( 'blonwe_header_popup_login_image' )) ); ?>" alt="<?php bloginfo("name"); ?>">
					</a>
				</div><!-- authentication-modal-banner -->
			<?php } ?>
			<div class="klb-authentication-modal">
				<div class="klb-modal-header">
					<h4 class="entry-title"><?php esc_html_e('Log in', 'blonwe'); ?></h4>
					<div class="site-close">
						<svg role="img" focusable="false" viewBox="0 0 22 22" xmlns="http://www.w3.org/2000/svg">
						<path d="M1.705.294.291 1.71l19.997 19.997 1.414-1.415L1.705.294Z"></path>
						<path d="M20.288.294.29 20.291l1.414 1.415L21.702 1.709 20.288.294Z"></path>
						</svg>
					</div><!-- site-close -->        
				</div><!-- klb-modal-header -->
				<div class="klb-authentication-form tab-style">
					<div id="klb-authentication" class="klb-authentication-inner">
						<div class="klb-login-form">
							<?php do_action( 'woocommerce_before_customer_login_form' ); ?>
							<form class="woocommerce-form woocommerce-form-login login" method="post">

								<?php do_action( 'woocommerce_login_form_start' ); ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="username"><?php esc_html_e( 'Username or email address', 'blonwe' ); ?>&nbsp;<span class="required">*</span></label>
									<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
								</p>
								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="password"><?php esc_html_e( 'Password', 'blonwe' ); ?>&nbsp;<span class="required">*</span></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
								</p>

								<?php do_action( 'woocommerce_login_form' ); ?>
								
								<p class="form-row">
									<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'blonwe' ); ?></span>
									</label>
									
									<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
									<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'blonwe' ); ?>"><?php esc_html_e( 'Log in', 'blonwe' ); ?></button>
								</p>

								<div class="lost-password">
									<p class="woocommerce-LostPassword lost_password">
										<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'blonwe' ); ?></a>
									</p>
								</div>

								<?php do_action( 'woocommerce_login_form_end' ); ?>

							</form>

							<?php do_action( 'woocommerce_after_customer_login_form' ); ?>

							<p class="privacy-text"><?php esc_html_e('By continuing, you accept the Website Regulations , Regulations for the sale of alcoholic beverages and the', 'blonwe'); ?> <?php echo get_the_privacy_policy_link(); ?></p>

						</div><!-- klb-login-form -->
					</div><!-- klb-authentication-inner -->
				</div><!-- klb-authentication-form -->
				<div class="klb-authentication-tab">
					<p><?php esc_html_e('You dont have an account yet?', 'blonwe'); ?> <a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>#register"><?php esc_html_e('Register Now', 'blonwe'); ?></a></p>
				</div><!-- klb-authentication-tab -->
			</div><!-- klb-authentication-modal -->
		</div><!-- klb-modal-inner -->
		<div class="klb-modal-overlay"></div>
	</div><!-- klb-theme-modal -->

	<?php
	}
}
add_action('wp_footer','blonwe_login_popup');