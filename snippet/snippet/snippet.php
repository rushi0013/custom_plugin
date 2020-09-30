<?php
/**
* Plugin Name: Snippet Plugin
* Plugin URI: ZZZZ
* Description: Snippet Plugin
* Version: 1.0
* Author: XXXXX
* Author URI: ZZZZ
**/
global $snippet_db_version;
$snippet_db_version = '1.0';
register_activation_hook( __FILE__, 'snippet_plugin_install' );
register_deactivation_hook( __FILE__, "plugin_deactivated");




function myplugin_update_db_check() {
    global $snippet_db_version;
    if ( get_site_option( 'snippet_db_version' ) != $snippet_db_version ) {
        snippet_plugin_install();
    }
}

function snippet_plugin_install() {
	global $wpdb;
	global $snippet_db_version;

	$table_name = $wpdb->prefix . 'snippet_plugin';
	
	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE $table_name (
		  `id` int(11) NOT NULL,
		  `name` text NOT NULL,
		  `content` text NOT NULL,
		  `page` int(11) NOT NULL,
		  `status` int(11) NOT NULL,
		  `area` text NOT NULL,
		  `sort_order` int(11) NOT NULL
		) $charset_collate;
		ALTER TABLE $table_name
  		ADD PRIMARY KEY (`id`);
  		ALTER TABLE $table_name
  		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'snippet_db_version', $snippet_db_version );
}
function plugin_deactivated()
{
	global $wpdb;
    $table_name = $wpdb->prefix . 'snippet_plugin';
    $sql = "DROP TABLE IF EXISTS $table_name";
    $wpdb->query($sql);
	delete_site_option( 'snippet_db_version' );
}
add_action( 'plugins_loaded', 'myplugin_update_db_check' );
add_action('admin_menu', 'snippet_main_menu');

add_action('wp_enqueue_scripts','add_js_file');

	
function add_js_file() {
    wp_register_script( 'main-js', plugins_url( '/js/ava_test_.js', __FILE__ ));
}
 
function snippet_main_menu(){
    add_menu_page( 'Snippet menu function', 'Snippet', 'manage_options', 'snippet-menu-function', 'snippet_menu_fun' );
}
function snippet_menu_fun(){
     require_once(plugin_dir_path( __FILE__ ) .'includes/page.php');
}
add_action( 'wp_ajax_nopriv_get_snippets', "get_snippets_fun" );
add_action( 'wp_ajax_get_snippets', "get_snippets_fun" );

add_action( 'wp_ajax_nopriv_get_snippet_subcategory', "get_snippet_subcategory_fun" );
add_action( 'wp_ajax_get_snippet_subcategory', "get_snippet_subcategory_fun" );

add_action( 'wp_ajax_nopriv_get_snippets_file', "get_snippets_file_fun" );
add_action( 'wp_ajax_get_snippets_file', "get_snippets_file_fun" );

add_action( 'wp_ajax_nopriv_get_snippets_file_data', "get_snippets_file_data_fun" );
add_action( 'wp_ajax_get_snippets_file_data', "get_snippets_file_data_fun" );

