<?php
/**
* Plugin Name: CRUD
* Plugin URI: https://loginweb.dev/crud/
* Description: Plugins para gestionar los datos
* Version: 1.0
* Author: Ing. Percy Alvarez Cruz
* Author URI: https://loginweb.dev/profile
**/


add_action('admin_menu','lw_add_menu');
function lw_add_menu() {
	
	//MENU TPV
	add_menu_page('Central de Riesgo', //page title
        'Central de Riesgo', //menu title
        'manage_options', //capabilities
        'central-riesgo', //menu slug
        'denuncias_list', //function
        'dashicons-align-full-width'
	);

    add_submenu_page('null', //parent slug
			'Nueva Denuncia', //page title
			'Nueva Denuncia', //menu title
			'manage_options', //capability
			'nueva-denuncia', //menu slug
			'denuncias_create' //function
		);
}

define('ROOTDIR', plugin_dir_path(__FILE__));

require_once(ROOTDIR . 'views/denuncias_list.php');
require_once(ROOTDIR . 'views/denuncias_create.php');