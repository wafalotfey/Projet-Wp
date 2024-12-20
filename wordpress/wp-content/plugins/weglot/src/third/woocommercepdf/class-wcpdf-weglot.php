<?php

namespace WeglotWP\Third\Woocommercepdf;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Dompdf\Dompdf;
use Dompdf\Options;
use WeglotWP\Helpers\Helper_Is_Admin;
use WeglotWP\Models\Hooks_Interface_Weglot;
use WeglotWP\Services\Language_Service_Weglot;
use WeglotWP\Services\Pdf_Translate_Service_Weglot;
use WeglotWP\Services\Request_Url_Service_Weglot;
use WeglotWP\Third\Woocommercepdf\Wcpdf_Active;

/**
 * WC_Mail_Weglot
 *
 * @since 3.7
 */
class WCPDF_Weglot implements Hooks_Interface_Weglot {
	/**
	 * @var Wcpdf_Active
	 */
	private $wcpdf_active_services;
	/**
	 * @var Pdf_Translate_Service_Weglot
	 */
	private $pdf_translate_services;

	/**
	 * @return void
	 * @throws \Exception
	 * @since 3.7
	 */
	public function __construct() {
		$this->wcpdf_active_services  = weglot_get_service( 'Wcpdf_Active' );
		$this->pdf_translate_services = weglot_get_service( 'Pdf_Translate_Service_Weglot' );
	}

	/**
	 * @return void
	 * @since 3.7
	 */
	public function hooks() {
		if ( ! $this->wcpdf_active_services->is_active() ) {
			return;
		}

		add_filter( 'wpo_wcpdf_before_dompdf_render', array( $this, 'translate_invoice_pdf' ), 10, 3 );
		add_filter( 'wpo_wcpdf_after_mpdf_write', array( $this, 'translate_invoice_pdf' ), 10, 3 );
	}

	/**
	 * @param object $engine
	 * @param string $html
	 * @param array<string,mixed>$options
	 *
	 * @return object
	 * @throws \Exception
	 * @since 3.7
	 */
	public function translate_invoice_pdf( $engine, $html, $options ) {

		$translate_pdf = apply_filters( 'weglot_translate_pdf', false );

		if ( ! $translate_pdf ) {
			return $engine;
		}

		if ( ! empty( sanitize_key( $_GET['order_ids'] ) ) ) { // phpcs:ignore
			$order_id = intval (sanitize_key( $_GET['order_ids'] ) ); // phpcs:ignore
		}

		if ( empty( $order_id ) ) {
			return $engine;
		}

		$woocommerce_order_language = get_post_meta( $order_id, 'weglot_language', true ); // phpcs:ignore

		if ( $woocommerce_order_language == weglot_get_original_language() ) {
			return $engine;
		}


		$translated_pdf = $this->pdf_translate_services->translate_pdf( $html, $woocommerce_order_language );

		if (!isset($translated_pdf['content'])) {
			return $engine;
		}

		switch ( true ) {
			case $engine instanceof \Dompdf\Dompdf:
				/** @phpstan-ignore-next-line */
				$engine->loadHtml( $translated_pdf['content'] );
				return $engine;
			case $engine instanceof \Mpdf\Mpdf:
				$mpdf = new \Mpdf\Mpdf( $options );
				/** @phpstan-ignore-next-line */
				$mpdf->WriteHTML( $translated_pdf['content'] );
				unset( $engine );
				return $mpdf;
			default:
				return $engine;
		}
	}

}
