<?php

if ( ! class_exists( 'KlbCompare' ) && class_exists( 'WC_Product' ) ) {
	class KlbCompare {
		protected static $settings = [];
		protected static $fields = [];
		protected static $instance = null;

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {
			self::$settings     = (array) get_option( 'klbcp_settings', [] );

			// init
			add_action( 'init', [ $this, 'init' ] );
			add_action( 'wp_login', [ $this, 'login' ], 10, 2 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
			
			add_filter( 'woocommerce_account_menu_items', [ $this, 'account_items' ], 99 );
			add_action( 'woocommerce_account_compare_endpoint', [ $this, 'account_endpoint' ], 99 );

		}

		function init() {
			// fields
			self::$fields = apply_filters( 'klbcp_fields', [
				'remove'             => '&nbsp;',
				'image'             => esc_html__( 'Image', 'blonwe-core' ),
				'name'             	=> esc_html__( 'Name', 'blonwe-core' ),
				'sku'               => esc_html__( 'SKU', 'blonwe-core' ),
				'rating'            => esc_html__( 'Rating', 'blonwe-core' ),
				'price'             => esc_html__( 'Price', 'blonwe-core' ),
				'stock'             => esc_html__( 'Stock', 'blonwe-core' ),
				'weight'            => esc_html__( 'Weight', 'blonwe-core' ),
				'add_to_cart'       => esc_html__( 'Add to cart', 'blonwe-core' ),
			] );

			// my account page
			add_rewrite_endpoint( 'compare', EP_PAGES );

			// shortcode compare list
			add_shortcode( 'klbcp_list', [ $this, 'blonwe_compare_list' ] );

			// add button for blonwe_compare_action - product box
			add_action( 'blonwe_compare_action', [ $this, 'blonwe_compare_button' ], 11 );

		}

		function login( $user_login, $user ) {
			if ( isset( $user->data->ID ) ) {
				$user_products = get_user_meta( $user->data->ID, 'klbcp_products', true );
				$user_fields   = get_user_meta( $user->data->ID, 'klbcp_fields', true );

				if ( ! empty( $user_products ) ) {
					setcookie( 'klbcp_products_' . md5( 'klbcp' . $user->data->ID ), $user_products, time() + 604800, '/' );
				}

				if ( ! empty( $user_fields ) ) {
					setcookie( 'klbcp_fields_' . md5( 'klbcp' . $user->data->ID ), $user_fields, time() + 604800, '/' );
				}
			}
		}

		function enqueue_scripts() {
			// frontend css & js
			wp_enqueue_style( 'klbcp-frontend', plugins_url( '/css/compare.css', __FILE__ ), false, '1.0');
			wp_enqueue_script( 'klbcp-frontend', plugins_url( '/js/compare.js', __FILE__ ), ['jquery'], 1.0, true );

			wp_localize_script( 'klbcp-frontend', 'klbcp_vars', [
					'ajax_url'           => admin_url( 'admin-ajax.php' ),
					'user_id'            => md5( 'klbcp' . get_current_user_id() ),
					'page_url'           => self::get_page_url(),
					'view_page_text'     => esc_html__( 'View Compare Page', 'blonwe-core' ),
					'close_text'     	 => esc_html__( 'Close', 'blonwe-core' ),
					'message_added'      => esc_html__( '{name} has been added to Compare list.', 'blonwe-core' ),
					'message_removed'    => esc_html__( '{name} has been removed from the Compare list.', 'blonwe-core' ),
					'message_exists'     => esc_html__( '{name} is already in the Compare list.', 'blonwe-core' ),
					'limit'              => 100,
					'limit_notice'       => esc_html__( 'You can add a maximum of {limit} products to the comparison table.', 'blonwe-core' ),
					'button_text'        => apply_filters( 'klbcp_button_text', esc_html__( 'Compare', 'blonwe-core' ) ),
					'button_text_added'  => apply_filters( 'klbcp_button_text_added', esc_html__( 'Compare', 'blonwe-core' ) ),
				]
			);
		}

		function get_table( $ajax = true, $products = null, $context = '' ) {
			// get items
			$table         = '';
			$products_data = [];

			if ( is_null( $products ) ) {
				$products = [];


				$cookie = 'klbcp_products_' . md5( 'klbcp' . get_current_user_id() );

				if ( isset( $_COOKIE[ $cookie ] ) && ! empty( $_COOKIE[ $cookie ] ) ) {
					if ( is_user_logged_in() ) {
						update_user_meta( get_current_user_id(), 'klbcp_products', sanitize_text_field( $_COOKIE[ $cookie ] ) );
					}

					$products = explode( ',', sanitize_text_field( $_COOKIE[ $cookie ] ) );
				}
			}

			if ( is_array( $products ) && ( count( $products ) > 0 ) ) {
				$saved_fields = array_keys( self::$fields );

				$saved_fields = apply_filters( 'klbcp_saved_fields', $saved_fields, $products, $context );

				foreach ( $products as $product_id ) {
					$product_obj    = wc_get_product( $product_id );
					$parent_product = false;

					if ( ! $product_obj || $product_obj->get_status() !== 'publish' ) {
						continue;
					}

					if ( $product_obj->is_type( 'variation' ) && ( $parent_product_id = $product_obj->get_parent_id() ) ) {
						$parent_product = wc_get_product( $parent_product_id );
					}

					$products_data[ $product_id ]['id'] = $product_id;

					$product_name = apply_filters( 'klbcp_product_name', $product_obj->get_name() );


					foreach ( $saved_fields as $saved_field ) {
						switch ( $saved_field ) {
							case 'remove':
								//remove button
								$products_data[ $product_id ]['remove'] = ' <span class="klbcp-remove" data-id="' . $product_id . '"><i class="klb-icon-xmark"></i> ' . esc_html__( 'Remove', 'blonwe-core' ) . '</span>';

								break;
							case 'image':
								$image = $product_obj->get_image();

								$products_data[ $product_id ]['image'] = apply_filters( 'klbcp_product_image', '<a href="' . $product_obj->get_permalink() . '">' . $image . '</a>', $product_obj );

								break;
							case 'name':	
								$products_data[ $product_id ]['name'] = apply_filters( 'klbcp_product_name', '<a href="' . $product_obj->get_permalink() . '" >' . wp_strip_all_tags( $product_name ) . '</a>', $product_obj );

								break;
							case 'sku':
								$products_data[ $product_id ]['sku'] = apply_filters( 'klbcp_product_sku', $product_obj->get_sku(), $product_obj );
								break;
							case 'price':
								$products_data[ $product_id ]['price'] = apply_filters( 'klbcp_product_price', $product_obj->get_price_html(), $product_obj );
								break;
							case 'stock':
								$products_data[ $product_id ]['stock'] = apply_filters( 'klbcp_product_stock', wc_get_stock_html( $product_obj ), $product_obj );
								break;
							case 'rating':
								$products_data[ $product_id ]['rating'] = apply_filters( 'klbcp_product_rating', wc_get_rating_html( $product_obj->get_average_rating() ), $product_obj );
								break;
							case 'add_to_cart':
								$products_data[ $product_id ]['add_to_cart'] = apply_filters( 'klbcp_product_add_to_cart', do_shortcode( '[add_to_cart style="" show_price="false" id="' . $product_id . '"]' ), $product_obj );
								break;
							default:
								$products_data[ $product_id ][ $saved_field ] = apply_filters( 'klbcp_product_' . $saved_field, '', $product_obj );
						}
					}
				}

				$count           = count( $products_data );

				$table .= '<table class="shop_table woocommerce-cart-form__contents klbcp_table column-' . $count.'"><tbody>';

				$cookie_fields = self::get_cookie_fields( $saved_fields );
				$saved_fields  = array_unique( array_merge( $cookie_fields, $saved_fields ), SORT_REGULAR );

				$tr = 1;

				foreach ( $saved_fields as $saved_field ) {
					if ( ! isset( self::$fields[ $saved_field ] ) ) {
						continue;
					}

					$row = '';
					
					$row .= '<tr class="tr-default product-' . ( $tr % 2 ? 'odd' : 'even' ) . ' product-' . esc_attr( $saved_field ) . ' ' . ( ! in_array( $saved_field, $cookie_fields ) ? 'tr-hide' : '' ) . '"><td class="td-label">' . esc_html( self::$fields[ $saved_field ] ) . '</td>';

					foreach ( $products_data as $product_id => $product_data ) {
						if ( $product_data['name'] !== '' ) {
							if ( isset( $product_data[ $saved_field ] ) ) {
								$row_value = $product_data[ $saved_field ];
							} else {
								$row_value = '';
							}

							$row .= '<td>' . apply_filters( 'klbcp_field_value', $row_value, $saved_field, $product_id, $product_data ) . '</td>';
						} else {
							$row .= '<td class="td-placeholder"></td>';
						}
					}

					$row .= '</tr>';
					$tr ++;
					

					if ( ! empty( $row ) ) {
						$table .= $row;
					}
				}

				$table .= '</tbody></table>';
			} else {
				$table = '<div class="klbcp-no-result">
							<div class="cart-empty-page">
								<div class="empty-icon">
									<i class="klb-icon-compare-product"></i>
								</div>
								<p class="cart-empty">'.esc_html__( 'The comparison table is empty.', 'blonwe-core' ).'</p>
								<p class="return-to-shop">
									<a class="button wc-backward'.esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ).'" href="'.esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'">
										'.esc_html( apply_filters( 'woocommerce_return_to_shop_text', esc_html__( 'Return to shop', 'blonwe-core' ) ) ).'
									</a>
								</p>
							</div>
				
						</div>';
			}

			return apply_filters( 'klbcp_get_table', $table );
		}

		function blonwe_compare_button( $attrs ) {
			$output = $product_name = $product_image = '';

			global $product;

			if ( $product && is_a( $product, 'WC_Product' ) ) {
				$attr_id       = $product->get_id();
				$product_name     = $product->get_name();
				$product_image_id = $product->get_image_id();
				$product_image    = wp_get_attachment_image_url( $product_image_id );
			}

			if ( $attr_id ) {
				// button text
				$text = esc_html__( 'Compare', 'blonwe-core' );

				$output = '<a href="' . esc_url( '?add-to-compare=' . $attr_id ) . '" class="klbcp-btn klbcp-btn-' . esc_attr( $attr_id ) . '" data-id="' . esc_attr( $attr_id ) . '" data-product_name="' . esc_attr( $product_name ) . '" data-product_image="' . esc_attr( $product_image ) . '">' . $text . '</a>';
			}

			echo $output;
		}

		function blonwe_compare_list( $attrs ) {
			return '<div class="klbcp-list compare-page">' . self::get_table( false, null, 'page' ) . '</div>';
		}

		function get_cookie_fields( $saved_fields ) {
			$cookie_fields = 'klbcp_fields_' . md5( 'klbcp' . get_current_user_id() );

			if ( isset( $_COOKIE[ $cookie_fields ] ) && ! empty( $_COOKIE[ $cookie_fields ] ) ) {
				$fields = explode( ',', sanitize_text_field( $_COOKIE[ $cookie_fields ] ) );
			} else {
				$fields = $saved_fields;
			}

			return $fields;
		}

		function get_cookie_settings( $saved_settings ) {
			$cookie_settings = 'klbcp_settings_' . md5( 'klbcp' . get_current_user_id() );

			if ( isset( $_COOKIE[ $cookie_settings ] ) ) {
				$settings = explode( ',', sanitize_text_field( $_COOKIE[ $cookie_settings ] ) );
			} else {
				$settings = $saved_settings;
			}

			return $settings;
		}

		function account_items( $items ) {
			if ( isset( $items['customer-logout'] ) ) {
				$logout = $items['customer-logout'];
				unset( $items['customer-logout'] );
			} else {
				$logout = '';
			}

			if ( ! isset( $items['compare'] ) ) {
				$items['compare'] = apply_filters( 'klbcp_myaccount_compare_label', esc_html__( 'Compare', 'blonwe-core' ) );
			}

			if ( $logout ) {
				$items['customer-logout'] = $logout;
			}

			return $items;
		}

		function account_endpoint() {
			echo apply_filters( 'klbcp_myaccount_compare_content', do_shortcode( '[klbcp_list]' ) );
		}

		public static function get_page_url() {
			$page_id  = get_theme_mod('blonwe_compare_page');
			$page_url = ! empty( $page_id ) ? get_permalink( $page_id ) : '#';

			return esc_url( $page_url );
		}

		public static function get_count() {
			$products = [];
			$cookie   = 'klbcp_products_' . md5( 'klbcp' . get_current_user_id() );

			if ( isset( $_COOKIE[ $cookie ] ) && ! empty( $_COOKIE[ $cookie ] ) ) {
				$products = explode( ',', sanitize_text_field( $_COOKIE[ $cookie ] ) );
			}

			return apply_filters( 'klbcp_get_count', count( $products ) );
		}
	}

	return KlbCompare::instance();
}