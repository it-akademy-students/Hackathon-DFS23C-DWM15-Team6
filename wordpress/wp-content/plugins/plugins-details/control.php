<?php 

/**
 * Plugin Name: details plugin 
 * Description: this is my plugin
 * version:1.0.0
 * author: Araissia soufien
 * package:afup 
 * license:
 */



// function vu_lecturer_name() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
//     return Store::$result[0]->lecturer_name;
// // 	var_dump(Store::$result[0]);
// }

// function vu_image() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
// 	return '<img src="' . Store::$result[0]->img . '">';
// }

// function vu_description() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
//     return Store::$result[0]->description;
// }
// function vu_date() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
//     return Store::$result[0]->date;
// }

// function vu_time_start() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
// 	$heure = explode(':', Store::$result[0]->time_start);
//     return $heure[0].':'.$heure[1];
// }

// function vu_time_end() {
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
// 	$heure = explode(':', Store::$result[0]->time_end);
//     return $heure[0].':'.$heure[1];
// }

// function vu_name() {
// 	global $wpdb;
// 	include_once(plugin_dir_path(__FILE__) . "model.php");
// 	Store::$result = $wpdb->get_results(
// 		$wpdb->prepare(
// 			"SELECT *
// 			FROM {$wpdb->prefix}conferences_table
// 			WHERE conference_id = %d
// 			",$_GET['id']
// 		)
// 	);
//     return Store::$result[0]->name;
// }

function vu_titre_image () {
	global $wpdb;
	include_once(plugin_dir_path(__FILE__) . "model.php");
	Store::$result = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT *
			FROM {$wpdb->prefix}conferences_table
			WHERE conference_id = %d
			",$_GET['id']
		)
	);
	$heureStart = explode(':', Store::$result[0]->time_start);
	$heureEnd = explode(':', Store::$result[0]->time_end);
	return '
	<style>
	.bloc_principal {
		display: flex;
	}
	.bloc_image {
		width: 150px!important;
		height: 150px!important;
		display: flex;
	}
	.bloc_image > img {
		border-radius: 150px;
		border: 1px solid #3C4858;
	}
	.bloc_text {
		display:flex;
		flex-direction: column;
		justify-content: center;
		padding: 0 20px;
	}
	.bloc_text > h2 {
		font-size: 36px;
		font-weight: bold;
		color: #3C4858 !important;
	}
	.bloc_info_conferencier {
		font-style: italic;
		font-size: 18px;
	}
	.bloc_info_conferencier > span {
		padding: 0 0.25rem;
	}
	</style>
	<div class="bloc_principal">
		<div class="bloc_image">
			<img src="' . Store::$result[0]->img . '">
		</div>
		<div class="bloc_text">
			<h2 class="bloc_h2">' . Store::$result[0]->name . '</h2>
			<div class="bloc_info_conferencier">
				<span>' . Store::$result[0]->lecturer_name . '</span> <span>' . Store::$result[0]->date . '</span> <span>' . $heureStart[0] . ':' . $heureStart[1] . '</span>-<span>' . $heureEnd[0] . ':' . $heureEnd[1] . '</span> - <span>Niveau: N/A</span> - <span>Français</span>
			</div>
		</div>
	</div>
	';
// 	
}
function vu_description() {
	global $wpdb;
	include_once(plugin_dir_path(__FILE__) . "model.php");
	Store::$result = $wpdb->get_results(
		$wpdb->prepare(
			"SELECT *
			FROM {$wpdb->prefix}conferences_table
			WHERE conference_id = %d
			",$_GET['id']
		)
	);
	return '
		<div class="bloc_description_principal">
			<div class="bloc_text_description">
				<h3>Edition en ligne sur LiveStorm et Work Adventure</h3>
			</div>
			<div bloc_paragraphe_descrition>
				<p>'. Store::$result[0]->description . '</p>
			</div>
		</div>
		
			';
}

// add_shortcode("details_image","vu_image");
// add_shortcode("details_lecturer_name","vu_lecturer_name");
// add_shortcode("details_date","vu_date");
add_shortcode("details_description","vu_description");
// add_shortcode("details_time_start","vu_time_start");
// add_shortcode("details_time_end","vu_time_end");
// add_shortcode("details_name","vu_name");
add_shortcode("details_titre_image","vu_titre_image");