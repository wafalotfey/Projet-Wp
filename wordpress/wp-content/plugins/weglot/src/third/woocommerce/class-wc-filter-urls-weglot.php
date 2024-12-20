<?php

namespace WeglotWP\Third\Woocommerce;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Exception;
use WeglotWP\Models\Hooks_Interface_Weglot;
use WeglotWP\Services\Language_Service_Weglot;
use WeglotWP\Services\Option_Service_Weglot;
use WeglotWP\Services\Replace_Url_Service_Weglot;
use WeglotWP\Services\Request_Url_Service_Weglot;


/**
 * WC_Filter_Urls_Weglot
 *
 * @since 2.0
 */
class WC_Filter_Urls_Weglot implements Hooks_Interface_Weglot {
	/**
	 * @var Request_Url_Service_Weglot
	 */
	private $request_url_services;

	/**
	 * @var Wc_Active
	 */
	private $wc_active_services;
	/**
	 * @var Replace_Url_Service_Weglot
	 */
	private $replace_url_services;

	/**
	 * @return void
	 * @throws Exception
	 * @since 2.0
	 */
	public function __construct() {
		$this->request_url_services = weglot_get_service( 'Request_Url_Service_Weglot' );
		$this->wc_active_services   = weglot_get_service( 'Wc_Active' );
		$this->replace_url_services = weglot_get_service( 'Replace_Url_Service_Weglot' );
	}