function get_snippets_fun(){
	$json = array();
	$json['data']  = array();
	if(!_lc()){
		$json['error'] = "Something wrong try again..!";
	}

	if(empty($json['error']) && isset($_POST['id']) && $_POST['id']){
		$allow = 0;
		if(_lc()){
			$allow = 1;
		}
		if($allow){
			global $wpdb;
			$json['data'] = array();
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=snippet&sub_category_id=".$_POST['id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			    "cache-control: no-cache",
			    "postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			$data = array();
			if (!$err) {
				$json_res = json_decode($response,1);
				if(isset($json_res['data']['snippet']) && $json_res['data']['snippet'])
					$data = $json_res['data']['snippet'];
			}
			
			//$data = $wpdb->get_results( "SELECT sc.* FROM `{$wpdb->prefix}snippets` sc LEFT JOIN `{$wpdb->prefix}snippet_subcategory` c on (sc.category_id = c.id)  WHERE c.id = ". $_POST['id'] ." AND c.deleted = '0' AND sc.deleted = '0' AND sc.status_id = '2'", ARRAY_A  );
			foreach ($data as $key => $value) {
				$json['data'][] = array(
					"id" => $value['id'],
					"title" => $value['name'],
					"add_on" => $value['add_on'],
					"edit_on" => $value['edit_on'],
					"author" => $value['author_name']
				);
			}
		}else{
			$json['error'] = "Something wrong try again..!";
		}
	}else{	
		$json['error'] = "Filled up all fields";
	}
	echo json_encode($json);
	wp_die();
}
function get_snippet_subcategory_fun(){
	$json = array();
	$json['data']  = array();
	if(!_lc()){
		$json['error'] = "Something wrong try again..!";
	}

	if(empty($json['error']) && isset($_POST['id']) && $_POST['id']){
		$allow = 0;
		if(_lc()){
			$allow = 1;
		}
		if($allow){
			global $wpdb;
			//$json['data'] = $wpdb->get_results( "SELECT sc.name,sc.id FROM `{$wpdb->prefix}snippet_subcategory` sc LEFT JOIN `{$wpdb->prefix}snippet_category` c on (sc.category_id = c.id)  WHERE c.id = ". $_POST['id'] ." AND c.deleted = '0' AND sc.deleted = '0' ", ARRAY_A  );
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=subcategory&category_id=".$_POST['id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			    "cache-control: no-cache",
			    "postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if (!$err) {
				$json_res = json_decode($response,1);
				if(isset($json_res['data']['subcategory']) && $json_res['data']['subcategory'])
					$json['data'] = $json_res['data']['subcategory'];
			}

			
		}else{
			$json['error'] = "Something wrong try again..!";
		}
	}else{	
		$json['error'] = "Filled up all fields";
	}
	echo json_encode($json);
	wp_die();
}
function get_snippets_file_fun(){
	$json = array();
	$json['data']  = array();
	if(!_lc()){
		$json['error'] = "Something wrong try again..!";
	}

	if(empty($json['error']) && isset($_POST['id']) && $_POST['id']){
		$allow = 0;
		if(_lc()){
			$allow = 1;
		}
		if($allow){
			global $wpdb;
			$json['data'] = array();
			
			//$data = $wpdb->get_results( "SELECT sc.name,sc.id,sc.path,c.name AS folder_name FROM `{$wpdb->prefix}snippet_document` sc LEFT JOIN `{$wpdb->prefix}snippet_document_folder` c on (sc.folder = c.id)  WHERE sc.snippet_id = ". $_POST['id'], ARRAY_A  );
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=document&snippet_id=".$_POST['id'],
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			    "cache-control: no-cache",
			    "postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
			$data = array();
			if (!$err) {
				$json_res = json_decode($response,1);
				if(isset($json_res['data']['document']) && $json_res['data']['document'])
					$data = $json_res['data']['document'];
			}
			
			foreach ($data as $key => $value) {
				$json['data'][] = array(
					"name" => $value['folder_name'].'/'.$value['name'],
					"id" => $value['id'],
					"path" => $value['path'],
				);
			}
		}else{
			$json['error'] = "Something wrong try again..!";
		}
	}else{	
		$json['error'] = "Filled up all fields";
	}
	echo json_encode($json);
	wp_die();	
}
function get_snippets_file_data_fun(){
	global $wpdb;
	$json = array();
	if(!empty($_POST['id']) && _lc()){
		$upload_dir = wp_upload_dir();

		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=document_info&doc_id=".$_POST['id'],
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			"cache-control: no-cache",
			"postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		$data = array();
		$json['data'] = array();
		if (!$err) {
		$json_res = json_decode($response,1);
		if(isset($json_res['data']['document']) && $json_res['data']['document'])
			$json['data'] = $json_res['data']['document']['data'];
		}
		//$data = $wpdb->get_row( "SELECT `path` FROM `{$wpdb->prefix}snippet_document` WHERE id='".$_POST['id']."'", ARRAY_A  );

		//if($data && is_file($upload_dir['basedir'].'/'.$data['path']))
		//	$json['data'] = file_get_contents($upload_dir['basedir'].'/'.$data['path']);
		/*if(isset($json['data']) && $json['data'] && is_string($json['data'])){
			$json['word'] = str_word_count($json['data']);
			$json['charcter'] = strlen(str_replace(' ', '', $json['data']));
		}*/
	}
	echo json_encode($json);
	wp_die();
}

		
add_action('wp_head', 'snippet_header_code');
function snippet_header_code(){
	global $wpdb;
	$data = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}snippet_plugin` WHERE area='h' AND status = '1' ORDER BY `sort_order` ASC", ARRAY_A  );	

	foreach ($data as $key => $value) {
		$value['page'] = explode(',', $value['page']);
		$run = 0;			
		if(in_array(0, $value['page'])){
			$run = 1;
		}else{
			foreach ($value['page'] as $key => $value1) {
				if(is_page($value1)){
					$run = 1;
					break;
				}
			}
		}
		if($run)
			if($value['type'] == 'snippet' ){
				$search = array();
				$replace = array();

				$vars = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}snippet_plugin_variable` WHERE snippet_id = '".$value['id']."'", ARRAY_A  );

				foreach ($vars as $key => $value1) {
					$search[] = $value1['variable'];
					$replace[] = $value1['value'];
				}

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=document&snippet_id=".$value['snippet_id'],
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);
				$data = array();
					
				if (!$err) {
					$json_res = json_decode($response,1);
					if(isset($json_res['data']['document']) && $json_res['data']['document']){
						if($value['file']){
							foreach ($json_res['data']['document'] as $key2 => $value2) {
								if($value2['id'] == $value['file'])
									echo str_replace($search, $replace, $value2['data']);
							}
						}else{
							if(isset($json_res['data']['document'][0]['data']))
								echo str_replace($search, $replace, $json_res['data']['document'][0]['data']);
						}
					}
				}

				/*$upload_dir = wp_upload_dir();
				$data_doc = $wpdb->get_row( "SELECT `path` FROM `{$wpdb->prefix}snippet_document` WHERE snippet_id='".$value['snippet_id']."'", ARRAY_A  );

				if($data_doc && is_file($upload_dir['basedir'].'/'.$data_doc['path']))
					echo file_get_contents($upload_dir['basedir'].'/'.$data_doc['path']);*/
			}else{
				echo $content;
			}
	}
}
function snippet_footer_code() {
	global $wpdb;
	$data = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}snippet_plugin` WHERE area='f'  AND status = '1' ORDER BY `sort_order` ASC", ARRAY_A  );	
	$upload_dir = wp_upload_dir();

	foreach ($data as $key => $value) {

		$value['page'] = explode(',', $value['page']);
		$run = 0;			
		if(in_array(0, $value['page'])){
			$run = 1;
		}else{
			foreach ($value['page'] as $key => $value1) {
				if(is_page($value1)){
					$run = 1;
					break;
				}
			}
		}
		if($run)
			if($value['type'] == 'snippet' ){
				$search = array();
				$replace = array();

				$vars = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}snippet_plugin_variable` WHERE snippet_id = '".$value['id']."'", ARRAY_A  );

				foreach ($vars as $key => $value1) {
					$search[] = $value1['variable'];
					$replace[] = $value1['value'];
				}

				$curl = curl_init();

				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=document&snippet_id=".$value['snippet_id'],
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "GET",
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: 8d7cfc23-cf3d-d1ca-5e6c-31f92bcd1e3e"
				  ),
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);
				$data = array();
					
				if (!$err) {
					$json_res = json_decode($response,1);

					if(isset($json_res['data']['document']) && $json_res['data']['document']){
						if($value['file']){
							foreach ($json_res['data']['document'] as $key2 => $value2) {
								if($value2['id'] == $value['file'])
									echo str_replace($search, $replace, $value2['data']);
							}
						}else{
							if(isset($json_res['data']['document'][0]['data']))
								echo str_replace($search, $replace, $json_res['data']['document'][0]['data']);
						}
					}
				}
				/*$data_doc = $wpdb->get_row( "SELECT `path` FROM `{$wpdb->prefix}snippet_document` WHERE snippet_id='".$value['snippet_id']."'", ARRAY_A  );
				if($data_doc && is_file($upload_dir['basedir'].'/'.$data_doc['path']))
					echo file_get_contents($upload_dir['basedir'].'/'.$data_doc['path']);*/
			}else{
				echo $content;
			}
	}
}
add_action('wp_footer', 'snippet_footer_code');

function snippet_css() {
    wp_register_style('snippet_css', plugins_url('style.css',__FILE__ ));
    wp_enqueue_style('snippet_css');;
}

add_action( 'admin_init','snippet_css');

//add_action('init', 'init_json_generate');