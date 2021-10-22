<?php
	
	/*
	 * Plugin Name: Gestion billetterie afupday2021
	 * Description:	Gestion billetterie afupday2021
	 * Version:			1.0.0
	 * Author:			PONCET
	 */
	
	register_activation_hook( __FILE__, 'acheteurTable');
	
	function acheteurTable() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$acheteur_table = $wpdb->prefix . 'acheteur';
		$sql = "CREATE TABLE `$acheteur_table` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `nom` varchar(120) NOT NULL,
		  `adresse` varchar(255) NOT NULL,
		  `codePostal` decimal(5,0) UNSIGNED ZEROFILL DEFAULT NULL,
		  `ville` varchar(255) NOT NULL,
		  `email` varchar(255) NOT NULL,
		  `password` varchar(255) NOT NULL,
		  `token` varchar(255) NOT NULL,
		  `etat` tinyint(1) DEFAULT 1,
		  PRIMARY KEY(id)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	  ";
		if ($wpdb->get_var("SHOW TABLES LIKE '$acheteur_table'") != $acheteur_table) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
		
		$acheteur_achat_billet_table = $wpdb->prefix . 'acheteur_achat_billet';
		$sql1 = "CREATE TABLE `$acheteur_achat_billet_table` (
		  `id` int(11) NOT NULL AUTO_INCREMENT,
		  `acheteur_id` int(11) NOT NULL,
		  `type` varchar(255) NOT NULL,
		  `details` text NOT NULL,
		  `qte` decimal(3,0) NOT NULL,
		  `prixUnitaire` decimal(3,0) NOT NULL,
		  `dateAchat` date NOT NULL,
		  `dateEvenement` date NOT NULL,
		  `etat` tinyint(1) DEFAULT 1,
		  PRIMARY KEY(id),
		  UNIQUE KEY `acheteur_id` (`acheteur_id`),
		  CONSTRAINT `wp_acheteur_billet_ibfk_1` FOREIGN KEY (`acheteur_id`) REFERENCES `" . $acheteur_table . "` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
		) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
  	";
		if ($wpdb->get_var("SHOW TABLES LIKE '$acheteur_achat_billet_table'") != $acheteur_achat_billet_table) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql1);
		}
	}
	
	function liste_des_acheteurs () {
		include_once(plugin_dir_path(__FILE__) . "admin/liste_des_acheteurs.php");
	}
	
	function ajouter_un_acheteur () {
		include_once(plugin_dir_path(__FILE__) . "admin/ajouter_un_acheteur.php");
	}
	
	function billets_achetes () {
		include_once(plugin_dir_path(__FILE__) . "admin/billets_achetes.php");
	}
	
	function ajouter_un_achat () {
		include_once(plugin_dir_path(__FILE__) . "admin/ajouter_un_achat.php");
	}
	
//	function plugin_settings () {
//		include_once(plugin_dir_path(__FILE__) . "admin/plugin_settings.php");
//	}
	
	function admin_acheteur_scripts(){
		wp_enqueue_style( 'bootstrap-acheteur-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css' );
		wp_enqueue_style( 'fontawesome-acheteur-css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css' );
		wp_enqueue_style( 'style-acheteur-css', plugins_url('css/style.css', __FILE__) );
		wp_enqueue_script( 'script-acheteur-js', plugins_url('js/script.js', __FILE__) );
	}
	
	function my_menu_pages(){
		$page_title = 'Gestion billetterie';
		$menu_title = 'Gestion billetterie';
		$capability = 'manage_options';
		$menu_slug  = 'liste-des-acheteurs';
		$function   = 'liste_des_acheteurs';
		$icon_url   = 'dashicons-groups';
		$position   = 99;
		
		add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
		add_submenu_page($menu_slug, 'Liste des acheteurs', 'Liste des acheteurs', $capability, $menu_slug, $function );
		add_submenu_page($menu_slug, 'Ajouter un acheteur', 'Ajouter un acheteur', $capability, 'ajouter-un-acheteur', 'ajouter_un_acheteur' );
		add_submenu_page($menu_slug, 'Billets achetés', 'Billets achetés', $capability, 'billets-achetes', 'billets_achetes' );
		add_submenu_page($menu_slug, 'Ajouter un Achat', 'Ajouter un achat', $capability, 'ajouter-un-achat', 'ajouter_un_achat' );
//		add_submenu_page($menu_slug, 'Réglages plugin', 'Réglages plugin', 'manage_options', 'plugin-settings', 'plugin_settings' );
	}
	
//	function baw_settings_action_links($links) {
//		array_unshift( $links, '<a href="' . admin_url( 'admin.php?page=plugin-settings' ) . '">' . __( 'Settings' ) . '</a>' );
//		return $links;
//	}
	
//	add_filter( 'plugin_action_links_'.plugin_basename( __FILE__ ), 'baw_settings_action_links', 10, 2 );
	add_action('admin_menu', 'my_menu_pages');
	add_action('admin_enqueue_scripts', 'admin_acheteur_scripts');