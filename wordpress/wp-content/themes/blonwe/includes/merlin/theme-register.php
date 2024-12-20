<?php 

function blonwe_get_registered_purchase_code() {
	update_option('envato_purchase_code_48378751', 'aba3a6c2-2008-494c-b9e1-c9d743352645');
	return get_option( 'envato_purchase_code_48378751' );
}

add_action( 'admin_menu', 'blonwe_register_theme' );
function blonwe_register_theme() {
	add_menu_page( esc_html__( 'KlbTheme', 'blonwe' ), esc_html__( 'KlbTheme', 'blonwe' ), 'manage_options', 'klbtheme_options', 'blonwe_register_theme_options', 'dashicons-welcome-widgets-menus', 2);
	add_submenu_page( 'klbtheme_options', esc_html__('Register Theme', 'blonwe'), esc_html__('Register Theme', 'blonwe'), 'manage_options', 'klbtheme_options', 'blonwe_register_theme_options' );
	add_submenu_page( 'klbtheme_options', esc_html__('Theme Options', 'blonwe'), esc_html__('Theme Options', 'blonwe'), 'manage_options', 'customize.php?return=admin.php?page=klbtheme_options' );
}

function blonwe_register_theme_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	

	echo '<div class="" id="klb-theme-registration">';

	?>
	
	<?php if(!empty(blonwe_get_registered_purchase_code())){ ?>
		<div class="klb-help-container registered-container">
			<div class="registered-left">
				<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g id="Layer_2" data-name="Layer 2"><path d="m21 2.87109h-18a1.75213 1.75213 0 0 0 -1.75 1.75v12a1.75212 1.75212 0 0 0 1.75 1.75h4.50879a1.25374 1.25374 0 0 1 .92969.41358l1.88867 2.09912a2.2504 2.2504 0 0 0 3.3457 0l1.8877-2.09863a1.25609 1.25609 0 0 1 .93066-.41407h4.50879a1.75212 1.75212 0 0 0 1.75-1.75v-12a1.75213 1.75213 0 0 0 -1.75-1.75z" fill="#0db561"/><path d="m11 14.5a1.00385 1.00385 0 0 1 -.707-.29346l-2.5-2.49954a.99989.99989 0 1 1 1.414-1.414l1.75488 1.75439 3.79493-4.21631a1.00005 1.00005 0 1 1 1.48632 1.33838l-4.5 5a1.00582 1.00582 0 0 1 -.71679.33008z" fill="#fff"/></g></svg>
			</div>
			<div class="registered-right"> 
				<h2><?php esc_html_e('The theme registered','blonwe'); ?></h2>
				<p><?php esc_html_e('Envato allows 1 license for 1 project located on 1 domain. It means that 1 purchase key can be used only for 1 site. Each additional site will require an additional purchase key.','blonwe'); ?></p>
			</div>
		</div>
	<?php } ?>

	<div class="klb-help-container">
		<div class="klb-help-item">
			<a href="https://klbtheme.com/doc/blonwe" target="_blank">
				<svg id="Layer_1" enable-background="new 0 0 50 50" height="512" viewBox="0 0 50 50" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><g><g><g><g enable-background="new"><g><path d="m2.20071 15.9276 24.1803-14.0521-1.1547-.6667-24.1803 14.0521z" fill="#fe91ab"/></g><g><path d="m28.26361 22.8806c-1.066-.6163-1.9302-2.1143-1.9259-3.3369l.0373-17.6641-8.2262 4.7801-15.9482 9.2669-.0435 17.6678c-.0021 1.2242.862 2.7227 1.9281 3.3369.5363.3108 1.0227.3387 1.3744.1349l24.1806-14.0529c-.3518.2039-.8403.176-1.3766-.1327z" fill="#ed5d71"/></g><g><g><path d="m3.16611 16.5965 3.2655 1.8847.2381.1377v18.7212c-.3153-.0188-.6635-.1266-1.0306-.3383-1.3874-.8033-2.5143-2.7532-2.51-4.3468z" fill="#e3e7f0"/></g></g><g><path d="m31.40261 4.7749-.0434 17.6674c-.0044.9706-.3474 1.6566-.90331 1.9779l-24.18049 14.0528c.5558-.3236.8988-1.0075.9032-1.9802l.0434-17.6674z" fill="#ed5d71"/></g></g></g></g><g><path d="m6.27541 18.3917 22.7005-13.1921-3.1093-1.7952-22.7005 13.1921z" fill="#fff"/></g><g><path d="m1.04601 15.2609-.0439 17.6671c-.0056 1.9561 1.3749 4.3479 3.0778 5.3311 1.7028.9831 3.0924.1906 3.0979-1.7655l.044-17.6671-1.1548-.6667-.0439 17.6671c-.0035 1.2245-.8733 1.7208-1.9394 1.1053-1.0662-.6156-1.9304-2.113-1.9269-3.3375l.0439-17.6671z" fill="#d3374e"/></g><g><path d="m7.22181 18.8265 24.1802-14.0521-1.1547-.6667-24.1803 14.0521z" fill="#fe91ab"/></g></g><path d="m31.40871 1.8773-5.7494 3.3416-2.4829 4.3361 8.2262-4.7801z" fill="#ed5d71"/><path d="m25.66001 5.2189-2.4827 4.3355-1.1548-.6667 2.4828-4.3354z" fill="#d3374e"/><g><path d="m25.66001 5.219 5.7486-3.3408-1.1547-.6667-5.7486 3.3408z" fill="#fe91ab"/></g></g><g><g><g><g><g enable-background="new"><g><path d="m10.99531 20.9825 24.1803-14.0521-1.1547-.6667-24.1803 14.0521z" fill="#ffdd94"/></g><g><path d="m37.05821 27.9355c-1.066-.6162-1.9302-2.1143-1.9259-3.3368l.0373-17.6642-8.2262 4.7802-15.9482 9.2669-.0434 17.6678c-.0022 1.2241.862 2.7227 1.928 3.3368.5363.3108 1.0227.3387 1.3744.1349l24.1806-14.0528c-.3517.2038-.8403.1759-1.3766-.1328z" fill="#febb61"/></g><g><g><path d="m11.96071 21.6514 3.2655 1.8847.2381.1377v18.7212c-.3153-.0187-.6635-.1266-1.0306-.3383-1.3874-.8033-2.5143-2.7531-2.51-4.3468z" fill="#e3e7f0"/></g></g><g><path d="m40.19721 9.8298-.0434 17.6674c-.0044.9706-.3474 1.6566-.9033 1.978l-24.1805 14.0527c.5558-.3235.8988-1.0074.9032-1.9802l.0434-17.6674z" fill="#febb61"/></g></g></g></g><g><path d="m15.07001 23.4466 22.7005-13.1921-3.1093-1.7952-22.7005 13.1921z" fill="#fff"/></g><g><path d="m9.84061 20.3158-.0439 17.6671c-.0056 1.9561 1.3749 4.3479 3.0778 5.3311 1.7029.9831 3.0924.1906 3.098-1.7655l.0439-17.6671-1.1548-.6667-.0439 17.6671c-.0035 1.2245-.8733 1.7208-1.9394 1.1053-1.0662-.6155-1.9304-2.113-1.9269-3.3375l.0439-17.6671z" fill="#efa143"/></g><g><path d="m16.01641 23.8814 24.1803-14.0521-1.1548-.6667-24.1803 14.0521z" fill="#ffdd94"/></g></g><path d="m40.20331 6.9322-5.7494 3.3417-2.4829 4.336 8.2262-4.7801z" fill="#febb61"/><path d="m34.45461 10.2739-2.4827 4.3354-1.1548-.6666 2.4828-4.3355z" fill="#efa143"/><g><path d="m34.45461 10.2739 5.7486-3.3407-1.1547-.6667-5.7486 3.3407z" fill="#ffdd94"/></g></g><g><g><g><g><g enable-background="new"><g><path d="m19.79001 26.0374 24.1802-14.052-1.1547-.6667-24.1803 14.052z" fill="#7bb1ff"/></g><g><path d="m45.85281 32.9905c-1.066-.6163-1.9302-2.1144-1.9258-3.3369l.0372-17.6641-8.22621 4.7801-15.9482 9.2669-.0434 17.6678c-.0022 1.2241.862 2.7227 1.928 3.3369.5363.3107 1.0227.3387 1.3744.1348l24.1806-14.0528c-.35169.2038-.84029.1759-1.37659-.1327z" fill="#5793fb"/></g><g><g><path d="m20.75531 26.7064 3.2655 1.8846.2381.1378v18.7212c-.3153-.0188-.6635-.1266-1.0306-.3383-1.3874-.8033-2.5143-2.7532-2.5099-4.3469z" fill="#e3e7f0"/></g></g><g><path d="m48.99181 14.8847-.0434 17.6674c-.0043.9706-.3474 1.6567-.90319 1.978l-24.1806 14.0528c.5558-.3236.8989-1.0075.9032-1.9802l.0434-17.6674z" fill="#5793fb"/><g fill="#e3e7f0"><path d="m41.17881 34.5208 5.8875-3.4211s-.0037 1.1592-.0028 1.2319l-5.89029 3.4235z"/><path d="m41.17881 32.1931 5.8875-3.4212s-.0037 1.1592-.0028 1.232l-5.89029 3.4235z"/><path d="m41.17881 29.8654 5.8875-3.4212s-.0037 1.1592-.0028 1.232l-5.89029 3.4235z"/></g></g></g></g></g><g><path d="m23.86461 28.5015 22.7005-13.1921-3.1093-1.7951-22.7005 13.1921z" fill="#fff"/></g><g><path d="m18.63521 25.3707-.0439 17.6672c-.0056 1.956 1.375 4.3479 3.0778 5.331 1.7029.9832 3.0924.1906 3.098-1.7654l.0439-17.6672-1.1547-.6667-.044 17.6672c-.0034 1.2244-.8733 1.7207-1.9394 1.1052s-1.9303-2.113-1.9269-3.3374l.044-17.6672z" fill="#3a53d0"/></g><g><path d="m24.81101 28.9363 24.1803-14.052-1.1548-.6667-24.1802 14.052z" fill="#7bb1ff"/></g></g><path d="m48.99791 11.9872-5.7494 3.3416-2.4829 4.3361 8.2262-4.7802z" fill="#5793fb"/><path d="m43.24931 15.3288-2.4828 4.3354-1.1547-.6666 2.4827-4.3354z" fill="#3a53d0"/><g><path d="m43.24921 15.3288 5.7486-3.3407-1.1547-.6667-5.7486 3.3407z" fill="#7bb1ff"/></g></g></g></svg>
				<h2><?php esc_html_e('Documentation', 'blonwe'); ?></h2>
			</a>
		</div>
		
		<div class="klb-help-item">
			<a href="https://themeforest.net/user/klbtheme#contact" target="_blank">
				<svg id="Layer_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><g id="XMLID_33_" stroke="#000" stroke-miterlimit="10" stroke-width="6"><path id="XMLID_52_" d="m225.4 15.6-146.9 110.7c-11.9 9-18.9 23-18.9 38v294.1c0 26.3 21.3 47.6 47.6 47.6h297.8c26.3 0 47.6-21.3 47.6-47.6v-293.8c0-15.1-7.2-29.3-19.4-38.3l-151-111c-16.9-12.5-40-12.4-56.8.3z" fill="#e55a42"/><path id="XMLID_85_" d="m372.3 323.6h-232.6c-27 0-48.9-21.9-48.9-48.9v-170.4c0-32.5 26.4-58.9 58.9-58.9h212.6c32.5 0 58.9 26.4 58.9 58.9v170.4c0 27-21.9 48.9-48.9 48.9z" fill="#d6d9db"/><g fill="none"><path id="XMLID_79_" d="m388.2 201.7h-264.4c-4.2 0-7.6-3.4-7.6-7.6 0-4.2 3.4-7.6 7.6-7.6h264.5c4.2 0 7.6 3.4 7.6 7.6-.1 4.2-3.5 7.6-7.7 7.6z"/><path id="XMLID_76_" d="m388.2 250.5h-264.4c-4.2 0-7.6-3.4-7.6-7.6 0-4.2 3.4-7.6 7.6-7.6h264.5c4.2 0 7.6 3.4 7.6 7.6-.1 4.2-3.5 7.6-7.7 7.6z"/><path id="XMLID_56_" d="m388.2 299.3h-264.4c-4.2 0-7.6-3.4-7.6-7.6 0-4.2 3.4-7.6 7.6-7.6h264.5c4.2 0 7.6 3.4 7.6 7.6-.1 4.2-3.5 7.6-7.7 7.6z"/></g><g id="XMLID_53_" fill="#e55a42"><path id="XMLID_55_" d="m447.9 465-188.3-139c-1.7-1.3-1.7-4.1 0-5.4l188.2-139.1c2-1.5 4.6.1 4.6 2.7v278.1c.1 2.6-2.6 4.2-4.5 2.7z"/><path id="XMLID_54_" d="m64.1 465 188.3-139c1.7-1.3 1.7-4.1 0-5.4l-188.3-139.1c-2-1.5-4.6.1-4.6 2.7v278.1c0 2.6 2.7 4.2 4.6 2.7z"/></g><path id="XMLID_51_" d="m388.2 104h-264.4c-4.2 0-7.6-3.4-7.6-7.6 0-4.2 3.4-7.6 7.6-7.6h264.5c4.2 0 7.6 3.4 7.6 7.6-.1 4.2-3.5 7.6-7.7 7.6z" fill="none"/><path id="XMLID_49_" d="m388.2 152.8h-264.4c-4.2 0-7.6-3.4-7.6-7.6 0-4.2 3.4-7.6 7.6-7.6h264.5c4.2 0 7.6 3.4 7.6 7.6-.1 4.2-3.5 7.6-7.7 7.6z" fill="none"/></g></svg>
				<h2><?php esc_html_e('Reset License', 'blonwe'); ?></h2>
			</a>
		</div>
		
		<div class="klb-help-item">
			<a href="https://klbtheme.ticksy.com/" target="_blank">
				<svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512" xmlns="http://www.w3.org/2000/svg"><g><g><g><g><path d="m7.5 86.973c0-44.281 36.215-80.103 80.643-79.464 43.035.619 78.028 35.912 78.3 78.95.152 24.102-10.428 45.734-27.24 60.407-1.774 1.548-1.519 4.374.508 5.573l14.975 8.86c2.421 1.432 1.405 5.144-1.408 5.143l-67.81-.017c-43.197-.802-77.968-36.064-77.968-79.452z" fill="#7acaa6"/></g></g><path d="m154.686 161.299-14.975-8.86c-2.016-1.193-2.296-4.014-.531-5.554 17.004-14.829 27.64-36.775 27.255-61.198-.667-42.245-34.859-76.922-77.092-78.153-5.989-.174-11.833.316-17.467 1.399 36.505 6.998 64.325 39.175 64.567 77.526.117 18.573-6.138 35.679-16.708 49.264-6.382 8.203-4.308 20.099 4.637 25.391l.313.185c2.395 1.417 1.423 5.057-1.32 5.136l29.912.007c2.814.001 3.83-3.71 1.409-5.143z" fill="#57be92"/><g><g><path d="m394.73 295.967h-180.286c-45.029 0-69.67-52.476-40.911-87.124l1.599-1.927c12.67-15.264 19.605-34.478 19.605-54.315v-34.766c.001-60.937 49.399-110.335 110.335-110.335 60.936 0 110.334 49.398 110.334 110.334v35.94c0 20.045 7.081 39.446 19.992 54.779 29.119 34.578 4.537 87.414-40.668 87.414z" fill="#c59191"/><path d="m489.5 385.31v119.19h-369.83v-118.29c0-26.78 16.05-50.95 40.74-61.34l59.69-25.96 20.11-8.74c15.25-6.63 25.12-21.67 25.12-38.3v-7.72h78.52v7.32c0 16.71 9.96 31.81 25.31 38.39l80.75 34.61c24.07 10.67 39.59 34.52 39.59 60.84z" fill="#fff"/><path d="m220.099 327.335c20.376 6.088 50.368 12.582 86.925 11.943 34.301-.599 62.459-7.269 82.051-13.527l9.735-23.182-29.646-12.706c-15.358-6.583-25.315-21.684-25.315-38.393v-7.315h-78.523v7.713c0 16.63-9.865 31.676-25.116 38.307l-24.011 10.44z" fill="#ffcebf"/><path d="m449.914 324.473-60.828-26.071-.011.001v206.097h100.425v-119.186c0-26.325-15.518-50.176-39.586-60.841z" fill="#8795de"/><path d="m220.1 298.91v205.59h-100.43v-118.29c0-26.78 16.05-50.95 40.74-61.34z" fill="#8795de"/><g><path d="m326.895 228.159h-17.576c-8 0-14.485-6.485-14.485-14.485 0-8 6.485-14.485 14.485-14.485h17.576c8 0 14.485 6.485 14.485 14.485 0 8-6.485 14.485-14.485 14.485z" fill="#fff"/><path d="m309.319 206.688c-3.852 0-6.985 3.134-6.985 6.985s3.134 6.985 6.985 6.985h17.576c3.852 0 6.985-3.134 6.985-6.985s-3.134-6.985-6.985-6.985z"/></g><g><circle cx="304.587" cy="380.737" r="7.243"/></g></g><g><path d="m331.806 287.253c9.033 0 17.642-1.814 25.489-5.088-8.417-7.77-13.446-18.825-13.446-30.695v-7.315h-78.523v7.713c0 6.008-1.293 11.806-3.657 17.078 11.89 11.334 27.976 18.307 45.7 18.307z" fill="#ffb09e"/><path d="m383.068 126.031v64.959c0 36.596-29.667 66.262-66.262 66.262h-24.438c-36.596 0-66.262-29.667-66.262-66.262v-64.959c0-23.807 19.3-43.107 43.107-43.107h70.748c23.808.001 43.107 19.3 43.107 43.107z" fill="#ffcebf"/><path d="m326.895 228.159h-17.576c-8 0-14.485-6.485-14.485-14.485 0-8 6.485-14.485 14.485-14.485h17.576c8 0 14.485 6.485 14.485 14.485 0 8-6.485 14.485-14.485 14.485z" fill="#685e68"/><g><path d="m320.246 65.732c1.683-21.225 22.002-35.31 41.45-42.605 32.171 19.277 53.709 54.475 53.709 94.707v7.585c-1.779.373-3.549.7-5.298.961-10.714 1.6-19.838.908-26.071 0-40.165-5.351-65.822-35.014-63.79-60.648z" fill="#b98080"/><path d="m305.072 7.5c24.918 0 47.904 8.264 66.374 22.195-9.214 16.033-30.371 47.732-70.045 71.199-29.452 17.422-57.223 23.276-74.325 25.487h-32.337v-8.547c-.001-60.936 49.397-110.334 110.333-110.334z" fill="#c59191"/></g></g></g><path d="m428.409 504.5h-240.086l-13.242-124.918c-.939-8.86 6.007-16.581 14.916-16.581h236.737c8.91 0 15.856 7.721 14.916 16.581z" fill="#efedef"/><path d="m426.734 363h-30c8.91 0 15.856 7.721 14.917 16.581l-13.242 124.919h30l13.242-124.918c.939-8.861-6.007-16.582-14.917-16.582z" fill="#e5e1e5"/><g><path d="m504.5 512h-497c-4.143 0-7.5-3.358-7.5-7.5s3.357-7.5 7.5-7.5h497c4.143 0 7.5 3.358 7.5 7.5s-3.357 7.5-7.5 7.5z" fill="#c9bfc8"/></g><circle cx="308.366" cy="433.75" fill="#c9bfc8" r="21"/></g><path d="m116.973 94.471c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5-7.5 3.358-7.5 7.5 3.358 7.5 7.5 7.5zm-60 0c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5-7.5 3.358-7.5 7.5 3.358 7.5 7.5 7.5zm30 0c4.142 0 7.5-3.358 7.5-7.5s-3.358-7.5-7.5-7.5-7.5 3.358-7.5 7.5 3.358 7.5 7.5 7.5zm-1.645 79.453c.046.001.092.001.138.001l67.809.017h.004c4.685 0 8.662-3.035 9.899-7.553 1.238-4.52-.641-9.159-4.673-11.544l-10.313-6.102c16.576-16.429 25.899-38.845 25.751-62.331-.297-46.968-38.739-85.727-85.693-86.403-48.655-.699-88.25 38.658-88.25 86.964 0 46.323 38.168 85.948 85.328 86.951zm-48.878-138.211c13.83-13.632 32.11-20.977 51.585-20.706 38.853.559 70.662 32.633 70.908 71.499.133 20.969-8.859 40.91-24.671 54.708-2.644 2.306-4.029 5.767-3.709 9.258.32 3.489 2.313 6.637 5.328 8.42l.075.044-50.426-.012c-38.981-.748-70.54-32.862-70.54-71.951 0-19.421 7.618-37.625 21.45-51.26zm468.05 461.287h-7.5v-111.69c0-29.262-17.291-55.834-44.135-67.733l-39.526-16.941c9.618-3.035 18.307-8.447 25.377-15.954 10.667-11.325 16.784-26.692 16.784-42.161 0-14.214-4.966-27.63-14.363-38.801-11.754-13.957-18.227-31.695-18.227-49.949v-35.94c0-31.478-12.259-61.066-34.517-83.313-22.258-22.26-51.849-34.518-83.322-34.518-64.972 0-117.83 52.858-117.83 117.83v34.77c.004 18.888-7.419 36.917-19.481 51.45-15.181 18.29-18.335 43.019-8.23 64.536 7.5 15.972 21.028 27.447 37.223 32.304l-39.25 17.068c-27.537 11.588-45.331 38.379-45.331 68.253v88.29c0 4.142 3.357 7.5 7.5 7.5s7.5-3.358 7.5-7.5v-88.29c0-23.822 14.189-45.187 36.231-54.462l49.198-21.394v17.034.054 28.057h-22.603c-6.37 0-12.467 2.716-16.728 7.452-4.26 4.736-6.318 11.085-5.646 17.419l12.363 116.629h-172.487c-4.143 0-7.5 3.358-7.5 7.5s3.357 7.5 7.5 7.5h180.806.073 240.028.009.01 76.074c4.143 0 7.5-3.358 7.5-7.5s-3.357-7.5-7.5-7.5zm-74.839-283.622c7.091 8.43 10.839 18.507 10.839 29.142 0 11.687-4.63 23.305-12.703 31.877-8.548 9.075-20.291 14.073-33.066 14.073h-9.774l-12.839-5.503c-11.215-4.81-18.887-15.121-20.455-26.99 23.141-12.46 38.908-36.914 38.908-64.987v-56.383c2.195.149 4.388.23 6.575.23 3.607 0 7.2-.205 10.765-.609v19.542c-.001 21.784 7.725 42.954 21.75 59.608zm-122.768 118.401c-26.831.475-53.46-2.925-79.293-10.09v-17.857l2.169-.943c.017-.007.034-.015.052-.022l13.38-5.818c14.894-6.475 25.419-19.737 28.61-35.235 6.531 1.899 13.424 2.937 20.56 2.937h24.439c7.163 0 14.082-1.046 20.635-2.959 3.296 15.427 13.861 28.57 28.762 34.962l14.28 6.12c.009.004.018.008.027.011l1.058.453v16.877c-24.272 7.232-49.367 11.122-74.679 11.564zm74.678 4.052v19.67h-153.971v-18.28c24.314 6.375 49.278 9.601 74.411 9.601 1.714 0 3.429-.015 5.144-.045 25.19-.44 50.174-4.121 74.416-10.946zm26.339-216.727c-20.659 2.791-43.946-2.743-59.99-15.174-3.273-2.536-7.984-1.94-10.522 1.335-2.537 3.274-1.939 7.985 1.335 10.522 10.489 8.126 23.14 13.85 36.838 16.736v40.831c-3.604 8.214-7.616 15.045-16.661 22.507-3.808 3.142-7.976 5.751-12.44 7.821-3.645-7.113-11.048-11.995-19.574-11.995h-17.576c-12.123 0-21.985 9.863-21.985 21.985s9.862 21.985 21.985 21.985h17.576c10.202 0 18.802-6.986 21.271-16.424 10.033-3.823 26.392-17.461 26.396-17.466-5.079 27.267-29.035 47.98-57.752 47.98h-24.441c-32.4 0-58.76-26.359-58.76-58.76v-57.974c25.473-3.993 49.538-12.613 71.608-25.667 33.604-19.877 55.159-45.851 68.167-66.372 22.257 19.823 34.918 48.242 34.525 78.13zm-74.031 94.589c-.011 3.843-3.139 6.966-6.984 6.966h-17.576c-3.852 0-6.985-3.134-6.985-6.985s3.134-6.985 6.985-6.985h17.576c3.844 0 6.971 3.121 6.984 6.962zm-131.639-95.863c0-56.701 46.129-102.83 102.831-102.83 20.335 0 39.767 5.87 56.372 16.798-11.971 19.189-32.12 43.865-63.861 62.641-21.775 12.88-45.66 21.103-70.994 24.441h-.468c-.003 0-.006 0-.01 0s-.006 0-.01 0h-23.86zm-29.134 144.38c-7.605-16.198-5.231-34.813 6.187-48.569 14.327-17.261 22.964-38.589 22.948-61.041v-18.72h16.37v57.11c0 28.089 15.787 52.555 38.949 65.008-1.449 11.959-9.098 22.406-20.34 27.294l-11.908 5.178h-10.871c-17.891 0-33.729-10.062-41.335-26.26zm261.087 116.581-12.531 118.209h-226.592l-12.531-118.209c-.227-2.143.441-4.205 1.882-5.806 1.441-1.602 3.422-2.484 5.576-2.484h236.737c2.154 0 4.135.882 5.576 2.484 1.441 1.601 2.109 3.663 1.883 5.806zm47.807 118.209h-45.255l12.363-116.627c.672-6.335-1.387-12.684-5.646-17.42-4.261-4.736-10.357-7.452-16.728-7.452h-30.164v-29.646c.001-.091.002-.181 0-.272v-15.815l50.301 21.559c21.34 9.46 35.129 30.649 35.129 53.983zm-173.635-91.75c-15.715 0-28.5 12.785-28.5 28.5s12.785 28.5 28.5 28.5 28.5-12.785 28.5-28.5-12.785-28.5-28.5-28.5zm0 42c-7.444 0-13.5-6.056-13.5-13.5s6.056-13.5 13.5-13.5 13.5 6.056 13.5 13.5-6.055 13.5-13.5 13.5z"/></g></svg>
				<h2><?php esc_html_e('Support', 'blonwe'); ?></h2>
			</a>
		</div>
		
		<div class="klb-help-item">
			<a href="https://klbtheme.com/hire-us/" target="_blank">
				<svg id="Capa_1" enable-background="new 0 0 512 512" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><linearGradient id="SVGID_1_" gradientTransform="matrix(-1 0 0 1 1812.17 0)" gradientUnits="userSpaceOnUse" x1="1567.38" x2="1567.38" y1="320.96" y2="-31.44"><stop offset="0" stop-color="#cfd9d9"/><stop offset="1" stop-color="#f0f0f0"/></linearGradient><linearGradient id="lg1"><stop offset="0" stop-color="#ba7e62"/><stop offset="1" stop-color="#d89b80"/></linearGradient><linearGradient id="SVGID_00000047051484212226170340000001684479745691511451_" gradientUnits="userSpaceOnUse" x1="321.268" x2="321.268" xlink:href="#lg1" y1="341.479" y2="222.152"/><linearGradient id="SVGID_00000034796672530730974570000013738578635213641896_" gradientUnits="userSpaceOnUse" x1="421.633" x2="421.633" y1="374.439" y2="184.881"><stop offset="0" stop-color="#00d0e7"/><stop offset="1" stop-color="#a1e8f3"/></linearGradient><linearGradient id="SVGID_00000138559832426599947170000016882656964468604339_" gradientUnits="userSpaceOnUse" x1="17.857" x2="391.306" y1="367.089" y2="367.089"><stop offset="0" stop-color="#ffad6c"/><stop offset="1" stop-color="#fed2a4"/></linearGradient><linearGradient id="SVGID_00000109007452228774798410000017732918395033331369_" gradientUnits="userSpaceOnUse" x1="90.368" x2="90.368" y1="374.129" y2="172.559"><stop offset="0" stop-color="#6680de"/><stop offset="1" stop-color="#96adff"/></linearGradient><linearGradient id="SVGID_00000152965494693323822260000003311581786719208624_" gradientUnits="userSpaceOnUse" x1="233.196" x2="233.196" xlink:href="#lg1" y1="513.354" y2="443.866"/><linearGradient id="SVGID_00000016038033247410521010000006412198100403758270_" gradientUnits="userSpaceOnUse" x1="202.563" x2="202.563" xlink:href="#lg1" y1="472.43" y2="429.583"/><linearGradient id="SVGID_00000013160291698570356470000008818439689541846964_" gradientUnits="userSpaceOnUse" x1="171.728" x2="171.728" xlink:href="#lg1" y1="443.866" y2="402.104"/><linearGradient id="SVGID_00000103980254016201241430000011683136156275309465_" gradientUnits="userSpaceOnUse" x1="141.095" x2="141.095" xlink:href="#lg1" y1="423.267" y2="375.089"/><g><path d="m141.238 0c-21.239 0-36.987 19.777-32.15 40.457 8.821 37.71 13.232 75.421 13.232 113.131s-4.411 75.42-13.232 113.13c-4.838 20.68 10.911 40.457 32.15 40.457h184.574c18.847 0 35.391-12.732 40.022-31.002 10.357-40.862 15.536-81.724 15.536-122.586s-5.179-81.724-15.536-122.586c-4.631-18.269-21.175-31.001-40.022-31.001z" fill="url(#SVGID_1_)"/><path d="m141.238 0c-21.239 0-36.987 19.777-32.15 40.457 8.821 37.71 13.232 75.421 13.232 113.131s-4.411 75.42-13.232 113.13c-4.838 20.68 10.911 40.457 32.15 40.457h184.574c18.847 0 35.391-12.732 40.022-31.002 10.357-40.862 15.536-81.724 15.536-122.586s-5.179-81.724-15.536-122.586c-4.631-18.269-21.175-31.001-40.022-31.001z" fill="url(#SVGID_1_)"/><path d="m300.227 233.979c5.956 1.589 12.167-1.51 14.599-7.174 2.996-6.977-.851-15.046-8.19-16.996-3.403-.904-6.942-1.69-10.622-2.339-17.365-3.061-32.731-4.614-45.67-4.614-23.488 0-39.047 5.313-49.348 12.628-3.472-14.294-11.903-26.693-24.061-35.205l-36.754-25.735c-5.527-3.87-11.572-6.745-17.925-8.578.04 2.54.064 5.081.064 7.622 0 37.701-4.409 75.402-13.226 113.103-4.839 20.691 10.894 40.484 32.143 40.484h184.574c18.846 0 35.39-12.727 40.02-30.995.696-2.745 1.36-5.49 2.008-8.236.001 0-53.417-6.67-67.612-33.965z" fill="#bec6ce"/><path d="m326.787 89.936h-149.884c-6.351 0-11.5-5.148-11.5-11.5s5.149-11.5 11.5-11.5h149.884c6.351 0 11.5 5.148 11.5 11.5 0 6.351-5.149 11.5-11.5 11.5z" fill="#81878c"/><path d="m326.787 149.016h-149.884c-6.351 0-11.5-5.148-11.5-11.5s5.149-11.5 11.5-11.5h149.884c6.351 0 11.5 5.148 11.5 11.5 0 6.351-5.149 11.5-11.5 11.5z" fill="#81878c"/><path d="m437.052 322.351-71.112-101.558-30.275 21.199c-4.053 2.838-9.361 3.105-13.686.703-8.407-4.669-18.414-8.507-30.306-10.604-17.942-3.164-32.359-4.427-43.868-4.212-28.525.535-39.182 10.156-41.351 22.455-.206 1.167-.315 2.318-.341 3.433-3.348 17.131 5.922 33.95 46.026 42.906l108.523 87.556c17.967-1.879 30.638-12.126 34.416-28.343.733-3.145 2.551-5.932 5.196-7.785z" fill="url(#SVGID_00000047051484212226170340000001684479745691511451_)"/><path d="m457.107 348.967 36.754-25.735c16.064-11.248 19.968-33.389 8.72-49.452l-66.97-95.643c-11.248-16.064-33.388-19.968-49.452-8.72l-36.754 25.735c-16.064 11.248-19.968 33.389-8.72 49.452l66.97 95.643c11.248 16.064 33.388 19.968 49.452 8.72z" fill="url(#SVGID_00000034796672530730974570000013738578635213641896_)"/><path d="m347.833 317.697c-2.658-2.234-6.353-2.766-9.555-1.421-9.357 3.93-19.557 3.168-29.232-.183-46.042.1-84.419-28.094-97.157-34.159-12.827-6.107-20.342-13.465-30.733-29.61l-36.491-25.552-71.111 101.559 36.648 25.661c3.998 2.799 6.636 7.123 7.378 11.947 1.887 12.259 6.305 24.289 12.949 35.879 19.35.975 38.887 19.849 55.373 33.447 20.324 16.763 33.143 33.323 50.499 57.272 29.69 15.734 56.822 21.874 69.398 3.914 7.021-10.028 4.584-23.848-5.443-30.87 10.028 7.021 23.848 4.584 30.87-5.443v-.001c7.021-10.027 4.584-23.848-5.443-30.869 10.027 7.021 23.848 4.584 30.87-5.443 7.021-10.027 4.584-23.848-5.443-30.869 10.027 7.021 23.848 4.584 30.87-5.443 13.685-19.547-5.353-45.532-34.247-69.816z" fill="url(#SVGID_00000138559832426599947170000016882656964468604339_)"/><path d="m54.893 354.573-36.754-25.735c-16.064-11.248-19.968-33.389-8.72-49.452l66.97-95.643c11.248-16.064 33.388-19.968 49.452-8.72l36.754 25.735c16.064 11.248 19.968 33.389 8.72 49.452l-66.97 95.643c-11.248 16.064-33.388 19.968-49.452 8.72z" fill="url(#SVGID_00000109007452228774798410000017732918395033331369_)"/><path d="m212.449 506.018c8.046 8.046 23.639 9.281 37.409-4.489s12.535-29.363 4.489-37.409c-8.515-8.515-22.32-8.515-30.835 0l-10.065.353-.998 10.71c-8.515 8.515-8.515 22.32 0 30.835z" fill="url(#SVGID_00000152965494693323822260000003311581786719208624_)"/><path d="m181.614 475.183c-8.515-8.515-8.515-22.32 0-30.835l2.019-8.147 9.044-2.916c8.515-8.515 22.32-8.515 30.835 0 8.515 8.515 8.515 22.32 0 30.835l-11.063 11.063c-8.515 8.515-22.321 8.515-30.835 0z" fill="url(#SVGID_00000016038033247410521010000006412198100403758270_)"/><path d="m150.779 444.348c-8.515-8.515-8.515-22.32 0-30.835l2.654-8.282 8.409-2.781c8.515-8.515 22.32-8.515 30.835 0 8.515 8.515 8.515 22.32 0 30.835l-11.063 11.063c-8.515 8.515-22.321 8.515-30.835 0z" fill="url(#SVGID_00000013160291698570356470000008818439689541846964_)"/><path d="m119.944 413.513c-8.046-8.046-9.281-23.639 4.489-37.409s29.363-12.535 37.409-4.489c8.515 8.515 8.515 22.32 0 30.835l-11.063 11.063c-8.515 8.515-22.321 8.515-30.835 0z" fill="url(#SVGID_00000103980254016201241430000011683136156275309465_)"/><path d="m309.052 316.094c-13.499-4.671-25.972-14.398-33.689-23.537-2.297-2.721-5.438-4.599-8.927-5.31-46.211-9.418-60.641-19.511-60.322-33.479-3.713.288-7.378.786-10.984 1.501-4.81.953-9.799-.023-13.816-2.834l-.157-.11c-.443 11.191 2.983 27.121 21.848 39.496 11.797 7.738 28.946 13.724 55.33 19.278 10.37 11.835 24.676 24.639 41.717 30.82 8.386 3.041 17.387-2.681 18.244-11.56.61-6.327-3.237-12.187-9.244-14.265z" fill="#f5a66b"/></g><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/><g/></svg>
				<h2><?php esc_html_e('Hire Us', 'blonwe'); ?></h2>
			</a>
		</div>
	</div>

	<?php
	echo '<div id="col-left">';

	if(empty(blonwe_get_registered_purchase_code())){
		echo '<form action="" method="post" id="purchase_code_form">';
		echo '<h1>'.esc_html__('Register Theme','blonwe').'</h1>';
		echo '<p style="max-width: 500px;">'.esc_html__('You\'re almost done. Just one more step. In order to gain full access to all demos, 
		premium plugins and support, please register your theme\'s purchase code.','blonwe').'</p>';
		echo '<h2>'.esc_html__('Your Envato Purchase Code','blonwe').'</h2>';
		
		echo '<p>';
		echo '<input class="regular-text code" type="text" name="purchase_code" id="purchase_code" value=""> ';
		echo '<a href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-" target="_blank">'.esc_html__('Where to find the code?','blonwe').'</a>';
		echo '</p>';
		
		echo '<p>';
		echo '<label>';
		echo '<input type="checkbox" id="klb-accept-license-terms">'.esc_html__('I confirm that, according to the Envato License Terms, I am licensed to use the purchase code for a single project. Using it on multiple installations is a copyright violation.','blonwe').'</label>';
		echo '<a href="https://themeforest.net/licenses/terms/regular" target="_blank">'.esc_html__('License details.','blonwe').'</a>';
		echo '</p>';
		
		echo '<p class="klb-actions">';
		echo '<button class="button button-primary button-hero" id="klb-register-theme" disabled="disabled">'.esc_html__('Register Theme','blonwe').'</button>';
		echo '</p>';

		wp_nonce_field( 'register_theme_my_action', 'register_theme_nonce_field' );

		echo '</form>';
	} else {
		$theme_info = wp_get_theme();
		?>
		<div class="c-inner klbtheme-status">
			<h2><?php esc_html_e( 'WordPress', 'blonwe' ); ?></h2>
			<div class="klb-table klb-odd">
				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'Theme Name', 'blonwe' ); ?>:
					</div>
					<div>
					<?php echo esc_html( $theme_info->get( 'Name' ) ); ?>
					</div>
				</div>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'Theme Version', 'blonwe' ); ?>:
					</div>
					<div>
						<?php echo esc_html( $theme_info->get( 'Version' ) ); ?>
					</div>
				</div>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'WP Version', 'blonwe' ); ?>:
					</div>
					<div>
						<?php echo esc_html( get_bloginfo( 'version' ) ); ?>
					</div>
				</div>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'WP Multisite', 'blonwe' ); ?>:
					</div>
					<div>
						<?php echo is_multisite() ? esc_html__( 'Yes', 'blonwe' ) : esc_html__( 'No', 'blonwe' ); ?>
					</div>
				</div>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'WP Debug Mode', 'blonwe' ); ?>:
					</div>
					<div>
						<?php echo defined( 'WP_DEBUG' ) && WP_DEBUG ? esc_html__( 'Enabled', 'blonwe' ) : esc_html__( 'Disabled', 'blonwe' ); ?>
					</div>
				</div>
			</div>
			<h2><?php esc_html_e( 'Server', 'blonwe' ); ?></h2>
			<div class="klb-table klb-odd">

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'PHP Version', 'blonwe' ); ?>:
					</div>
					<div>
						<?php if ( version_compare( PHP_VERSION, '7.2', '<' ) ) : ?>
							<div class="klb-status-error">
								<span>
									<?php echo esc_html( PHP_VERSION ); ?>
								</span>
								<span>
									<?php esc_html_e( 'Minimum required PHP version 7.2', 'blonwe' ); ?>
								</span>
							</div>
						<?php else : ?>
							<?php echo esc_html( PHP_VERSION ); ?>
						<?php endif; ?>
					</div>
				</div>

				<?php if ( function_exists( 'ini_get' ) ) : ?>
					<div class="klb-table-row">
						<div>
							<?php $post_max_size = ini_get( 'post_max_size' ); ?>

							<?php esc_html_e( 'PHP Post Max Size', 'blonwe' ); ?>:
						</div>

						<div>
							<?php if ( wp_convert_hr_to_bytes( $post_max_size ) < 64000000 ) : ?>
								<div class="klb-status-error">
									<span>
										<?php echo esc_html( $post_max_size ); ?>
									</span>
									<span>
										<?php esc_html_e( 'Minimum required value 64M.', 'blonwe' ); ?>
									</span>
								</div>
							<?php else : ?>
								<?php echo esc_html( $post_max_size ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="klb-table-row">
						<div>
							<?php $max_execution_time = ini_get( 'max_execution_time' ); ?>
							<?php esc_html_e( 'PHP Time Limit', 'blonwe' ); ?>:
						</div>

						<div>
							<?php if ( $max_execution_time < 180 ) : ?>
								<div class="klb-status-error">
									<span>
										<?php echo esc_html( $max_execution_time ); ?>
									</span>
									<span>
										<?php esc_html_e( 'Minimum required value 180.', 'blonwe' ); ?>
									</span>
								</div>
							<?php else : ?>
								<?php echo esc_html( $max_execution_time ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="klb-table-row">
						<div>
							<?php $max_input_vars = ini_get( 'max_input_vars' ); ?>
							<?php esc_html_e( 'PHP Max Input Vars', 'blonwe' ); ?>:
						</div>

						<div>
							<?php if ( $max_input_vars < 10000 ) : ?>
								<div class="klb-status-error">
									<span>
										<?php echo esc_html( $max_input_vars ); ?>
									</span>
									<span>
										<?php esc_html_e( 'Minimum required value 10000.', 'blonwe' ); ?>
									</span>
								</div>
							<?php else : ?>
								<?php echo esc_html( $max_input_vars ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="klb-table-row">
						<div>
							<?php $memory_limit = ini_get( 'memory_limit' ); ?>
							<?php esc_html_e( 'PHP Memory Limit', 'blonwe' ); ?>:
						</div>

						<div>
							<?php if ( wp_convert_hr_to_bytes( $memory_limit ) < 128000000 ) : ?>
								<div class="klb-status-error">
									<span>
										<?php echo esc_html( $memory_limit ); ?>
									</span>
									<span>
										<?php esc_html_e( 'Minimum required value 128M.', 'blonwe' ); ?>
									</span>
								</div>
							<?php else : ?>
								<?php echo esc_html( $memory_limit ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="klb-table-row">
						<div>
							<?php $upload_max_filesize = ini_get( 'upload_max_filesize' ); ?>
							<?php esc_html_e( 'PHP Upload Max Size', 'blonwe' ); ?>:
						</div>
						<div>

							<?php if ( wp_convert_hr_to_bytes( $upload_max_filesize ) < 64000000 ) : ?>
								<div class="klb-status-error">
									<span>
										<?php echo esc_html( $upload_max_filesize ); ?>
									</span>
									<span>
										<?php esc_html_e( 'Minimum required value 64M.', 'blonwe' ); ?>
									</span>
								</div>
							<?php else : ?>
								<?php echo esc_html( $upload_max_filesize ); ?>
							<?php endif; ?>
						</div>
					</div>

					<div class="klb-table-row">
						<div>
							<?php esc_html_e( 'PHP Function "file_get_content"', 'blonwe' ); ?>:
						</div>
						<div>
							<?php if ( ! ini_get( 'allow_url_fopen' ) || 'Off' === ini_get( 'allow_url_fopen' ) ) : ?>
								<div class="klb-status-error">
									<?php esc_html_e( 'Off', 'blonwe' ); ?>
								</div>
							<?php else : ?>
								<?php esc_html_e( 'On', 'blonwe' ); ?>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'DOMDocument', 'blonwe' ); ?>:
					</div>
					<div>
						<?php if ( ! class_exists( 'DOMDocument' ) ) : ?>
							<div class="klb-status-error">
								<?php esc_html_e( 'No', 'blonwe' ); ?>
							</div>
						<?php else : ?>
							<?php esc_html_e( 'Yes', 'blonwe' ); ?>
						<?php endif; ?>
					</div>
				</div>

				<div class="klb-table-row">
					<div>
						<?php esc_html_e( 'Active Plugins', 'blonwe' ); ?>:
					</div>
					<div>
						<?php if ( is_multisite() ) : ?>
							<?php echo esc_html( count( (array) wp_get_active_and_valid_plugins() ) + count( (array) wp_get_active_network_plugins() ) ); ?>
						<?php else : ?>
							<?php echo esc_html( count( (array) wp_get_active_and_valid_plugins() ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		
		</div>
	<?php }

	echo '</div>';
	echo '<div id="col-right">';
	echo '<iframe width="1200" height="600" src="https://33361513.sibforms.com/serve/MUIEALoJ0wnxku9u3ep-cbgDG6MIt27QNxpok1LrpapS7-mTFeDgTFssS2yLVDugSsWlhqjlHDpf4x64TrtHvOBvZzacxXZTQrfkYjgp-tbzFIF8tmHjg3ot7tC8Gq-cnYJBpZNoM0DmJ_wV68vZ0bVzayMF-xmQFJAJuD3bGkanAL6Kgu5S0Ow2WGbBVQi4FspSmLugX519y9BU" frameborder="0" scrolling="auto" allowfullscreen style="display: block;max-width: 100%;"></iframe>';
	echo '</div>';
	echo '</div>';
	
	if(isset($_POST['purchase_code'])) { 
		$purchase_code = $_POST['purchase_code'];
	} else {
		$purchase_code = '';
	}
	
	if(isset($_POST['purchase_code']) && wp_verify_nonce( $_POST['register_theme_nonce_field'], 'register_theme_my_action' )) {
		
		$api_endpoint = 'http://api.klbtheme.com/wp-json/klb/v1/purchase/';

		$request = wp_remote_get( $api_endpoint . $purchase_code, array(
			'method'    => 'GET',
			'timeout'   => 30,
			'body' => array(
				'domain' => home_url(),
			),
		) );

		if ( is_wp_error( $request ) ) {
			return new WP_Error( 'klbtheme_api_error', "There is a problem contacting the KlbTheme server. Automatic registration is not possible." );
		}
		
		$response_code = wp_remote_retrieve_response_code( $request );
		
		if ( 200 !== $response_code ) {
			$response_data = json_decode( wp_remote_retrieve_body( $request ), true );
			echo '<div class="data-response">'.esc_html($response_data['message']).'</div>';
			return new WP_Error( $response_data['code'], $response_data['message'] . ' Automatic registration is not possible.' );
		}
		
		echo '<div class="data-response success">'.esc_html__('The theme registered succesfully','blonwe').'</div>';
		update_option( 'envato_purchase_code_48378751', $purchase_code );
	}
}


function blonwe_is_theme_registered() {
	$purchase_code =  blonwe_get_registered_purchase_code();
	$registered_by_purchase_code =  ! empty( $purchase_code );

	// Purchase code entered correctly.
	if ( $registered_by_purchase_code ) {
		return true;
	}
}

/**
 * Filter TGMPA action links.
 */
 
$blonwe_tgmpa_prefix = ( defined( 'WP_NETWORK_ADMIN' ) && WP_NETWORK_ADMIN ) ? 'network_admin_' : '';
add_filter( 'tgmpa_' . $blonwe_tgmpa_prefix . 'plugin_action_links', 'blonwe_tgmpa_filter_action_links', 10, 4 );
function blonwe_tgmpa_filter_action_links( $action_links, $item_slug, $item, $view_context ) {
	$source = ! empty( $item['source'] ) ? $item['source'] : '';

	// Prevent installing theme's premium plugins.
	if ( 'External Source' === $source && ! blonwe_is_theme_registered() ) {
		$action_links = array(
			'blonwe_registration_required' => sprintf( __( '<a style="color: #ff0000;" href="%s">Register theme to unblock it</a>', 'blonwe' ), esc_url( admin_url( 'themes.php?page=register-theme' ) ) ),
		);
	}

	return $action_links;
}

/**
 * Admin Notice
 */
add_action('admin_notices', 'blonwe_notice_for_activation');
function blonwe_notice_for_activation() {

	if(empty(blonwe_get_registered_purchase_code())){

		echo '<div class="notice notice-warning">
			<p>' . sprintf(
			esc_html__( 'Enter your Envato Purchase Code to receive Theme and plugin updates %s', 'blonwe' ),
			'<a href="' . admin_url('admin.php?page=klbtheme_options') . '">' . esc_html__( 'Enter Purchase Code', 'blonwe' ) . '</a>') . '</p>
		</div>';
	}
}