	/**
	 * @return void
	 * @version 2.6.0
	 * @see Hooks_Interface_Weglot
	 *
	 * @since 2.0
	 */
	public function hooks() {
		if ( ! $this->wc_active_services->is_active() ) {
			return;
		}

		add_filter( 'woocommerce_get_cart_url', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_lambda'
		) );
		add_filter( 'woocommerce_get_checkout_url', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_lambda'
		) );
		add_filter( 'woocommerce_get_myaccount_page_permalink', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_lambda'
		) );
		add_filter( 'woocommerce_payment_successful_result', array( $this, 'woocommerce_filter_url_array' ) );
		add_filter( 'woocommerce_get_checkout_order_received_url', array(
			$this,
			'woocommerce_filter_order_received_url'
		) );
		add_action( 'woocommerce_reset_password_notification', array(
			$this,
			'woocommerce_filter_reset_password'
		), 999 );
		add_action( 'wp_head', array( $this, 'woocommerce_translate_cart_checkout_block' ), 999 );

		add_filter( 'woocommerce_login_redirect', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_log_redirect'
		) );
		add_filter( 'woocommerce_registration_redirect', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_log_redirect'
		) );
		add_filter( 'woocommerce_cart_item_permalink', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_lambda'
		) );

		/**
		 * @since 2.6.0
		 */
		add_filter( 'woocommerce_get_cart_page_permalink', array(
			'\WeglotWP\Helpers\Helper_Filter_Url_Weglot',
			'filter_url_lambda'
		) );
		add_filter( 'woocommerce_get_endpoint_url', array( $this, 'weglot_woocommerce_get_endpoint_url' ), 10, 2 );
	}

	/**
	 * Filter woocommerce order received URL
	 *
	 * @param string $url_filter
	 *
	 * @return string
	 * @since 2.0
	 */
	public function woocommerce_filter_order_received_url( $url_filter ) {
		$url = $this->request_url_services->create_url_object( $url_filter );

		return $url->getForLanguage( $this->request_url_services->get_current_language() );
	}

	/**
	 * Woocommerce get endpoint url
	 *
	 * @param string $url
	 * @param string $endpoint
	 *
	 * @return string
	 * @since 2.0
	 */
	public function weglot_woocommerce_get_endpoint_url( $url, $endpoint ) {

		if ( get_option( 'woocommerce_myaccount_lost_password_endpoint' ) === $endpoint ) {
			$current_headers = headers_list();
			foreach ( $current_headers as $header ) {
				if ( strpos( $header, 'wp-resetpass' ) !== false ) {
					preg_match( '#wp-resetpass-(.*?)=(.*?);#', $header, $matches_name );
					preg_match( '#path=(.*?);#', $header, $matches_path );
					if ( isset( $matches_name[0] ) && isset( $matches_path[0] ) && isset( $matches_path[1] ) ) {
						$theUrl         = $this->request_url_services->create_url_object( $matches_path[1] );
						$translated_url = $theUrl->getForLanguage( $this->request_url_services->get_current_language() );
						setcookie( 'wp-resetpass-' . $matches_name[1], urldecode( $matches_name[2] ), 0, $translated_url, '', is_ssl(), true ); // phpcs:ignore

						return $translated_url;
					}
				}
			}

			$current_url = $this->request_url_services->create_url_object( $url );

			return $current_url->getForLanguage( $this->request_url_services->get_current_language() );
		}

		return $url;
	}

	/**
	 * Filter array woocommerce filter with optional Ajax
	 *
	 * @param array<string,mixed> $result
	 *
	 * @return array<string,mixed>
	 * @since 2.0
	 */
	public function woocommerce_filter_url_array( $result ) {
		/** @var Language_Service_Weglot $language_service */
		$language_service = weglot_get_service( 'Language_Service_Weglot' );

		$choose_current_language = $this->request_url_services->get_current_language();
		if ( $choose_current_language !== $language_service->get_original_language() ) { // Not ajax
			$url = $this->request_url_services->create_url_object( $result['redirect'] );
		} else {
			if ( isset( $_SERVER['HTTP_REFERER'] ) ) { //phpcs:ignore
				// Ajax
				$url                     = $this->request_url_services->create_url_object( $_SERVER['HTTP_REFERER'] ); //phpcs:ignore
				$choose_current_language = $url->getCurrentLanguage();
				if ( isset( $result['redirect'] ) ) {
					$url = $this->request_url_services->create_url_object( $result['redirect'] );
				}
			}
		}
		if ( isset( $result['redirect'] ) ) {
			if ( $this->replace_url_services->check_link( $result['redirect'] ) ) { // We must not add language code if external link
				if ( isset( $url ) && $url ) {
					$result['redirect'] = $url->getForLanguage( $choose_current_language );
				}
			}
		}

		return $result;
	}


	/**
	 * Redirect URL Lost password for WooCommerce
	 *
	 * @param mixed $url
	 *
	 * @return void
	 * @throws Exception
	 * @version 2.0.4
	 * @since 2.0
	 */
	public function woocommerce_filter_reset_password( $url ) {
		/** @var Language_Service_Weglot $language_service */
		$language_service = weglot_get_service( 'Language_Service_Weglot' );

		if ( $this->request_url_services->get_current_language() === $language_service->get_original_language() ) {
			exit;
		}

		$url_redirect = add_query_arg( 'reset-link-sent', 'true', wc_get_account_endpoint_url( 'lost-password' ) );
		$url_redirect = $this->request_url_services->create_url_object( $url_redirect );

		wp_redirect( $url_redirect->getForLanguage( $this->request_url_services->get_current_language() ) ); //phpcs:ignore
		exit;
	}


	/**
	 * Translate WooCommerce cart and checkout Block
	 *
	 *
	 * @return void
	 * @throws Exception
	 * @since 4.2.7
	 */
	public function woocommerce_translate_cart_checkout_block() {

		$translate_block_cart_checkout = apply_filters( 'weglot_translate_block_cart_checkout', false );

		if ( $translate_block_cart_checkout ) {

			if ( is_cart() || is_checkout() || $this->wg_is_custom_checkout_page() || $this->wg_is_custom_cart_page() ) {
				$checkout_url        = wc_get_checkout_url();
				$cart_url            = wc_get_cart_url();
				$request_url_service = weglot_get_request_url_service();
				$replaced_url        = $request_url_service->create_url_object( $checkout_url )->getForLanguage( $request_url_service->get_current_language() );
				$replaced_cart_url   = $request_url_service->create_url_object( $cart_url )->getForLanguage( $request_url_service->get_current_language() );

				?>
				<script>
					document.addEventListener('DOMContentLoaded', function () {

						// Create a MutationObserver to watch for changes in the DOM
						const observer = new MutationObserver(function (mutations) {
							mutations.forEach(function (mutation) {
								if (mutation.type === 'childList') {
									modifyCheckoutButton();
								}
							});
						});

						function modifyCheckoutButton() {
							const checkoutButton = document.querySelector('.wc-block-cart__submit-button');
							const miniCartCheckoutButton = document.querySelector('.wc-block-mini-cart__footer-checkout');
							const miniCartButton = document.querySelector('.wc-block-mini-cart__footer-cart');
							let allModified = true;
							if (checkoutButton !== null) {
								checkoutButton.setAttribute('href', "<?php echo esc_js( $replaced_url ); ?>");
							} else {
								allModified = false;
							}

							if (miniCartCheckoutButton !== null) {
								miniCartCheckoutButton.setAttribute('href', "<?php echo esc_js( $replaced_url ); ?>");
							} else {
								allModified = false;
							}

							if (miniCartButton !== null) {
								miniCartButton.setAttribute('href', "<?php echo esc_js( $replaced_cart_url ); ?>");
							} else {
								allModified = false;
							}
							// Disconnect the observer once the button is found and modified
							if (allModified) {
								observer.disconnect();
							}
						}

						// Configure the observer to watch for changes in the entire document
						observer.observe(document.body, {
							childList: true,
							subtree: true
						});

						// Initial check in case the element is already present
						modifyCheckoutButton();
					});
				</script>
				<?php
			}
		}
	}

	/**
	 * Check custom checkout page
	 *
	 *
	 * @return bool
	 * @throws Exception
	 * @since 4.2.7
	 */
	public function wg_is_custom_checkout_page() {
		$checkout_slug = apply_filters( 'custom_checkout_slug', 'checkout' );

		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			if ( strpos( esc_url_raw( $_SERVER['REQUEST_URI'] ), '/' . $checkout_slug ) !== false ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Check custom cart page
	 *
	 *
	 * @return bool
	 * @throws Exception
	 * @since 4.2.7
	 */
	public function wg_is_custom_cart_page() {
		$cart_slug = apply_filters( 'custom_cart_slug', 'cart' );
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			if ( strpos( esc_url_raw( $_SERVER['REQUEST_URI'] ), '/' . $cart_slug ) !== false ) {
				return true;
			}
		}

		return false;
	}
}
