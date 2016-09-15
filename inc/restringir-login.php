<?php
	function restringir_login(){
		global $current_user;
		get_currentuserinfo();

		if ($current_user->user_level <  4) { //si no es admin no entra
			wp_redirect( get_bloginfo('url') );
			exit;
		}

	}
	add_action('admin_init', 'restringir_login', 1);
?>