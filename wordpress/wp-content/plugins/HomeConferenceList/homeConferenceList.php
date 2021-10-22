<?php
/*
 * Plugin Name:		Home Conference List
 * Description:		Liste de conférences de la home page
 * Version:			1.0.0
 * WordPress URI:	
 * Plugin URI:		
 * Author:			Phoung
 */

function vuHomeConferenceList(){
    global $wpdb;
	$vu_conferenceList = '';
    $conferences_table = $wpdb->prefix . 'conferences_table';
    $result = $wpdb->get_results("SELECT * FROM ". $conferences_table . " ORDER BY conference_id DESC LIMIT 5");
    foreach ($result as $print) {
		$shortdescription = $print->description;
            if (strlen($print->description) >= 150){
              $shortdescription = substr($print->description, 0, 150) . ' [...]';
            } 
        $vu_conferenceList .= '
		<style>
		.bloc_base {
			display: flex;
			flex-direction: row;
			justify-content: space-between;
			flex-wrap: wrap;
			width: 100%;
			margin: 20px 0;
		}
		.bloc_centre {
			width: 100%;
			min-width: 300px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			max-width: calc(100% - 400px);
		}
		.bloc_image {
			display: flex;
			flex-direction: column;
			width: 150px;
			display: flex;
			align-items: center;
			justify-content: center;
		}
		.bloc_btn {
			display: flex;
			flex-direction: column;
			width: 210px;
			padding: 0;
			display: flex;
			align-items-center;
			justify-content: center;
		}
		.bloc_btn > a {
			display: flex!important;
			justify-content: center!important;
			text-decoration: none !important;
		}
		.bloc_image > img {
			width: 100%;
			max-width: 120px;
			text-align: center;
			height: auto;
			box-shadow: 0 16px 38px -12px rgb(0 0 0 / 56%), 0 4px 25px 0 rgb(0 0 0 / 12%), 0 8px 10px -5px rgb(0 0 0 / 20%);
			border-radius: 120px;
		}
		.lecturer_name {
			font-size: smaller;
    		color: #337ab7;
    		padding-top: 20px;
			width: 120px;
			text-align: center;
		}
		.separation {
			background-color: #E7E3E3;
		}
		</style>
		<div class="bloc_base">
			<div class="bloc_image">
				<img loading="lazy" width="120" height="120" src="'. $print->img .'" alt="photo conférencier">
				<div class="lecturer_name">' . $print->lecturer_name . '</div>
			</div>
			<div class="bloc_centre">
				<h4>'.$print->name .'</h4>
				<p>' . nl2br($shortdescription) .'</p>
			</div>
			<div class="bloc_btn">
				<a class="et_pb_button et_pb_button_0 et_pb_bg_layout_light" href="/details?id='.$print->conference_id .'">EN SAVOIR PLUS</a>
			</div>
		</div>
		<hr class="separation">
        ';
	}
	return $vu_conferenceList;
	
}
add_shortcode('homeConferenceList', 'vuHomeConferenceList');
