<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if(get_theme_mod('blonwe_my_account_layout') == 'logintab'){ ?>
	<?php wp_enqueue_script('blonwe-loginform'); ?>

	<?php $register_class = 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ? 'has-register' : 'no-register';  ?>

	<div class="site-login <?php echo esc_attr($register_class); ?>">
		<div class="site-login-inner">
			<div class="site-login-overflow">
				<ul class="login-page-tab">
					<li><a href="#" class="active"><?php esc_html_e( 'Login', 'blonwe' ); ?></a></li>
					
					<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) { ?>
						<li><a href="#"><?php esc_html_e( 'Register', 'blonwe' ); ?></a></li>
					<?php } ?>
				</ul>
				<div id="customer_login" class="login-form-container">
					<div class="login-form">
						 <p><?php esc_html_e( 'If you have an account, sign in with your username or email address.', 'blonwe' ); ?></p>
						<form class="woocommerce-form woocommerce-form-login login" method="post">

							<?php do_action( 'woocommerce_login_form_start' ); ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="username"><?php esc_html_e( 'Username or email address', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
								<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
							</p>
							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<label for="password"><?php esc_html_e( 'Password', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
								<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
							</p>

							<?php do_action( 'woocommerce_login_form' ); ?>
							
							<div class="lost-password">
								<p class="form-row">
									<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
										<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'blonwe' ); ?></span>
									</label>
								</p>
								<p class="woocommerce-LostPassword lost_password">
									<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'blonwe' ); ?></a>
								</p>
							</div>
							
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
							<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'blonwe' ); ?>"><?php esc_html_e( 'Log in', 'blonwe' ); ?></button>
							

							<?php do_action( 'woocommerce_login_form_end' ); ?>

						</form>
					</div>
					<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) { ?>
						<div class="register-form">
							<p><?php esc_html_e( 'There are many advantages to creating an account: the payment process is faster, shipment tracking is possible and much more.', 'blonwe' ); ?></p>
							<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

								<?php do_action( 'woocommerce_register_form_start' ); ?>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_username"><?php esc_html_e( 'Username', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'blonwe', 'woocommerce' ); ?></span></label>
										<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
									</p>

								<?php endif; ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<label for="reg_email"><?php esc_html_e( 'Email address', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
									<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
								</p>

								<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

									<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
										<label for="reg_password"><?php esc_html_e( 'Password', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
										<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
									</p>

								<?php else : ?>

									<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'blonwe' ); ?></p>

								<?php endif; ?>

								<?php do_action( 'woocommerce_register_form' ); ?>

								<p class="woocommerce-form-row form-row">
									<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
									<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'blonwe' ); ?>"><?php esc_html_e( 'Register', 'blonwe' ); ?></button>
								</p>

								<?php do_action( 'woocommerce_register_form_end' ); ?>

							</form>
						</div>
					<?php } ?>
				</div>
			</div><!-- site-login-overflow -->
		</div><!-- site-login-container -->
	</div><!-- site-login -->
<?php } else { ?>

	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

	<div class="u-columns col2-set" id="customer_login">

		<div class="u-column1 col-1">

	<?php endif; ?>

			<h2><?php esc_html_e( 'Login', 'blonwe' ); ?></h2>
			<form class="woocommerce-form woocommerce-form-login login" method="post">

				<?php do_action( 'woocommerce_login_form_start' ); ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="username"><?php esc_html_e( 'Username or email address', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
				</p>
				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="password"><?php esc_html_e( 'Password', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
					<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" required aria-required="true" />
				</p>

				<?php do_action( 'woocommerce_login_form' ); ?>
				
				<div class="lost-password">
					<p class="form-row">
						<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
							<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'blonwe' ); ?></span>
						</label>
					</p>
					<p class="woocommerce-LostPassword lost_password">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'blonwe' ); ?></a>
					</p>
				</div>
				
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="login" value="<?php esc_attr_e( 'Log in', 'blonwe' ); ?>"><?php esc_html_e( 'Log in', 'blonwe' ); ?></button>
				

				<?php do_action( 'woocommerce_login_form_end' ); ?>

			</form>

	<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

		</div>

		<div class="u-column2 col-2">

			<h2><?php esc_html_e( 'Register', 'blonwe' ); ?></h2>

			<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

				<?php do_action( 'woocommerce_register_form_start' ); ?>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_username"><?php esc_html_e( 'Username', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'blonwe', 'woocommerce' ); ?></span></label>
						<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
					</p>

				<?php endif; ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					<label for="reg_email"><?php esc_html_e( 'Email address', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'blonwe' ); ?></span></label>
					<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" required aria-required="true" /><?php // @codingStandardsIgnoreLine ?>
				</p>

				<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

					<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
						<label for="reg_password"><?php esc_html_e( 'Password', 'blonwe' ); ?>&nbsp;<span class="required" aria-hidden="true">*</span><span class="screen-reader-text"><?php esc_html_e( 'Required', 'woocommerce' ); ?></span></label>
						<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" required aria-required="true" />
					</p>

				<?php else : ?>

					<p><?php esc_html_e( 'A link to set a new password will be sent to your email address.', 'blonwe' ); ?></p>

				<?php endif; ?>

				<?php do_action( 'woocommerce_register_form' ); ?>

				<p class="woocommerce-form-row form-row">
					<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
					<button type="submit" class="woocommerce-Button woocommerce-button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?> woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Register', 'blonwe' ); ?>"><?php esc_html_e( 'Register', 'blonwe' ); ?></button>
				</p>

				<?php do_action( 'woocommerce_register_form_end' ); ?>

			</form>

		</div>

	</div>
<?php endif; ?>
<?php } ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
