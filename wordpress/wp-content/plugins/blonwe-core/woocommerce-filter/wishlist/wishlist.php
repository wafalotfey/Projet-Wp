<?php

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'KlbWishlist' ) ) {
	class KlbWishlist {
		protected static $products = [];
		protected static $instance = null;

		public static function instance() {
			if ( is_null( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		function __construct() {

			// add query var
			add_filter( 'query_vars', [ $this, 'query_vars' ], 1 );
			add_action( 'init', [ $this, 'init' ] );

			// my account
			add_filter( 'woocommerce_account_menu_items', [ $this, 'account_items' ], 99 );
			add_action( 'woocommerce_account_wishlist_endpoint', [ $this, 'account_endpoint' ], 99 );
			
			// frontend scripts
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

			// add
			add_action( 'wp_ajax_wishlist_add', [ $this, 'wishlist_add' ] );
			add_action( 'wp_ajax_nopriv_wishlist_add', [ $this, 'wishlist_add' ] );

			// remove
			add_action( 'wp_ajax_wishlist_remove', [ $this, 'wishlist_remove' ] );
			add_action( 'wp_ajax_nopriv_wishlist_remove', [ $this, 'wishlist_remove' ] );

			// load count
			add_action( 'wp_ajax_wishlist_load_count', [ $this, 'wishlist_load_count' ] );
			add_action( 'wp_ajax_nopriv_wishlist_load_count', [ $this, 'wishlist_load_count' ] );

			// fragments
			add_action( 'wp_ajax_klbwl_get_data', [ $this, 'get_data' ] );
			add_action( 'wp_ajax_nopriv_klbwl_get_data', [ $this, 'get_data' ] );

			// footer
			add_action( 'wp_footer', [ $this, 'wp_footer' ] );

			// user login & logout
			add_action( 'wp_login', [ $this, 'wp_login' ], 10, 2 );
			add_action( 'wp_logout', [ $this, 'wp_logout' ] );

		}

		function query_vars( $vars ) {
			$vars[] = 'klbwl_id';

			return $vars;
		}

		function init() {
			// get key
			$key = isset( $_COOKIE['klbwl_key'] ) ? sanitize_text_field( $_COOKIE['klbwl_key'] ) : '#';

			// get products
			self::$products = self::get_ids( $key );

			// rewrite
			if ( $page_id = self::get_page_id() ) {
				$page_slug = get_post_field( 'post_name', $page_id );

				if ( $page_slug !== '' ) {
					add_rewrite_rule( '^' . $page_slug . '/([\w]+)/?', 'index.php?page_id=' . $page_id . '&klbwl_id=$matches[1]', 'top' );
					add_rewrite_rule( '(.*?)/' . $page_slug . '/([\w]+)/?', 'index.php?page_id=' . $page_id . '&klbwl_id=$matches[2]', 'top' );
				}
			}

			// my account page
			add_rewrite_endpoint( 'wishlist', EP_PAGES );
			
			// shortcode
			add_shortcode( 'klbwl_list', [ $this, 'shortcode_list' ] );

			// add button for blonwe_wishlist_action
			add_action( 'blonwe_wishlist_action', [ $this, 'blonwe_wishlist_button' ], 11 );

			// add button for single
			if(get_theme_mod('blonwe_single_type') == 'type3'){
				add_action( 'blonwe_single_wishlist', [$this,'blonwe_wishlist_button'], 32);
			} else {
				add_action( 'woocommerce_single_product_summary', [$this,'blonwe_wishlist_button'], 32);
			}
		}

		function wishlist_add() {
			$return = [ 'status' => 0 ];
			$key    = self::get_key();

			if ( ( $product_id = (int) sanitize_text_field( $_POST['product_id'] ) ) > 0 ) {
				
				$products = self::get_ids( $key );

				if ( ! array_key_exists( $product_id, $products ) ) {
					// insert if not exists
					$product  = wc_get_product( $product_id );
					$products = [
									$product_id => [
										'time'   => time(),
										'price'  => is_a( $product, 'WC_Product' ) ? $product->get_price() : 0,
										'parent' => wp_get_post_parent_id( $product_id ) ?: 0,
										'note'   => ''
									]
								] + $products;
					update_option( 'klbwl_list_' . $key, $products );
					self::update_product_count( $product_id, 'add' );
					$return['notice'] = esc_html__( '{name} has been added to Wishlist.', 'blonwe-core' );
				} else {
					$return['notice'] = esc_html__( '{name} is already in the Wishlist.', 'blonwe-core' );
				}
				
				
				$totalcount = get_post_meta( $product_id, 'klbwl_count', true );
				
				
				$return['status'] = 1;
				$return['count']  = count( $products );
				$return['totalcount'] = sprintf(_n('%d person', '%d people', $totalcount, 'blonwe-core'), $totalcount);
				$return['data']   = [
					'key'       => self::get_key(),
					'ids'       => self::get_ids(),
				];

				
				$return['content'] = self::wishlist_content( $key );
				
			} else {
				$product_id       = 0;
				$return['status'] = 0;
				$return['notice'] = esc_html__( 'Have an error, please try again!', 'blonwe-core' );
			}

			do_action( 'klbwl_add', $product_id, $key );

			wp_send_json( $return );
		}

		function wishlist_remove() {
			$return = [ 'status' => 0 ];
			$key    = sanitize_text_field( $_POST['key'] );

			if ( empty( $key ) ) {
				$key = self::get_key();
			}

			if ( ( $product_id = (int) sanitize_text_field( $_POST['product_id'] ) ) > 0 ) {
				$products = self::get_ids( $key );

				if ( array_key_exists( $product_id, $products ) ) {
					unset( $products[ $product_id ] );
					update_option( 'klbwl_list_' . $key, $products );
					self::update_product_count( $product_id, 'remove' );
					$return['count']  = count( $products );
					$return['status'] = 1;
					$return['notice'] = esc_html__( 'Product has been removed from the Wishlist.', 'blonwe-core' );
					$return['data']   = [
						'key'       => self::get_key(),
						'ids'       => self::get_ids(),
					];

					if ( empty( $products ) ) {
						$return['content'] = self::wishlist_content( $key, esc_html__( 'There are no products on the Wishlist!', 'blonwe-core' )) . '</div>';
					}
				} else {
					$return['notice'] = esc_html__( 'The product does not exist on the Wishlist!', 'blonwe-core' );
				}
			} else {
				$product_id       = 0;
				$return['notice'] = esc_html__( 'Have an error, please try again!', 'blonwe-core' );
			}

			do_action( 'klbwl_remove', $product_id, $key );

			wp_send_json( $return );
		}

		function wishlist_load_count() {
			$return = [ 'status' => 0, 'count' => 0 ];
			$key    = self::get_key();

			$products         = self::get_ids( $key );
			$return['status'] = 1;
			$return['count']  = count( $products );

			do_action( 'wishlist_load_count', $key );

			wp_send_json( $return );
		}
		
		function blonwe_wishlist_button() {
			$output = $product_name = $product_image = '';

			global $product;
			
			$wishlist = get_theme_mod( 'blonwe_wishlist_button', '0' );
			
			if($wishlist == '1'){
				
				
				
				$attr_id      = $product->get_id();
				$product_name     = $product->get_name();
				$product_image_id = $product->get_image_id();
				$product_image    = wp_get_attachment_image_url( $product_image_id );
						
				if ( $attr_id ) {
					$class = 'klbwl-btn klbwl-btn-' . esc_attr( $attr_id );
					
					if ( array_key_exists( $attr_id, self::$products ) || in_array( $attr_id, array_column( self::$products, 'parent' ) ) ) {
						$class .= ' klbwl-product-in-list';
						$text  = apply_filters( 'klbwl_button_text_added', esc_html__( 'View wishlist', 'blonwe-core' ) );
					} else {
						$text = apply_filters( 'klbwl_button_text', esc_html__( 'Add to wishlist', 'blonwe-core' ) );
					}
					
					$output .= '<div class="wishlist-button">';
					$output .= '<a href="'.esc_url( self::get_url() ).'" class="'.esc_attr( $class ).'" data-product_id="'.esc_attr( $attr_id ).'" data-product_title="'. esc_attr($product_name ).'">'.esc_html($text).'</a>';
					
					if ( is_product() && ( $count = (int) get_post_meta( $attr_id, 'klbwl_count', true ) ) > 0 ) {
						$output .= '<span><strong class="totalcount">'.sprintf(_n('%d person', '%d people', $count, 'blonwe-core'), $count).'</strong> '.esc_html__('favorited this product', 'blonwe-core').'</span>';
					}
					
					$output .= '</div><!-- wishlist-button -->';
				}

				echo $output;
			}
		}
		
		
		function blonwe_klbwl_total_count(){
			global $product;
			$output;
			
			$attr_id      = $product->get_id();
			
			if ( ( $count = (int) get_post_meta( $attr_id, 'klbwl_count', true ) ) > 0 ) {
				$output .= $count;
			}
			
			echo $output;
		}

		function shortcode_list( $attrs ) {
			$attrs = shortcode_atts( [
				'key' => null
			], $attrs, 'klbwl_list' );

			if ( ! empty( $attrs['key'] ) ) {
				$key = $attrs['key'];
			} else {
				if ( get_query_var( 'klbwl_id' ) ) {
					$key = get_query_var( 'klbwl_id' );
				} else {
					$key = self::get_key();
				}
			}

			$share_url_raw = self::get_url( $key, true );
			$share_url     = urlencode( $share_url_raw );
			$return_html   = '<div class="klbwl-list woocommerce-cart-form">';
			$return_html   .= self::get_items( $key, 'table' );
			$return_html   .= '<div class="klbwl-actions">';

			$return_html .= '<div class="footer-social">';
			$return_html .= '<div class="site-social">';
			$return_html .= '<div class="social-label">'.esc_html__('Share on:', 'blonwe-core').'</div>';
			$return_html .= '<ul class="color-theme rounded-style">';
			$return_html .= '<li><a href="https://www.facebook.com/sharer.php?u=' . $share_url . '" class="facebook"><i class="klb-social-icon-facebook"></i></a></li>';
			$return_html .= '<li><a href="https://twitter.com/share?url=' . $share_url . '" class="instagram"><i class="klb-social-icon-twitter"></i></a></li>';
			$return_html .= '<li><a href="https://pinterest.com/pin/create/button/?url=' . $share_url . '" class="telegram"><i class="klb-social-icon-pinterest"></i></a></li>';
			$return_html .= '<li><a href="mailto:?body=' . $share_url . '" class="telegram"><i class="klb-icon-envelope"></i></a></li>';
			$return_html .= '</ul>';
			$return_html .= '</div>';
			$return_html .= '</div>';

			$return_html .= '</div><!-- /klbwl-actions -->';
			$return_html .= '</div><!-- /klbwl-list -->';

			return $return_html;
		}


		function account_items( $items ) {
			if ( ! isset( $items['wishlist'] ) ) {
				$items['wishlist'] = apply_filters( 'klbwl_myaccount_wishlist_label', esc_html__( 'Wishlist', 'blonwe-core' ) );
			}

			return $items;
		}

		function account_endpoint() {
			echo apply_filters( 'klbwl_myaccount_wishlist_content', do_shortcode( '[klbwl_list]' ) );
		}

		function enqueue_scripts() {
			
			// main style
			wp_enqueue_style( 'blonwe-wishlist', plugins_url( 'css/wishlist.css', __FILE__ ), false, '1.0');

			// main js
			wp_enqueue_script( 'blonwe-wishlist',  plugins_url( 'js/wishlist.js', __FILE__ ),[
				'jquery',
				'js-cookie'
			], true );


			// localize
			wp_localize_script( 'blonwe-wishlist', 'klbwl_vars', [
					'ajax_url'            => admin_url( 'admin-ajax.php' ),
					'wishlist_url'        => self::get_url(),
					'empty_confirm'       => esc_html__( 'This action cannot be undone. Are you sure?', 'blonwe-core' ),
					'delete_confirm'      => esc_html__( 'This action cannot be undone. Are you sure?', 'blonwe-core' ),
					'menu_text'           => apply_filters( 'klbwl_menu_item_label', esc_html__( 'Wishlist', 'blonwe-core' ) ),
					'button_text'         => apply_filters( 'klbwl_button_text', esc_html__( 'Add to wishlist', 'blonwe-core' ) ),
					'button_text_added'   => apply_filters( 'klbwl_button_text_added', esc_html__( 'View wishlist', 'blonwe-core' ) ),
				]
			);
		}

		function get_items( $key, $layout = null ) {
			ob_start();
			// store $global_product
			global $product;
			$global_product = $product;
			$products       = self::get_ids( $key );
			$table_tag      = $tr_tag = $td_tag = 'div';
			$count          = count( $products ); // count saved products
			$real_count     = 0; // count real products
			$real_products  = [];

			if ( $layout === 'table' ) {
				$table_tag = 'table';
				$tr_tag    = 'tr';
				$td_tag    = 'td';
			}

			if ( is_array( $products ) && ( count( $products ) > 0 ) ) {
				
				echo '<table class="table shop_table" cellspacing="0">';
				echo '<thead>';
				echo '<tr>';
				echo '<th class="product-thumbnail"><span class="screen-reader-text">'.esc_html__( 'Thumbnail image', 'blonwe-core' ).'</span></th>';
				echo '<th class="product-name">'.esc_html__( 'Product', 'blonwe-core' ).'</th>';
				echo '<th class="product-price">'.esc_html__( 'Price', 'blonwe-core' ).'</th>';
				echo '<th class="product-date">'.esc_html__( 'Date Added', 'blonwe-core' ).'</th>';
				echo '<th class="product-subtotal">'.esc_html__( 'Stock', 'blonwe-core' ).'</th>';
				echo '<th class="product-addtocart">'.esc_html__( 'Add to cart', 'blonwe-core' ).'</th>';
				echo '<th class="product-remove"><span class="screen-reader-text">'.esc_html__( 'Remove item', 'blonwe-core' ).'</span></th>';
				echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				foreach ( $products as $product_id => $product_data ) {
					global $product;
					$product = wc_get_product( $product_id );
					
					if ( ! $product || $product->get_status() !== 'publish' ) {
						continue;
					}
					
					if ( is_array( $product_data ) && isset( $product_data['time'] ) ) {
						$product_time = date_i18n( get_option( 'date_format' ), $product_data['time'] );
					} else {
						// for old version
						$product_time = date_i18n( get_option( 'date_format' ), $product_data );
					}
					
					echo '<tr class="klbwl-item"  data-product_id="' . esc_attr( $product_id ) . '">';
					
					//Image
					echo '<td class="klbwl-item--image">';
					echo '<a href="' . esc_url( $product->get_permalink() ) . '">';
					echo $product->get_image('thumbnail');
					echo '</a>';
					echo '</td>';
					
					//Name
					echo '<td class="klbwl-item--name">';
					echo '<a href="' . esc_url( $product->get_permalink() ) . '">';
					echo $product->get_name();
					echo '</a>';
					echo '</td>';
					
					//Price
					echo '<td class="klbwl-item--price">';
					echo $product->get_price_html();
					echo '</td>';
				
					//Date Added
					echo '<td class="klbwl-item--date">';
					echo $product_time;
					echo '</td>';
					
					//Stock
					echo '<td class="klbwl-item--stock">';
					echo wc_get_stock_html( $product );
					echo '</td>';
					
					//Add-to-cart
					echo '<td class="klbwl-item--addtocart">';
					echo do_shortcode( '[add_to_cart style="" show_price="false" id="' . esc_attr( $product_id ) . '"]' );
					echo '</td>';
					
					// Remove
					echo '<td class="klbwl-item--remove">';
					echo '<span><i class="klb-icon-xmark"></i></span>';
					echo '</td>';
					
					echo '</tr>';
					
					$real_products[ $product_id ] = $product_data;
					$real_count ++;
				}
				echo '</tbody>';
				echo '</table>';
			} else {
				echo '<div class="klbwl-no-result">
						<div class="cart-empty-page">
							<div class="empty-icon">
								<i class="klb-icon-heart-outline"></i>
							</div>
							<p class="cart-empty">'.esc_html__( 'The wishlist table is empty.', 'blonwe-core' ).'</p>
							<p class="return-to-shop">
								<a class="button wc-backward'.esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ).'" href="'.esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'">
									'.esc_html( apply_filters( 'woocommerce_return_to_shop_text', esc_html__( 'Return to shop', 'blonwe-core' ) ) ).'
								</a>
							</p>
						</div>
					</div>';
			}

			// restore $global_product
			$product = $global_product;

			// update products
			if ( $real_count < $count ) {
				update_option( 'klbwl_list_' . $key, $real_products );
			}

			return apply_filters( 'klbwl_wishlist_items', ob_get_clean(), $key, $products );
		}

		function wp_footer() {
			if ( is_admin() ) {
				return;
			}

			echo '<div id="klbwl_wishlist" class="klbwl-popup"></div>';
		}

		function wishlist_content( $key = false, $message = '' ) {
			if ( empty( $key ) ) {
				$key = self::get_key();
			}

			$products = self::get_ids( $key );
			$count    = count( $products );
			$name     = esc_html__( 'Wishlist', 'blonwe-core' );

			ob_start();
			?>
			<div class="klbwl-popup-inner" data-key="<?php echo esc_attr( $key ); ?>">
				<div class="klbwl-popup-content">
					<div class="klbwl-notice"></div>
					
					<a class="btn primary klbwl-page" href="<?php echo esc_url( self::get_url( $key, true ) ); ?>">
						<i class="klb-icon-heart-outline"></i> <?php echo esc_html__( 'View Wishlist', 'blonwe-core' ); ?>
					</a>
					<a class="btn primary klbwl-popup-close" href="#" data-url="#">
						<i class="klb-icon-xmark"></i> <?php echo esc_html__( 'Close', 'blonwe-core' ); ?>
					</a>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}


		function update_product_count( $product_id, $action = 'add' ) {
			$meta_count = 'klbwl_count';
			$meta_time  = ( $action === 'add' ? 'klbwl_add' : 'klbwl_remove' );
			$count      = get_post_meta( $product_id, $meta_count, true );
			$new_count  = 0;

			if ( $action === 'add' ) {
				if ( $count ) {
					$new_count = absint( $count ) + 1;
				} else {
					$new_count = 1;
				}
			} elseif ( $action === 'remove' ) {
				if ( $count && ( absint( $count ) > 1 ) ) {
					$new_count = absint( $count ) - 1;
				} else {
					$new_count = 0;
				}
			}

			update_post_meta( $product_id, $meta_count, $new_count );
			update_post_meta( $product_id, $meta_time, time() );
		}

		public static function generate_key() {
			$key         = '';
			$key_str     = apply_filters( 'klbwl_key_characters', '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ' );
			$key_str_len = strlen( $key_str );

			for ( $i = 0; $i < apply_filters( 'klbwl_key_length', 6 ); $i ++ ) {
				$key .= $key_str[ random_int( 0, $key_str_len - 1 ) ];
			}

			return apply_filters( 'klbwl_generate_key', $key );
		}

		public static function can_edit( $key ) {
			if ( is_user_logged_in() ) {
				if ( get_user_meta( get_current_user_id(), 'klbwl_key', true ) === $key ) {
					return true;
				}

				if ( ( $keys = get_user_meta( get_current_user_id(), 'klbwl_keys', true ) ) && isset( $keys[ $key ] ) ) {
					return true;
				}
			} else {
				if ( isset( $_COOKIE['klbwl_key'] ) && ( sanitize_text_field( $_COOKIE['klbwl_key'] ) === $key ) ) {
					return true;
				}
			}

			return false;
		}

		public static function get_page_id() {
			if(get_theme_mod('blonwe_wishlist_page')){
				return absint(get_theme_mod('blonwe_wishlist_page'));
			}

			return false;
		}

		public static function get_key( $new = false ) {
			if ( $new ) {
				// get a new key for multiple wishlist
				$key = self::generate_key();

				while ( self::exists_key( $key ) ) {
					$key = self::generate_key();
				}

				return $key;
			} else {
				if ( is_user_logged_in() && ( ( $user_id = get_current_user_id() ) > 0 ) ) {
					$key = get_user_meta( $user_id, 'klbwl_key', true );

					if ( empty( $key ) ) {
						$key = self::generate_key();

						while ( self::exists_key( $key ) ) {
							$key = self::generate_key();
						}

						// set a new key
						update_user_meta( $user_id, 'klbwl_key', $key );

						// multiple wishlist
						update_user_meta( $user_id, 'klbwl_keys', [
							$key => [
								'type' => 'primary',
								'name' => '',
								'time' => ''
							]
						] );
					}

					return $key;
				}

				if ( isset( $_COOKIE['klbwl_key'] ) ) {
					return trim( sanitize_text_field( $_COOKIE['klbwl_key'] ) );
				}

				return 'KLBWISHLIST';
			}
		}

		public static function exists_key( $key ) {
			if ( get_option( 'klbwl_list_' . $key ) ) {
				return true;
			}

			return false;
		}

		public static function get_ids( $key = null ) {
			if ( ! $key ) {
				$key = self::get_key();
			}

			return (array) get_option( 'klbwl_list_' . $key, [] );
		}

		public static function get_url( $key = null, $full = false ) {
			$url = home_url( '/' );

			if ( $page_id = self::get_page_id() ) {
				if ( $full ) {
					if ( ! $key ) {
						$key = self::get_key();
					}

					if ( get_option( 'permalink_structure' ) !== '' ) {
						$url = trailingslashit( get_permalink( $page_id ) ) . $key;
					} else {
						$url = get_permalink( $page_id ) . '&klbwl_id=' . $key;
					}
				} else {
					$url = get_permalink( $page_id );
				}
			}

			return esc_url( apply_filters( 'klbwl_wishlist_url', $url, $key ) );
		}

		public static function get_count( $key = null ) {
			if ( ! $key ) {
				$key = self::get_key();
			}

			$products = self::get_ids( $key );
			$count    = count( $products );

			return esc_html( apply_filters( 'klbwl_wishlist_count', $count, $key ) );
		}



		function request( $vars ) {
			if ( isset( $vars['orderby'] ) && 'klbwl' == $vars['orderby'] ) {
				$vars = array_merge( $vars, [
					'meta_key' => 'klbwl_count',
					'orderby'  => 'meta_value_num'
				] );
			}

			return $vars;
		}

		function wp_login( $user_login, $user ) {
			if ( isset( $user->data->ID ) ) {
				$key = get_user_meta( $user->data->ID, 'klbwl_key', true );

				if ( empty( $key ) ) {
					$key = self::generate_key();

					while ( self::exists_key( $key ) ) {
						$key = self::generate_key();
					}

					// set a new key
					update_user_meta( $user->data->ID, 'klbwl_key', $key );
				}

				// multiple wishlist
				if ( ! get_user_meta( $user->data->ID, 'klbwl_keys', true ) ) {
					update_user_meta( $user->data->ID, 'klbwl_keys', [
						$key => [
							'type' => 'primary',
							'name' => '',
							'time' => ''
						]
					] );
				}

				$secure   = apply_filters( 'klbwl_cookie_secure', wc_site_is_https() && is_ssl() );
				$httponly = apply_filters( 'klbwl_cookie_httponly', false );

				if ( isset( $_COOKIE['klbwl_key'] ) && ! empty( $_COOKIE['klbwl_key'] ) ) {
					wc_setcookie( 'klbwl_key_ori', trim( sanitize_text_field( $_COOKIE['klbwl_key'] ) ), time() + 604800, $secure, $httponly );
				}

				wc_setcookie( 'klbwl_key', $key, time() + 604800, $secure, $httponly );
			}
		}

		function wp_logout( $user_id ) {
			if ( isset( $_COOKIE['klbwl_key_ori'] ) && ! empty( $_COOKIE['klbwl_key_ori'] ) ) {
				$secure   = apply_filters( 'klbwl_cookie_secure', wc_site_is_https() && is_ssl() );
				$httponly = apply_filters( 'klbwl_cookie_httponly', false );

				wc_setcookie( 'klbwl_key', trim( sanitize_text_field( $_COOKIE['klbwl_key_ori'] ) ), time() + 604800, $secure, $httponly );
			} else {
				unset( $_COOKIE['klbwl_key_ori'] );
				unset( $_COOKIE['klbwl_key'] );
			}
		}

		function get_data() {
			$data = [
				'key'       => self::get_key(),
				'ids'       => self::get_ids(),
			];

			wp_send_json( $data );
		}
		
		function blonwe_delete_all_data(){
			foreach ( wp_load_alloptions() as $option => $value ) {
				if ( strpos( $option, 'klbwl_' ) === 0 ) {
					delete_option( $option );
					
				}
			}

			delete_post_meta_by_key('klbwl_count');
			delete_post_meta_by_key('klbwl_add');
			delete_post_meta_by_key('klbwl_remove');
		}
	}

	return KlbWishlist::instance();
}