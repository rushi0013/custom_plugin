<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	.form-control {
	    display: block;
	    width: 100%;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	}
	label {
	    display: inline-block;
	    max-width: 100%;
	    margin-bottom: 5px;
	    font-weight: 700;
	}
	.side_div{
		padding: 40px 40px 40px 40px;
		margin-bottom: 20px;
		width: 75%;
	    height: 100vh;
	    background: #fff;
	    top: 0;
	    right: calc(-75% - 80px);
	    position: fixed;
	    z-index: 99;
	    transition: 0.4s;
	    overflow: auto;
	}
	.side_snippet_info_div{
		padding: 40px 40px 40px 40px;
		margin-bottom: 20px;
		width: 70%;
	    height: 100vh;
	    background: #fff;
	    top: 0;
	    right: calc(-70% - 80px);
	    position: fixed;
	    z-index: 99;
	    transition: 0.4s;
	    overflow: auto;
	}
	.side_snippet_info_div.active,.side_div.active{
		right: 0;
	    transition: 0.4s;
	}
	.side_review_div{
		padding: 40px 40px 40px 40px;
		margin-bottom: 20px;
		width: 40%;
	    height: 100vh;
	    background: #fff;
	    top: 0;
	    right: calc(-40% - 80px);
	    position: fixed;
	    z-index: 99;
	    transition: 0.4s;
	    overflow: auto;
	}
	.side_review_div.active,.side_div.active{
		right: 0;
	    transition: 0.4s;
	}
	.close_side_div{
		position: absolute; 
		top: 35px;
		left: 10px;
		cursor: pointer;
		font-size: 14px;
	}
	.page-title-action{
		margin-left: 4px;
	    padding: 3px 8px;
	    position: relative;
	    top: 0;
	    text-decoration: none;
	    border: none;
	    border: 1px solid #ccc;
	    border-radius: 2px;
	    background: #f7f7f7;
	    text-shadow: none;
	    font-weight: 600;
	    font-size: 13px;
	    line-height: normal;
	    color: #0073aa;
	    cursor: pointer;
	    margin: 5px 0px;
	}
	.page-title-action.active{
		border-color: #008ec2;
    	background: #00a0d2;
    	color: #fff
	}
	.fa.checked {
	  color: orange;
	}
	.dashicons-thumbs-up,
	.dashicons-thumbs-down{
		cursor: pointer;
		display: inline-block;
		margin-right: 5px;
	}
	.dashicons-thumbs-up:before,.dashicons-thumbs-down:before{color: #00b9eb !important}
	.dashicons-thumbs-up.active:before {
		color: #009226 !important;
	}
	.dashicons-thumbs-down.active:before {
		color: #f90000 !important;
	}

	/*.grid-container {
	  display: grid;
	  grid-template-columns: auto auto auto;
	  background-color: #2196F3;
	  padding: 10px;
	}

	.grid-item3 {
	  background-color: rgba(255, 255, 255, 0.8);
	  padding: 20px;
	  font-size: 30px;
	  text-align: center;
      border: 1px solid #ddd;
      max-width: 33.33%;
	}*/
	.grid-item .extension-preview {
	    height: 150px;
	}
	.grid-item .extension-preview img {
		width: 100%;
		max-height: 150px;
	}
	.grid-item .extension-name {
	    height: 100px;
	}
	.grid-item > div {
	    border-top: 1px solid #ddd;
	    padding: 10px;
	}
	.grid-item .w50 {
		width: 50%;float: left;
	}
	.column {
	  float: left;
	  width: 30%;
	  padding: 10px;
	   background-color: rgba(255, 255, 255, 0.8);
	   border: 1px solid #ddd;
	  padding: 10px;
	}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
	}
	/* Style the buttons */
	.btn {
	  border: none;
	  outline: none;
	  padding: 12px 16px;
	  background-color: #f1f1f1;
	  cursor: pointer;
	}

	.btn:hover {
	  background-color: #ddd;
	}

	.btn.active {
	  background-color: #666;
	  color: white;
	}
	.side_snippet_info_div .w50{
		width: 46%;
		float: left;
		padding: 10px;
	}
}
</style>
<?php 
	global $wpdb;
	$project_id = 1;

	$name = '';
	$content = '';
	$page = array();
	$status = 1;
	$area = '';
	$sort_order = '';
	$category_id = '';
	$sub_category = '';
	$snippet = '';
	$type = '';
	$date_added = '';
	$date_updated = '';
	$type = '';
	$a_name = '';
	//$snippet_link = menu_page_url('snippet-menu-function');
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_to_admin_snippet'])) {
		$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=contribute_user_message",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $_POST,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
		    "cache-control: no-cache",
		    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		

		if (!$err) {
			$json_res = json_decode($response,1);
			if($json_res){
				$_GET['c_snippet'] = 1;
				$_GET['e_msg'] = "Request submit successfully..!";
				//wp_mail( $_POST['c_email'], 'Request submit successfully', 'Your Request submit successfully. you get response sortly.' );
			}
		}
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_c_snippet'])) {
		$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=contribute_snippet_add",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $_POST,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
		    "cache-control: no-cache",
		    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		

		if (!$err) {
			$json_res = json_decode($response,1);
			if($json_res){
				$_GET['c_snippet'] = 1;
				wp_mail( $_POST['c_email'], 'Snippet submited', 'Your Snippet is successfully submited to admin.You will be informed when approved or dis approved it.' );
			}
		}
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_review'])) {
		if(isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['description']) && $_POST['description'] && isset($_POST['review']) && $_POST['review'] && isset($_POST['snippet_id']) && $_POST['snippet_id'] && isset($_POST['id']) && $_POST['id']){

			$wpdb->get_var( "UPDATE {$wpdb->prefix}snippet_plugin SET review = '".$_POST['review']."' WHERE id= '".$_POST['id']."'" );
			
			
				$post = array( 
					"name" => $_POST['name'],
					"email" => $_POST['email'],
					"description" => $_POST['description'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
					"review" => $_POST['review'],
					"snippet_id" => $_POST['snippet_id'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=snippet_review",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			
		}
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_report'])) {
		if(isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['description']) && $_POST['description'] && isset($_POST['title']) && $_POST['title'] && isset($_POST['snippet_id']) && $_POST['snippet_id']){

			
				$post = array( 
					"name" => $_POST['name'],
					"email" => $_POST['email'],
					"description" => $_POST['description'],
					"title" => $_POST['title'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
					"snippet_id" => $_POST['snippet_id'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=snippet_report",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			
		}
		$_GET['e_msg'] = 'Successfully snippet reported';
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_difm'])) {
		if(isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['description']) && $_POST['description'] && isset($_POST['title']) && $_POST['title']){

			
				$post = array( 
					"name" => $_POST['name'],
					"email" => $_POST['email'],
					"description" => $_POST['description'],
					"title" => $_POST['title'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=difm",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			
		}
		$_GET['e_msg'] = 'Successfully your request submited';
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_suggest_change'])) {
		if(isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['description']) && $_POST['description'] && isset($_POST['title']) && $_POST['title']){

		
			
				$post = array( 
					"name" => $_POST['name'],
					"email" => $_POST['email'],
					"description" => $_POST['description'],
					"title" => $_POST['title'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=suggest_change",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			
		}
		$_GET['e_msg'] = 'Successfully your suggetion submited';
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_request_help'])) {
		if(isset($_POST['name']) && $_POST['name'] && isset($_POST['email']) && $_POST['email'] && isset($_POST['description']) && $_POST['description'] && isset($_POST['title']) && $_POST['title']){

			
				$post = array( 
					"name" => $_POST['name'],
					"email" => $_POST['email'],
					"description" => $_POST['description'],
					"title" => $_POST['title'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=request_help",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);
			
		}
		$_GET['e_msg'] = 'Successfully your request submited';
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_snippet'])) {
		
		
	
		if(isset($_POST['page'])){
			if(!is_array($_POST['page'])){
				$_POST['page'][] = $_POST['page'];
			}
		}else{
			$_POST['page'] = array();
		}

		$page = implode(',', $_POST['page']);
		if(!isset($_POST['file'])){
			$_POST['file'] = 0;
		}
		if(isset($_POST['edit_id']) && $_POST['edit_id']) {
			$wpdb->get_var( "UPDATE {$wpdb->prefix}snippet_plugin SET name = '".$_POST['name']."' , content = '".$_POST['content']."' , page = '".$page."' , status = '".$_POST['status']."' , area = '".$_POST['area']."' , sort_order = '".$_POST['sort_order']."',category_id = '".$_POST['category']."',sub_category_id = '".$_POST['sub_category']."',snippet_id = '".$_POST['snippet']."',file = '".$_POST['file']."',type = '".$_POST['type']."',date_updated=now() WHERE id= '".$_POST['edit_id']."'" );


			if(isset($_POST['variables']) && $_POST['variables']){
				$wpdb->get_results( "DELETE FROM ".$wpdb->prefix."snippet_plugin_variable WHERE snippet_id='".$_POST['edit_id']."'", ARRAY_A  );
				foreach ($_POST['variables'] as $key => $value) {
					$wpdb->get_row("INSERT INTO ".$wpdb->prefix."snippet_plugin_variable SET snippet_id='".$_POST['edit_id']."' , variable = '".$key."', value = '".$value."'");
				}
			}
		}else{
			$wpdb->get_var( "INSERT INTO {$wpdb->prefix}snippet_plugin SET name = '".$_POST['name']."' , content = '".$_POST['content']."' , page = '".$page."' , status = '".$_POST['status']."' , area = '".$_POST['area']."' , sort_order = '".$_POST['sort_order']."',category_id = '".$_POST['category']."',sub_category_id = '".$_POST['sub_category']."',snippet_id = '".$_POST['snippet']."',file = '".$_POST['file']."',type = '".$_POST['type']."',date_added=now(),date_updated=now()" );

			if(isset($_POST['variables']) && $_POST['variables']){
				//$wpdb->get_results( "DELETE FROM ".$wpdb->prefix."snippet_variable WHERE  snippet_id='".$_POST['snippet_id']."'", ARRAY_A  );
					$lastid = $wpdb->insert_id;
					foreach ($_POST['variables'] as $key => $value) {
						$wpdb->get_row("INSERT INTO ".$wpdb->prefix."snippet_plugin_variable SET snippet_id='".$lastid."' , variable = '".$key."', `value` = '".$value."'");
					}
				
			}

			if($_POST['type'] == 'snippet') {
				$post = array( 
					"snippet_id" => $_POST['snippet'],
					"HTTP_ORIGIN" => $_SERVER['SERVER_NAME'],
				);
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=snippet_intsall",
				  CURLOPT_RETURNTRANSFER => true,
				  CURLOPT_ENCODING => "",
				  CURLOPT_MAXREDIRS => 10,
				  CURLOPT_TIMEOUT => 30,
				  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				  CURLOPT_CUSTOMREQUEST => "POST",
				  CURLOPT_POSTFIELDS => $post,
				  CURLOPT_HTTPHEADER => array(
				    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				    "cache-control: no-cache",
				    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
				  ),
				));
				$response = curl_exec($curl);
				$err = curl_error($curl);

				curl_close($curl);

				

			}
		}
	}else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if(isset($_POST['delete_snippet'])){
			$wpdb->get_var( "DELETE FROM `{$wpdb->prefix}snippet_plugin` WHERE `id` = '".$_POST['delete_snippet']."'" );
		}
		if(isset($_POST['delete_c_snippet'])){
			$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
			$_POST['id'] = $_POST['delete_c_snippet'];
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=contribute_snippet_delete",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $_POST,
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			    "cache-control: no-cache",
			    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			

			if (!$err) {
				$json_res = json_decode($response,1);
				if($json_res){
					$_GET['c_snippet'] = 1;
				}
			}
		}
	}
	$category = array();
	if(isset($_GET['new_snippet'])) {
		$pages = get_pages();
		$category = array();
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=category",
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
			if(isset($json_res['data']['category']))
				$category = $json_res['data']['category'];
		}
		//$category = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}snippet_category WHERE deleted=0 AND pause=0 AND project_id = '".$project_id."'" ,ARRAY_A);
		$variables = array();
		if(isset($_GET['edit_id'])) {
			$snippet_variable = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."snippet_plugin_variable WHERE snippet_id = '".$_GET['edit_id']."'",ARRAY_A);
			foreach ($snippet_variable as $key => $value) {
				$variables[$value['variable']] = $value['value'];
			}
			$edit_data = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}snippet_plugin WHERE id = '".$_GET['edit_id']."'" ,ARRAY_A);
			if($edit_data){
				$name = $edit_data['name'];
				$content = $edit_data['content'];
				$page = explode(',', $edit_data['page']);
				$status = $edit_data['status'];
				$area = $edit_data['area'];
				$sort_order = $edit_data['sort_order'];
				$category_id = $edit_data['category_id'];
				$sub_category = $edit_data['sub_category_id'];
				$snippet = $edit_data['snippet_id'];
				$type = $edit_data['type'];
			}
		}	

		//echo "<pre>";print_r($page)	;die;
	}else if(isset($_GET['leaderboard'])) {
		$page = isset( $_GET['page_num'] ) ? absint( $_GET['page_num'] ) : 1;
		$_POST['page'] = $page;
		$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=leaderboard",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $_POST,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
		    "cache-control: no-cache",
		    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		

		$limit = 10;
		$total = 0;
		$num_of_pages = 0;
		$entries = array();
		if (!$err) {
			$json_res = json_decode($response,1);
				
			if($json_res){
				$total = isset($json_res['total']) ? $json_res['total'] : 0;
				$num_of_pages = ceil( $total / $limit );
				$entries = isset($json_res['data']) ? $json_res['data'] : '';
			}
		}
	}else if(isset($_GET['c_snippet'])) {
		$page = isset( $_GET['page_num'] ) ? absint( $_GET['page_num'] ) : 1;
		$_POST['page'] = $page;
		$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=contribute_snippet_get",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => $_POST,
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
		    "cache-control: no-cache",
		    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		

		$limit = 10;
		$total = 0;
		$num_of_pages = 0;
		$entries = array();
		if (!$err) {
			$json_res = json_decode($response,1);
			
			if($json_res){
				$_GET['c_snippet'] = 1;
				$total = isset($json_res['total']) ? $json_res['total'] : 0;
				$num_of_pages = ceil( $total / $limit );
				$entries = isset($json_res['data']) ? $json_res['data'] : '';
			}
		}
	}else if(isset($_GET['view_id']) && $_GET['view_id']){
		$view_data = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}snippet_plugin WHERE id = '".$_GET['view_id']."'" ,ARRAY_A);


		if($view_data){
			$category = array();
			$sub_category = array();
			$snippets = array();
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=category&id=".$view_data['category_id'],
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
				if(isset($json_res['data']['category']) && $json_res['data']['category'])
					$category = $json_res['data']['category'][0];
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=subcategory&id=".$view_data['sub_category_id'],
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
					$sub_category = $json_res['data']['subcategory'][0];
			}

			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=snippet&id=".$view_data['snippet_id'],
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
			
				if(isset($json_res['data']['snippet']) && $json_res['data']['snippet'])
					$snippets = $json_res['data']['snippet'][0];
				
			}

			
			//$category = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}snippet_category WHERE id='".$view_data['category_id']."'" ,ARRAY_A);
			//$sub_category = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}snippet_subcategory WHERE id='".$view_data['sub_category_id']."'" ,ARRAY_A);
			//$snippets = $wpdb->get_row( "SELECT * FROM {$wpdb->prefix}snippets WHERE id='".$view_data['snippet_id']."' AND  deleted=0 " ,ARRAY_A);
			
			$name = $view_data['name'];
			$content = $view_data['content'];
			if($view_data['type'] == 'snippet'){
				$curl = curl_init();
				curl_setopt_array($curl, array(
				  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=document&snippet_id=".$view_data['snippet_id'],
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
						if(isset($json_res['data']['document'][0]['data']))
						$content =  $json_res['data']['document'][0]['data'];
					}
				}
			}
			$page_ids = explode(',', $view_data['page']);
			$page = array();
			foreach ($page_ids as $key => $value) {
				$page[] = get_the_title( $value );
			}
			$page = implode(',', $page);
			$status = ($view_data['status']) ? "Enable" : "Disable";
			$area = ($view_data['area'] == 'f') ? "Footer" : "Header";
			$sort_order = $view_data['sort_order'];

			$category_id = ($category) ? $category['name'] : '';

			$sub_category = ($sub_category) ? $sub_category['name'] : '';
			
			$snippet = ($snippets) ? $snippets['name'] : '';
			
			$a_name = ($snippets) ? $snippets['author_name'] : '';
			

			$type = $view_data['type'];
			$date_added = $view_data['date_added'];
			$date_updated = $view_data['date_updated'];
		}
	}elseif(isset($_GET['new_c_snippet']) && $_GET['new_c_snippet']){
		if(isset($_GET['edit_id'])) {
			$snippet_name  = '' ;
			$snippet_code  = '' ;
			$c_name  = '' ;
			$c_website  = '' ;
			$c_email  = '' ;
			$c_description  = '' ;
			
			$_POST['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
			$_POST['id'] = $_GET['edit_id'];
			$curl = curl_init();
			curl_setopt_array($curl, array(
			  CURLOPT_URL => "http://crmentries.com/snippet_manager/?project=wordpress&api=contribute_snippet_getbyid",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $_POST,
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
			    "cache-control: no-cache",
			    "postman-token: c9eb35ea-9cfc-ba5f-a513-87dbb1afbd63"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			

			if (!$err) {
				$json_res = json_decode($response,1);
				if($json_res && isset($json_res['data']) && $json_res['data']){
					$snippet_name  = $json_res['data']['name'];
					$snippet_code  = $json_res['data']['code'];
					$c_name  = $json_res['data']['c_name'];
					$c_website  = $json_res['data']['c_website'];
					$c_email  = $json_res['data']['c_email'];
					$c_description  = $json_res['data']['description'];
				}else{
					$_GET['edit_id'] = '';
				}
			}else{
				$_GET['edit_id'] = '';
			}
			$edit_id  = $_GET['edit_id'];
		}
	}else{
		$page = isset( $_GET['page_num'] ) ? absint( $_GET['page_num'] ) : 1;
		
		$limit = 10; 
		$offset = ( $page - 1 ) * $limit;
		$total = $wpdb->get_var( "SELECT COUNT(`id`) FROM {$wpdb->prefix}snippet_plugin" );
		$num_of_pages = ceil( $total / $limit );
		$entries = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}snippet_plugin LIMIT $offset, $limit" ,ARRAY_A);
	}
?>
<div class="wrap">
	<?php if(isset($_GET['leaderboard'])) { ?>
		<h1 class="wp-heading-inline">Leaderboard</h1>
		<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action">Back</a>
	 	<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
		<table class="wp-list-table widefat fixed striped pages">
			<thead>
				<tr>
					<th>Rank</th>
					<th>Name</th>
					<th>Email</th>
					<th>Website</th>    
					<th>Member seens</th>
					<th>Badge</th>
					<th>Thumbs</th>
					<th>Ratings</th>
					<th>Total snippet</th>
				</tr>
			</thead>
			<tbody>
				<?php if($entries) { $m=1; ?>
				<?php foreach ($entries as $key => $value) { ?>
				  <tr>
				    <td><?php echo $m; ?></td>
				    <!-- <td><a href="<?php echo $up_url; ?>?user_id=<?php echo $value['user_id']; ?>"><?php echo $value['name']; ?></a></td> -->
				    <td><?php echo $value['name']; ?></td>
				    <td><?php echo $value['c_email']; ?></td>
				    <td><?php echo $value['c_website']; ?></td>
				    <td><?php echo $value['add_on']; ?></td>
				    <td><img src="<?php echo $value['badge_img'] ?>" style='width: 50px;height: 50px;'><br/>
				        <?php echo $value['badge']; ?></td>
				    <td><?php echo $value['thumbs']; ?></td>
				    <td><?php echo $value['rating_c']; ?></td>
				    <td><?php echo $value['total']; ?></td>
				  </tr>
				<?php $m++; } ?>
				<?php } else{ ?>
				<tr>
				  <td colspan="4">No snippet found</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</form>
		<?php
		$page_links = paginate_links( array(
		    'base' => add_query_arg( 'page_num', '%#%' ),
		    'format' => '',
		    'prev_text' => __( '&laquo;', 'text-domain' ),
		    'next_text' => __( '&raquo;', 'text-domain' ),
		    'total' => $num_of_pages,
		    'current' => $page
		) );

		if ( $page_links ) {
		    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
		} ?>
	<?php }else if(isset($_GET['new_snippet'])) { ?>
		<h1 class="wp-heading-inline">Add new snippet</h1>
		<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
			<input type="hidden" name="edit_id" value="<?php echo isset($_GET['edit_id']) ? $_GET['edit_id'] : '' ?>">
			<div style="width: 30%;float: left;">
			<table class="wp-list-table"  style="float: left;width: 100%"> 
				<tbody>
					<tr>
						<td><label>Type</label></td>
						<td>
							<input type="radio" name="type" value="custom" <?php echo (!$type || $type == 'custom') ? "checked='checked'" : ''; ?>> Custom <br/>
							<input type="radio" name="type" value="snippet" <?php echo ($type == 'snippet') ? "checked='checked'" : ''; ?>> Snippet <br/>
						</td>
					</tr>
					<tr class="custom_view" style="<?php echo (!$type || $type == 'custom') ? "display: table-row;" : 'display: none;'; ?>">
						<td><label>Name</label></td>
						<td><input type="text" name="name" class="form-control"  value="<?php echo $name; ?>" style='width: 100%'></td>
					</tr>
					<tr class="custom_view" style="<?php echo (!$type || $type == 'custom') ? "display: table-row;" : 'display: none;'; ?>">
						<td><label>Content</label></td>
						<td><textarea class="form-control"  name="content" rows="5"  style='width: 100%;height: 150px;'><?php echo $content; ?></textarea></td>
					</tr>
					<tr>
						<td><label>Page</label></td>
						<td>
							<select name="page[]" multiple="multiple" style='width: 100%' class="form-control" required="required">
								<option <?php echo (in_array('0', $page)) ? ' selected="selected"' : '' ?> value="0">All</option>
								<?php foreach ($pages as $key => $value) { ?>
									<?php if(in_array($value->ID, $page)) { ?>
										<option selected="selected" value="<?php echo $value->ID ?>"><?php echo $value->post_title ?></option>
									<?php } else{ ?>
										<option value="<?php echo $value->ID ?>"><?php echo $value->post_title ?></option>
									<?php } ?>
								<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Status</label></td>
						<td>
							<select name="status"  style='width: 100%' class="form-control">
								<option value="1" <?php echo ($status) ? "selected='selected'" : '' ?> >Enable</option>
								<option value="0" <?php echo (!$status) ? "selected='selected'" : '' ?>><DATA>Disable</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Area</label></td>
						<td>
							<select name="area"  style='width: 100%' class="form-control">
								<option value="h" <?php echo ($area == 'h') ? "selected='selected'" : '' ?>>Header</option>
								<option value="f" <?php echo ($area == 'f') ? "selected='selected'" : '' ?>>Footer</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><label>Sort order</label></td>
						<td><input  style='width: 100%' type="number" name="sort_order"  required="required" value="<?php echo $sort_order ?>" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" name="add_snippet" value="submit" class="page-title-action">
							<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action">Cancel</a>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
			<div style="width: 70%;float: left;">
			<table class="wp-list-table snippet_view" style="float: left;<?php echo ($type == 'snippet') ? "display: block;" : 'display: none;'; ?>width: 100%"> 
				<tr>
					<td><label>Type</label></td>
					<td>
						<select name="snippet_type"  style='width: 100%' class="form-control">
							<option value="official">Snippet officials</option>
							<option value="user_contributed">User contributed</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Category</label></td>
					<td>
						<select name="category"  style='width: 100%' class="form-control">
							<?php foreach ($category as $key => $value) { ?>
								<?php if($category_id == $value['id']) { ?>
								<option selected="selected" value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
								<?php }else{ ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
								<?php } ?>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label>Sub Category</label></td>
					<td>
						<select name="sub_category"  style='width: 100%' class="form-control">
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<!-- <select name="snippet">
						</select> -->
						<input type="hidden" name="snippet" value="<?php echo $snippet; ?>">
						<div class="grid-container snippet_tbl row">
						</div>
						<div class="snippet_tbl_pagination">
							<div class="tablenav bottom">
								<div class="tablenav-pages">
									<span class="prev-page paginate_btns tablenav-pages-navspan button disabled" aria-hidden="true" data-page='1'>‹</span>
									<span class="tablenav-paging-text"><span class="current-pages">1</span> of <span class="total-pages">3</span></span>
									<a class="next-page button paginate_btns"  data-page='2'><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
								</div>
							</div>
						</div>
						<!-- <table class="snippet_tbl wp-list-table widefat striped posts">
							<tbody>
								
							</tbody>
						</table> -->
					</td>
				</tr>
				<tr style="display: none;" class="not_allow">
					<td class="card">
						Please upgrade to primium to use this snippet..!
					</td>
				</tr>
				<tr style="display: none;" class="file_p">
					<td><label>File</label></td>
					<td>
						<select name="file"  style='width: 100%' class="form-control">
						</select>
					</td>
				</tr>
			</table>
			<div class="wrap snippet_code_viewer_p" style="clear: both;display: none;">
				<a href="" class="report_snippet_btn page-title-action" style="float: right;">Report snippet</a>
				<div class="card snippet_code_viewer">
				</div>
			</div>
			<div class="vaiables"  style="clear: both;display: none;">
				<table class="wp-list-table snippet_variable">
					<thead>
						<tr>
						<th>
							Variables
						</th>							
						</tr>
							
					</thead>
					<tbody></tbody>
				</table>
			</div>
			</div>
		</form>
	<?php }elseif(isset($_GET['view_id']) && $_GET['view_id']){ ?>
		<h1 class="wp-heading-inline">Snippet</h1>
		<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action" style="float: right;">Back</a>
		<table class="wp-list-table widefat fixed striped pages">
			<tbody>
				<tr>
					<td>Author Name</td>
					<td><?php echo $a_name; ?></td>
				</tr>
				<tr>
					<td>Name</td>
					<td><?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Page</td>
					<td><?php echo $page; ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><?php echo $status; ?></td>
				</tr>
				<tr>
					<td>Area</td>
					<td><?php echo $area; ?></td>
				</tr>
				<tr>
					<td>Sort order</td>
					<td><?php echo $sort_order; ?></td>
				</tr>
				<?php if($type != 'custom') {?>
				<tr>
					<td>Category</td>
					<td><?php echo $category_id; ?></td>
				</tr>
				<tr>
					<td>Sub category</td>
					<td><?php echo $sub_category; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<td>Content</td>
					<td><?php echo $content; ?></td>
				</tr>
				<tr>
					<td>Type</td>
					<td><?php echo $type; ?></td>
				</tr>
				<tr>
					<td>Date added</td>
					<td><?php echo $date_added; ?></td>
				</tr>
				<tr>
					<td>Date updated</td>
					<td><?php echo $date_updated; ?></td>
				</tr>
			</tbody>
		</table>
	<?php }elseif(isset($_GET['c_snippet']) && $_GET['c_snippet']){ ?>
		<?php if(isset($_GET['e_msg']) && $_GET['e_msg']){ ?>
		<div class="update-nag"><?php echo $_GET['e_msg']; ?></div>
		<br/>
		<?php } ?>
		<h1 class="wp-heading-inline">Contribute Snippets</h1>
		<a href="<?php menu_page_url('snippet-menu-function') ?>" class="page-title-action">Back</a>
		<a href="<?php menu_page_url('snippet-menu-function') ?>&new_c_snippet=1" class="page-title-action">Add New</a>
		<a href="<?php menu_page_url('snippet-menu-function') ?>&admin_contact=1" class="page-title-action">Contact to admin</a>
	 	<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
		<table class="wp-list-table widefat fixed striped pages">
			<thead>
				<tr>
					<th>Snippet Name</th>
					<th>Name</th>
					<th>Email</th>
					<th>Website</th>
					<th>Added on</th>
					<th>Edited on</th>
					<th>Thumbs</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="the-list">
				<?php foreach ($entries as $key => $value) { ?>
					<tr>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo $value['c_name'] ?></td>
						<td><?php echo $value['c_email'] ?></td>
						<td><?php echo $value['c_website'] ?></td>
						<td><?php echo $value['add_on'] ?></td>
						<td><?php echo $value['edit_on'] ?></td>
						<td><?php echo $value['thumbs'] ?></td>
						<td style="<?php echo (strtolower($value['status']) == 'rejected') ? 'color: #ff0000' : (strtolower($value['status'] == "Approved") ? 'color: #17e457' : ''); ?>"><?php echo $value['status'] ?></td>
						<td>
						 	<button type="submit" value="<?php echo $value['id'] ?>"  name="delete_c_snippet" class='page-title-action'>Delete</button>
						 	<a href="<?php menu_page_url('snippet-menu-function') ?>&new_c_snippet=1&edit_id=<?php echo $value['id'] ?>"  class='page-title-action'>Edit</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</form>
		<?php
		$page_links = paginate_links( array(
		    'base' => add_query_arg( 'page_num', '%#%' ),
		    'format' => '',
		    'prev_text' => __( '&laquo;', 'text-domain' ),
		    'next_text' => __( '&raquo;', 'text-domain' ),
		    'total' => $num_of_pages,
		    'current' => $page
		) );

		if ( $page_links ) {
		    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
		} ?>
	<?php }elseif(isset($_GET['admin_contact']) && $_GET['admin_contact']){ ?>
		<h1 class="wp-heading-inline">Contact to admin</h1>
		<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
			<div style="width: 100%;">
				<table class="wp-list-table"  style="float: left;width: 100%"> 
					<tbody>
						<tr>
							<td style='width:20%'><label>Title</label></td>
							<td>
								<input type="text" name="title" required="required" class="form-control" placeholder="Enter title">
							</td>
						</tr>
						<tr>
							<td><label>Description</label></td>
							<td>
								<textarea class="form-control" name="description"  required="required" rows="4"  placeholder="Enter description" style="height:150px;"></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" name="contact_to_admin_snippet" value="submit" class="page-title-action">
								<a href="<?php menu_page_url('snippet-menu-function') ?>&c_snippet=1" class="page-title-action">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	<?php }elseif(isset($_GET['new_c_snippet']) && $_GET['new_c_snippet']){ ?>
		<h1 class="wp-heading-inline">Add new Contribute Snippets</h1>
		<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
			<div style="width: 100%;">
				<table class="wp-list-table"  style="float: left;width: 100%"> 
					<tbody>
						<tr>
							<td style='width:20%'><label>Snippet name</label></td>
							<td>
								<input type="text" name="snippet_name" value="<?php echo isset($snippet_name) ? $snippet_name : '';  ?>" required="required" class="form-control" placeholder="Enter snippet name">
							</td>
						</tr>
						<tr>
							<td><label>Snippet</label></td>
							<td>
								<textarea  placeholder="Enter snippet code" class="form-control" name="snippet_code" required="required" rows="4"  style="height:150px;"><?php echo isset($snippet_code) ? $snippet_code : '';  ?></textarea>
							</td>
						</tr>

						<tr>
							<td><label>Your name</label></td>
							<td>
								<input type="text" name="c_name" value="<?php echo isset($c_name) ? $c_name : '';  ?>" required="required" class="form-control" placeholder="Enter your name">
							</td>
						</tr>

						<tr>
							<td><label>Your website</label></td>
							<td>
								<input type="text" name="c_website" value="<?php echo isset($c_website) ? $c_website : '';  ?>" required="required" class="form-control"  placeholder="Enter your website">
							</td>
						</tr>

						<tr>
							<td><label>Your email</label></td>
							<td>
								<input type="text" name="c_email" value="<?php echo isset($c_email) ? $c_email : '';  ?>" required="required" class="form-control"  placeholder="Enter your email">
							</td>
						</tr>

						<tr>
							<td><label>Description</label></td>
							<td>
								<textarea class="form-control" name="c_description"  required="required" rows="4"  placeholder="Enter description" style="height:150px;"><?php echo isset($c_description) ? $c_description : '';  ?></textarea>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="hidden" name="edit_id" value="<?php echo isset($edit_id) ? $edit_id : '' ?>">
								<input type="submit" name="add_c_snippet" value="submit" class="page-title-action">
								<a href="<?php menu_page_url('snippet-menu-function') ?>&c_snippet=1" class="page-title-action">Cancel</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</form>
	<?php }elseif(isset($_GET['review']) && $_GET['review']){ 
		require_once(plugin_dir_path( __FILE__ ) .'review.php');
	}elseif(isset($_GET['report_id']) && $_GET['report_id']){ 
		require_once(plugin_dir_path( __FILE__ ) .'report_snippet.php');
	}elseif(isset($_GET['difm']) && $_GET['difm']){ 
		require_once(plugin_dir_path( __FILE__ ) .'difm.php');
	}elseif(isset($_GET['suggest_change']) && $_GET['suggest_change']){ 
		require_once(plugin_dir_path( __FILE__ ) .'suggest_change.php');
	}elseif(isset($_GET['request_help']) && $_GET['request_help']){ 
		require_once(plugin_dir_path( __FILE__ ) .'request_help.php');
	}else{ ?>
		<?php if(isset($_GET['e_msg']) && $_GET['e_msg']){ ?>
		<div class="update-nag"><?php echo $_GET['e_msg']; ?></div>
		<br/>
		<?php } ?>
		<h1 class="wp-heading-inline">Snippets</h1>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&new_snippet=1" class="page-title-action">Add New</a>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&c_snippet=1" class="page-title-action">Contribute Snippets</a>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&leaderboard=1" class="page-title-action">Leaderboard</a>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&difm=1" class="page-title-action">Do it for me</a>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&suggest_change=1" class="page-title-action">Suggest a change</a>
	 	<a href="<?php menu_page_url('snippet-menu-function') ?>&request_help=1" class="page-title-action">Request help</a>
	 	<form action="<?php menu_page_url('snippet-menu-function') ?>" method="post">
		<table class="wp-list-table widefat fixed striped pages">
			<thead>
				<tr>
					<th>Name</th>
					<th>Area</th>
					<th>sort order</th>
					<th>Date added</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="the-list">
				<?php foreach ($entries as $key => $value) { ?>
					<tr>
						<td><?php echo $value['name'] ?></td>
						<td><?php echo ($value['area'] == 'h') ? "Header" : "Footer" ?></td>
						<td><?php echo $value['sort_order'] ?></td>
						<td><?php echo $value['date_added'] ?></td>
						<td><?php echo $value['status'] ? "Enable" : "Disable" ?></td>
						<td>
							<?php if($value['type'] == 'snippet') { ?>
								<?php if(!$value['review']) {?>
								<a href="<?php menu_page_url('snippet-menu-function') ?>&review=<?php echo $value['id'] ?>&id=<?php echo $value['snippet_id'] ?>"  class='page-title-action'>Add Review</a>
								<?php } else{ ?>
									<button class='page-title-action' title="Review already added" disabled="disabled">Review Added</button>
								<?php } ?>
							<?php } ?>
						 	<button type="submit" value="<?php echo $value['id'] ?>"  name="delete_snippet" class='page-title-action'>Delete</button>
						 	<a href="<?php menu_page_url('snippet-menu-function') ?>&new_snippet=1&edit_id=<?php echo $value['id'] ?>"  class='page-title-action'>Edit</a>
						 	<a href="<?php menu_page_url('snippet-menu-function') ?>&view_id=<?php echo $value['id'] ?>"  class='page-title-action'>View</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		</form>
		<?php
		$page_links = paginate_links( array(
		    'base' => add_query_arg( 'page_num', '%#%' ),
		    'format' => '',
		    'prev_text' => __( '&laquo;', 'text-domain' ),
		    'next_text' => __( '&raquo;', 'text-domain' ),
		    'total' => $num_of_pages,
		    'current' => $page
		) );

		if ( $page_links ) {
		    echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">' . $page_links . '</div></div>';
		} ?>
	<?php } ?>
</div>
<div class="side_div">
	<span class="close_side_div">x</span>
	<div>
		<table class="wp-list-table widefat striped posts">
			<tr class="img_author">
				<td colspan="2">
					<img src="" style="width: 100px; height: 100px;">
				</td>
			</tr>
			<tr>
				<td style="width: 14%;">Name:</td>
				<td class="name"></td>
			</tr>
			<tr>
				<td style="width: 14%;">Email:</td>
				<td class="email"></td>
			</tr>
		</table>
	</div>
	<br/>
	<div class="snippets">

	</div>
	<br/>
	<br/>
	<br/>
</div>

<div class="side_review_div">
	<span class="close_side_div">x</span>
	<div>
		<!-- <table class="wp-list-table widefat striped posts">
			<thead>
				<tr>
					<td>Name</td>
					<td>Review</td>
					<td>Rating</td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>
			
			
		</table> -->
		<div class="review_data_div">
			
		</div>
		<div class="tablenav bottom">
			<div class="tablenav-pages">
				<span class="prev-page paginate_btns tablenav-pages-navspan button disabled" aria-hidden="true" data-page='1'>‹</span>
				<span class="tablenav-paging-text"><span class="current-pages">1</span> of <span class="total-pages">3</span></span>
				<a class="next-page button paginate_btns"  data-page='2'><span class="screen-reader-text">Next page</span><span aria-hidden="true">›</span></a>
			</div>
		</div>
	</div>
</div>
<div class="side_snippet_info_div">
	<span class="close_side_div">x</span>
	<div class="snippet_info_div">
		<div class="w50">
			<img src="" class="thumb_img" style="width: 150px;height: 150px;">
			<hr/>
			<audio controls class="snippet_audio" src="">
			  
			</audio>
			<hr/>
			<iframe class="snippet_video" style="width: 100%" height="350" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
			<h2>Blogs</h2>
			<table class="wp-list-table widefat striped posts snippet_blog_tbl">
				<tbody>
					
				</tbody>
			</table>
		</div>
		<div class="w50">
			<table class="wp-list-table widefat striped posts snippet_info_tbl">
				<tbody>
					<tr>
						<td><b>Name</b></td>
						<td class="name"></td>
					</tr>
					<tr>
						<td><b>Category name</b></td>
						<td class="cname"></td>
					</tr>
					<tr>
						<td><b>Sub category name</b></td>
						<td class="scname"></td>
					</tr>
					<tr>
						<td><b>Site keyword</b></td>
						<td class="site_keyword"></td>
					</tr>
					<tr>
						<td><b>Site description</b></td>
						<td class="site_description"></td>
					</tr>
					<tr>
						<td><b>Add on</b></td>
						<td class="added_on"></td>
					</tr>
				</tbody>
			</table>
			<h2 class="snippet_code_heading">Code</h2>
			<div class="card snippet_code_">
				
			</div>
			<table class="wp-list-table widefat striped posts snippet_like_tbl">
				<tbody>
					<tr>
						<td><b>Like</b></td>
						<td class="like"></td>
					</tr>
					<tr>
						<td><b>Dislike</b></td>
						<td class="dislike"></td>
					</tr>
				</tbody>
			</table>
		</div>
		<br style="clear: both;" />
	</div>
	<br/>
	<br/>
	<br/>
</div>
<script type="text/javascript">
	jQuery(document).ready(function(){
		ajaxurl = 'https://crmentries.com/snippet_manager/wp-admin/admin-ajax.php';

		$sub_category_id = '<?php echo $sub_category; ?>';
		$snippet_id = '<?php echo $snippet; ?>';
		jQuery('[name="category"]').change(function(e){
		    e.preventDefault();
		    jQuery('[name="sub_category"]').html('');
			jQuery('[name="snippet"]').html('');
			jQuery('.snippet_code_viewer').html('');
			jQuery('.snippet_tbl tbody').html('');
		    $this = jQuery(this);
		    jQuery.ajax({
	            //url:ajaxurl,
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=subcategory&category_id='+jQuery('[name="category"]').val(),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippet_subcategory",
	              category_id:$this.val(),
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	              
	              html = '';
	              if(json['data']['subcategory']){
	                jQuery.each(json['data']['subcategory'],function(i,j){
	                  if($sub_category_id == j['id']){
	                    html += '<option value="'+j['id']+'" selected="selected">'+j['name']+'</option>';
	                  }else{
	                    html += '<option value="'+j['id']+'">'+j['name']+'</option>';
	                  }
	                })
	              } 
	              jQuery('[name="sub_category"]').html(html);
	              jQuery('[name="sub_category"]').trigger("change");
	            }
        })
	    });
  		jQuery('[name="category"]').trigger("change");
		jQuery('[name="sub_category"],[name="snippet_type"]').change(function(e){
			jQuery(".file_p").hide();
			jQuery(".not_allow").hide();
			jQuery(".snippet_code_viewer_p").hide();
			jQuery(".select_snippet").removeClass("active");
		    e.preventDefault();
		    jQuery('[name="snippet"]').html('');
		    jQuery('.snippet_code_viewer').html('');
		    jQuery('.snippet_tbl tbody').html('');

		    jQuery(".snippet_tbl_pagination .prev-page").data("id",'');
			jQuery(".snippet_tbl_pagination .next-page").data("id",'');
			jQuery(".snippet_tbl_pagination .current-pages").html("");
			jQuery(".snippet_tbl_pagination .total-pages").html("");

		    $this = jQuery(this);
		    jQuery.ajax({
	            //url:ajaxurl,
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=snippet&sub_category_id='+jQuery('[name="sub_category"]').val()+'&type='+jQuery('[name="snippet_type"]').val(),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippets",
	              id:$this.val(),
	              snippet_type:jQuery('[name="snippet_type"]').val(),
	              site:"<?php echo $_SERVER['SERVER_NAME']; ?>",
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	              
	              /*html = '';
	              if(json['data']){
	                jQuery.each(json['data'],function(i,j){
	                  if($snippet_id == j['id']){
	                    html += '<option value="'+j['id']+'" selected="selected">'+j['title']+'</option>';
	                  }else{
	                    html += '<option value="'+j['id']+'">'+j['title']+'</option>';
	                  }
	                })
	              } 
	              jQuery('[name="snippet"]').html(html);
	              jQuery('[name="snippet"]').trigger("change");*/

	              html = '';
	              if(json['data']){
	              	/*html += '<thead>';
	              	html += '<tr>';
	                		html += '<th>Thumb</th>';
	                		html += '<th>Snippet</th>';
	                		html += '<th>Author</th>';
	                		html += '<th>Installed</th>';
	                		html += '<th>Reviews</th>';
	                		html += '<th>Date added</th>';
	                		html += '<th>Date updated</th>';
	                		html += '<th>Type</th>';
	                		html += '<th>Action</th>';
	                html += '</tr>';
	              	html += '</thead>';
	              	html += '<tbody>';*/
	              	$i = 0;
	                jQuery.each(json['data']['snippet'],function(i,j){
	                	$i = $i + 1;
	                	like = '';
						unlike = '';
	                	if(j['like'])
	                		like = 'active';
						if(j['unlike'])
							unlike = 'active';

						html += '<div class="grid-item column">'
							html += '<div class="extension-preview">';
							if(j['thumb_image']){
								html += '<img src="'+j['thumb_image']+'">';
							}
							html += '</div>';
							html += '<div class="extension-name">';
								html += '<p>'+j['name']+'</p>';
								html += '<p><span>'+j['type']+'</span></p>';
							html += '</div>';
							html += '<div>';
								html += '<div class="w50">';
									html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-up '+like+'"><br/><span>';
			                		html += '<p>('+j['snippet_like']+')</p>';
			                		html += '</span></div>';
			                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-down '+unlike+'"><br/><span>';
			                		html += '<p>('+j['snippet_unlike']+')</p>';
			                		html += '</span></div>';
								html += '</div>';
								html += '<div class="w50">';
									html += '<p><a href="#" class="review_data" data-id="'+j['id']+'">'+j['review']+' reviews </a></p>';
									html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="select_snippet  page-title-action">Select</button>';
									html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="info_snippet  page-title-action">Info</button>';
								html += '</div>';
							html += '</div>';
						html += '</div>';
	                	/*html += '<tr>';
	                		html += '<td>';
	                		if(j['thumb_image']){
	                		html += '<img src="'+j['thumb_image']+'" style="width:80px;height:80px;">';
	                		}
	                		html += '</td>';
	                		html += '<td style="vertical-align: middle;">'+j['name']+'</td>';
	                		html += '<td style="vertical-align: middle;"><a href="#" class="author_data" data-id="'+j['user_id']+'">'+j['author_name']+'</a></td>';
	                		html += '<td style="vertical-align: middle;">'+j['installation']+'</td>';
	                		html += '<td styl3e="vertical-align: middle;">';
	                		if(j['review']){
	                			html += '<a href="#" class="review_data" data-id="'+j['id']+'">'+j['review']+' / 5</a> ';
	                		}
	                		html += '</td>';
	                		html += '<td style="vertical-align: middle;">'+j['add_on']+'</td>';
	                		html += '<td style="vertical-align: middle;">'+j['edit_on']+'</td>';
	                		html += '<td style="vertical-align: middle;">'+j['type']+'</td>';
	                		html += '<td style="vertical-align: middle;">'
	                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-up '+like+'"><br/><span>';
	                		html += '('+j['snippet_like']+')';
	                		html += '</span></div>';
	                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-down '+unlike+'"><br/><span>';
	                		html += '('+j['snippet_unlike']+')';
	                		html += '</span></div>';
	                		html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="select_snippet  page-title-action">Select</button>';
	                		html += '</td>';
	                	html += '</tr>';*/
	                })
	              	/*html += '</tbody>';*/
	              }
	              //jQuery('.snippet_tbl tbody').html(html);
	              jQuery('.snippet_tbl').html(html);
	              if($snippet_id){
	              	jQuery(".select_snippet[data-id='"+$snippet_id+"']").click();
	              }

		            jQuery(".snippet_tbl_pagination .prev-page").data("id",$this.val());
					jQuery(".snippet_tbl_pagination .next-page").data("id",$this.val());
				    if(json['data']['total']){
	          			jQuery(".snippet_tbl_pagination .tablenav").show();
	          			jQuery(".snippet_tbl_pagination .prev-page").addClass("disabled").data("page",1);
						jQuery(".snippet_tbl_pagination .next-page").data("page",2);
						jQuery(".snippet_tbl_pagination .current-pages").html(1);
						jQuery(".snippet_tbl_pagination .total-pages").html(json['data']['total']);
				    }else{
	          			jQuery(".snippet_tbl_pagination .tablenav").hide();
				    }

	            }
	        })
	    });
		jQuery('.snippet_tbl_pagination .paginate_btns').click(function(e){
		    $this = jQuery(this);
			if($this.hasClass("disabled")){
				return false;
			}
			jQuery(".file_p").hide();
			jQuery(".not_allow").hide();
			jQuery(".snippet_code_viewer_p").hide();
			jQuery(".select_snippet").removeClass("active");
		    e.preventDefault();
		    jQuery('[name="snippet"]').html('');
		    jQuery('.snippet_code_viewer').html('');
		    jQuery('.snippet_tbl tbody').html('');
			

		    jQuery.ajax({
	            //url:ajaxurl,
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=snippet&page='+$this.data("page")+'&sub_category_id='+jQuery('[name="sub_category"]').val()+'&type='+jQuery('[name="snippet_type"]').val(),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippets",
	              id:$this.val(),
	              snippet_type:jQuery('[name="snippet_type"]').val(),
	              site:"<?php echo $_SERVER['SERVER_NAME']; ?>",
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	              
	              /*html = '';
	              if(json['data']){
	                jQuery.each(json['data'],function(i,j){
	                  if($snippet_id == j['id']){
	                    html += '<option value="'+j['id']+'" selected="selected">'+j['title']+'</option>';
	                  }else{
	                    html += '<option value="'+j['id']+'">'+j['title']+'</option>';
	                  }
	                })
	              } 
	              jQuery('[name="snippet"]').html(html);
	              jQuery('[name="snippet"]').trigger("change");*/

	              html = '';
	              if(json['data']){
	              	jQuery('.snippet_tbl_pagination .paginate_btns').removeClass("disabled");
	              	/*html += '<thead>';
	              	html += '<tr>';
	                		html += '<th>Thumb</th>';
	                		html += '<th>Snippet</th>';
	                		html += '<th>Author</th>';
	                		html += '<th>Installed</th>';
	                		html += '<th>Reviews</th>';
	                		html += '<th>Date added</th>';
	                		html += '<th>Date updated</th>';
	                		html += '<th>Type</th>';
	                		html += '<th>Action</th>';
	                html += '</tr>';
	              	html += '</thead>';
	              	html += '<tbody>';*/
	              	$i = 0;
	                jQuery.each(json['data']['snippet'],function(i,j){
	                	$i = $i + 1;
	                	like = '';
						unlike = '';
	                	if(j['like'])
	                		like = 'active';
						if(j['unlike'])
							unlike = 'active';

						html += '<div class="grid-item column">'
							html += '<div class="extension-preview">';
							if(j['thumb_image']){
								html += '<img src="'+j['thumb_image']+'">';
							}
							html += '</div>';
							html += '<div class="extension-name">';
								html += '<p>'+j['name']+'</p>';
								html += '<p><span>'+j['type']+'</span></p>';
							html += '</div>';
							html += '<div>';
								html += '<div class="w50">';
									html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-up '+like+'"><br/><span>';
			                		html += '<p>('+j['snippet_like']+')</p>';
			                		html += '</span></div>';
			                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-down '+unlike+'"><br/><span>';
			                		html += '<p>('+j['snippet_unlike']+')</p>';
			                		html += '</span></div>';
								html += '</div>';
								html += '<div class="w50">';
									html += '<p><a href="#" class="review_data" data-id="'+j['id']+'">'+j['review']+' reviews </a></p>';
									html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="select_snippet  page-title-action">Select</button>';
									html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="info_snippet  page-title-action">Info</button>';
								html += '</div>';
							html += '</div>';
						html += '</div>';
	                	/*html += '<tr>';
	                		html += '<td>';
	                		if(j['thumb_image']){
	                		html += '<img src="'+j['thumb_image']+'" style="width:80px;height:80px;">';
	                		}
	                		html += '</td>';
	                		html += '<td style="vertical-align: middle;">'+j['name']+'</td>';
	                		html += '<td style="vertical-align: middle;"><a href="#" class="author_data" data-id="'+j['user_id']+'">'+j['author_name']+'</a></td>';
	                		html += '<td style="vertical-align: middle;">'+j['installation']+'</td>';
	                		html += '<td styl3e="vertical-align: middle;">';
	                		if(j['review']){
	                			html += '<a href="#" class="review_data" data-id="'+j['id']+'">'+j['review']+' / 5</a> ';
	                		}
	                		html += '</td>';
	                		html += '<td style="vertical-align: middle;">'+j['add_on']+'</td>';
	                		html += '<td style="vertical-align: middle;">'+j['edit_on']+'</td>';
	                		html += '<td style="vertical-align: middle;">'+j['type']+'</td>';
	                		html += '<td style="vertical-align: middle;">'
	                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-up '+like+'"><br/><span>';
	                		html += '('+j['snippet_like']+')';
	                		html += '</span></div>';
	                		html += '<div  data-id="'+j['id']+'" class="wp-menu-image dashicons-before dashicons-thumbs-down '+unlike+'"><br/><span>';
	                		html += '('+j['snippet_unlike']+')';
	                		html += '</span></div>';
	                		html += '<button type="button" data-name="'+j['name']+'" data-id="'+j['id']+'" class="select_snippet  page-title-action">Select</button>';
	                		html += '</td>';
	                	html += '</tr>';*/
	                })
	              	/*html += '</tbody>';*/
	              }
	              //jQuery('.snippet_tbl tbody').html(html);
		            jQuery('.snippet_tbl').html(html);
		            if($snippet_id){
		              	jQuery(".select_snippet[data-id='"+$snippet_id+"']").click();
		            }

		            sc_page = $this.data("page");
					jQuery(".snippet_tbl_pagination .current-pages").html(sc_page);

		            if($this.hasClass("next-page")){
						if((sc_page + 1) > json['data']['total'] ){
							$this.addClass("disabled");
						}
						jQuery(".snippet_tbl_pagination .next-page").data("page",sc_page + 1);
						jQuery(".snippet_tbl_pagination .prev-page").data("page",sc_page - 1);
					}else{
						if((sc_page - 1) <= 0 ){
							$this.addClass("disabled");
						}
						jQuery(".snippet_tbl_pagination .next-page").data("page",sc_page + 1);
						jQuery(".snippet_tbl_pagination .prev-page").data("page",sc_page - 1);
					}

	            }
	        })
	    });
		/*
		jQuery('[name="snippet"]').change(function(e){
		    e.preventDefault();
		    jQuery('.snippet_code_viewer').html('');
		    $this = jQuery(this);
		    jQuery.ajax({
	            url:ajaxurl,
	            data:{
	              action:"get_snippets_file",
	              id:$this.val(),
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	              if(json['error']){
	                jQuery(".error_pop .modal-body p").html(json['error']);
	                jQuery(".error_pop_btn")[0].click();
	              }
	              html = '';
	              if(json['data']){
	                jQuery.each(json['data'],function(i,j){
	                    html += '<option value="'+j['id']+'" data-path='+j['path']+'>'+j['name']+'</option>';	    
	                })
	              } 
	              jQuery('[name="file"]').html(html);
	              jQuery('[name="file"]').trigger("change");
	              jQuery(".file_p").show();
				  jQuery(".snippet_code_viewer_p").show();
	            }
	        })
	    });*/
	    <?php if(isset($variables)) { ?>
	    	var variables = <?php echo json_encode($variables); ?>;
	    <?php } ?>
		jQuery(document).delegate('.select_snippet',"click",function(e){
			jQuery(".select_snippet").removeClass("active");
			jQuery(this).addClass("active");
		    e.preventDefault();
		    jQuery('.snippet_code_viewer').html('');
		    $this = jQuery(this);
		    jQuery('[name="snippet"]').val($this.data("id"));
		    jQuery('[name="name"').val($this.data("name"));
		    jQuery(".not_allow").hide();
		    jQuery(".vaiables").hide();
		    id = $this.data("id");
		    jQuery.ajax({
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=document&snippet_id='+$this.data("id"),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippets_file",
	              id:$this.data("id"),
	              HTTP_ORIGIN:'<?php echo $_SERVER['SERVER_NAME'] ?>',
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
		            if(json['data']['allow']){
		              html = '';
		              if(json['data']['document']){
		                jQuery.each(json['data']['document'],function(i,j){
		                    html += '<option value="'+j['id']+'" data-path='+j['path']+'>'+j['name']+'</option>';	    
		                })
		              } 
		              jQuery('[name="file"]').html(html);
		              jQuery('[name="file"]').trigger("change");
		              if(html){
			              jQuery(".file_p").show();
						  jQuery(".snippet_code_viewer_p").show();
		              }else{
						  jQuery(".snippet_code_viewer_p").hide();
		              }
		              jQuery(".report_snippet_btn").attr("href","<?php menu_page_url('snippet-menu-function') ?>&report_id="+id)
		            }else{
		            	jQuery(".not_allow").show();
		            }
		            html = '';
		            if(json['data']['variables']){
		            	jQuery.each(json['data']['variables'],function(i,j){
		            		value = '';
		            		if (typeof variables[j['name']] !== "undefined") {
			            		value = variables[j['name']];
							}
			            	html += '<tr>';
			            		html += '<td>';
			            			html += '<input name="variables['+j['name']+']" class="form-control" placeholder="'+j['name']+'" value="'+value+'">';
			            		html += '</td>';
			            	html += '</tr>';
		            	})
		            }
		            jQuery(".vaiables .snippet_variable tbody").html(html);
		            jQuery(".vaiables").show();
		        }
	        })
	    });
		jQuery('[name="file"]').change(function(e){
		    e.preventDefault();
		    $this = jQuery(this);
		    jQuery.ajax({
	             url:'https://crmentries.com/snippet_manager/?project=wordpress&api=document_info&doc_id='+$this.val(),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippets_file_data",
	              id:$this.val(),
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	              
	              if(json['data']['document']){
	                jQuery(".snippet_code_viewer").text(json['data']['document']['data']); 
	              } 
	            }
	        })
	    });
		jQuery('[name="type"]').change(function(e){
			if(jQuery(this).val() == 'custom'){
				jQuery(".custom_view").css("display","table-row");
				jQuery(".snippet_view").hide();
			}else{
				jQuery(".custom_view").hide();
				jQuery(".snippet_view").show();
			}
				jQuery('[name="name"').val('');
		})
		jQuery(document).delegate(".author_data","click",function(e){
			e.preventDefault();
		    $this = jQuery(this);
		    jQuery(".name").html('');
		    jQuery(".email").html('');
		    jQuery(".side_div .snippets").html('');
		    jQuery.ajax({
	             url:'https://crmentries.com/snippet_manager/?project=wordpress&api=author_info&author_id='+$this.data("id"),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            data:{
	              action:"get_snippets_file_data",
	              id:$this.val(),
	            },
	            type:"post",
	            dataType:"json",
	            success:function(json){
	            	if(json['data']['author_info']){
	            		data = json['data']['author_info'];
	            		if(data['profile_img']){
	            			jQuery(".img_author").show();
	            			jQuery(".img_author img").attr("src",data['profile_img']);
	            		}else{
	            			jQuery(".profile_img").hide();
	            		}
		            	jQuery(".name").html(data['name']);
					    jQuery(".email").html(data['email']);
					    if(data['snippets']){
					    	html = '';
					    	jQuery.each(data['snippets'],function(i,j){
								html += '<br/>';
					    		html += '<table class="snippet_tbl wp-list-table widefat striped posts">';
									html += '<thead>';

										html += '<tr>';
											html += '<th colspan="5"><b>'+j['project_name']+'</b></th>';
										html += '</tr>';
										html += '<tr>';
											html += '<th>Thumb</th>';
											html += '<th>Snippet</th>';
											html += '<th>Installed</th>';
											html += '<th>Date added</th>';
											html += '<th>Date updated</th>';
										html += '</tr>';
									html += '</thead>';
									html += '<tbody>';
					    				jQuery.each(j['data'],function(ii,jj){
											html += '<tr>';
												html += '<td>'
													if(jj['thumb_image']){
													html += '<img src="'+jj['thumb_image']+'" style="width:80px;height:80px;">';
													}
												html += '</td>';
												html += '<td style="vertical-align: middle;">'+jj['title']+'</td>';
												html += '<td style="vertical-align: middle;">'+jj['installation']+'</td>';
												html += '<td style="vertical-align: middle;">'+jj['add_on']+'</td>';
												html += '<td style="vertical-align: middle;">'+jj['edit_on']+'</td>';
											html += '</tr>';
										})
									html += '</tbody>';
								html += '</table>';
					    	})
					    	jQuery(".side_div .snippets").html(html);
					    }
	            	}
				    
	              jQuery(".side_div").addClass("active");
	            }
	        })
		});
		jQuery(document).delegate(".review_data","click",function(e){
			e.preventDefault();
		    $this = jQuery(this);
		    jQuery(".side_review_div .prev-page").data("id",'');
			jQuery(".side_review_div .next-page").data("id",'');
			jQuery(".side_review_div .current-pages").html("");
			jQuery(".side_review_div .total-pages").html("");
		    jQuery(".side_review_div table tbody").html('');
		    jQuery.ajax({
	             url:'https://crmentries.com/snippet_manager/?project=wordpress&api=get_snippet_reviews&id='+$this.data("id")+'&page=1',
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            type:"post",
	            dataType:"json",
	            success:function(json){
	            	if(json['data']){
	            		data = json['data']['review'];
					    
				    	html = '';

	    				jQuery.each(data,function(ii,jj){
							/*html += '<tr>';
								html += '<td style="vertical-align: middle;">'+jj['name']+'</td>';
								html += '<td style="vertical-align: middle;">'+jj['description']+'</td>';
								html += '<td style="vertical-align: middle;"><p class="starability-result" data-rating="'+jj['review']+'"></p></td>';
							html += '</tr>';*/
								//html += '<h3 style="display: inline-block;float: left;margin: 8px;">'+jj['name']+'</h3><p style="float: left;margin: 1em 0;" class="starability-result" data-rating="'+jj['review']+'"></p>';
							html += "<div>";
								checked1 = '';
								checked2 = '';
								checked3 = '';
								checked4 = '';
								checked5 = '';
								if(jj['review'] >= 1){
									checked1 = "checked";
								}if(jj['review'] >= 2){
									checked2 = "checked";
								}if(jj['review'] >= 3){
									checked3 = "checked";
								}if(jj['review'] >= 4){
									checked4 = "checked";
								}if(jj['review'] >= 5){
									checked5 = "checked";
								}
								html += '<h3 style="display: inline-block;float: left;margin: 13px 8px;">'+jj['name']+'</h3><p style="float: left;margin: 1em 0;"><span class="fa fa-star '+checked1+'"></span><span class="fa fa-star '+checked2+'"></span><span class="fa fa-star '+checked3+'"></span><span class="fa fa-star '+checked4+'"></span><span class="fa fa-star '+checked5+'"></p>';
								html += '<p style="clear:both;margin: 8px;">'+jj['description']+'</p>';
							html += "</div><hr/>";
						})
						
				    	jQuery(".review_data_div").html(html);

					    jQuery(".side_review_div .prev-page").data("id",$this.data("id"));
						jQuery(".side_review_div .next-page").data("id",$this.data("id"));
					    if(json['data']['total']){
	              			jQuery(".side_review_div .tablenav").show();
	              			jQuery(".side_review_div .prev-page").addClass("disabled").data("page",1);
							jQuery(".side_review_div .next-page").data("page",2);
							jQuery(".side_review_div .current-pages").html(1);
							jQuery(".side_review_div .total-pages").html(json['data']['total']);
					    }else{
	              			jQuery(".side_review_div .tablenav").hide();
					    }
	            	}
				    
	              jQuery(".side_review_div").addClass("active");
	            }
	        })
		});
		jQuery(document).delegate(".info_snippet","click",function(e){
			e.preventDefault();
		    $this = jQuery(this);
		    jQuery.ajax({
	             url:'https://crmentries.com/snippet_manager/?project=wordpress&api=snippet_info&snippet_id='+$this.data("id"),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            type:"post",
	            dataType:"json",
	            success:function(json){
	            	if(json['data']){
	            		if(json['data']['thumb']){
	            			jQuery(".side_snippet_info_div .thumb_img").attr("src",json['data']['thumb']);
	            			jQuery(".side_snippet_info_div .thumb_img").show();
	            		}else{
	            			jQuery(".side_snippet_info_div .thumb_img").hide();
	            		}

	            		if(json['data']['audio']){
	            			jQuery(".side_snippet_info_div .snippet_audio").attr("src",json['data']['audio']);
	            			jQuery(".side_snippet_info_div .snippet_audio").show();
	            		}else{
	            			jQuery(".side_snippet_info_div .snippet_audio").hide();
	            		}
	            		if(json['data']['embed_video']){
	            			jQuery(".side_snippet_info_div .snippet_video").attr("src",json['data']['embed_video']);
	            			jQuery(".side_snippet_info_div .snippet_video").show();
	            		}else{
	            			jQuery(".side_snippet_info_div .snippet_video").hide();
	            		}
	            		if(json['data']['code']){
	            			jQuery(".side_snippet_info_div .snippet_code_").html(json['data']['code']);
	            			jQuery(".side_snippet_info_div .snippet_code_").show();
	            			jQuery(".side_snippet_info_div .snippet_code_heading").show();
	            		}else{
	            			jQuery(".side_snippet_info_div .snippet_code_").hide();
	            			jQuery(".side_snippet_info_div .snippet_code_heading").hide();
	            		}

	            		html = '';
	            		if(json['data']['blog']){
	            			jQuery.each(json['data']['blog'],function(i,j){
		            			html += "<tr>";
		            				html += "<td>";
		            					html += i+1;
		            				html += "</td>";
		            				html += "<td>";
		            					html += j['blog'];
		            				html += "</td>";
		            			html += "</tr>";
	            			})
	            		}else{
	            			html = "<tr>";
	            				html += "<td>";
	            					html += "No blog found";
	            				html += "</td>";
	            			html += "</tr>";
	            		}
	            		jQuery('.snippet_blog_tbl tbody').html(html);

						jQuery(".snippet_info_tbl .name").html(json['data']['title']);
						jQuery(".snippet_info_tbl .cname").html(json['data']['category']);
						jQuery(".snippet_info_tbl .scname").html(json['data']['subcategory']);
						jQuery(".snippet_info_tbl .site_keyword").html(json['data']['site_keyword']);
						jQuery(".snippet_info_tbl .site_description").html(json['data']['site_description']);
						jQuery(".snippet_info_tbl .added_on").html(json['data']['add_on']);

						jQuery(".snippet_like_tbl .like").html(json['data']['like']);
						jQuery(".snippet_like_tbl .dislike").html(json['data']['dislike']);

	            		jQuery(".side_snippet_info_div").addClass("active");
	            	}
	            }
	        })
		});
		jQuery(document).delegate(".side_review_div .paginate_btns","click",function(e){
			e.preventDefault();
		    $this = jQuery(this);
		    jQuery.ajax({
	             url:'https://crmentries.com/snippet_manager/?project=wordpress&api=get_snippet_reviews&id='+$this.data("id")+'&page='+$this.data("page"),
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            type:"post",
	            dataType:"json",
	            success:function(json){
	            	if(json['data']){
	            		jQuery('.side_review_div .paginate_btns').removeClass("disabled");
	            		data = json['data']['review'];
					    
				    	html = '';

	    				jQuery.each(data,function(ii,jj){
							/*html += '<tr>';
								html += '<td style="vertical-align: middle;">'+jj['name']+'</td>';
								html += '<td style="vertical-align: middle;">'+jj['description']+'</td>';
								html += '<td style="vertical-align: middle;">'+jj['review']+'</td>';
							html += '</tr>';*/
							html += "<div>";
								checked1 = '';
								checked2 = '';
								checked3 = '';
								checked4 = '';
								checked5 = '';
								if(jj['review'] >= 1){
									checked1 = "checked";
								}if(jj['review'] >= 2){
									checked2 = "checked";
								}if(jj['review'] >= 3){
									checked3 = "checked";
								}if(jj['review'] >= 4){
									checked4 = "checked";
								}if(jj['review'] >= 5){
									checked5 = "checked";
								}
								html += '<h3 style="display: inline-block;float: left;margin: 13px 8px;">'+jj['name']+'</h3><p style="float: left;margin: 1em 0;"><span class="fa fa-star '+checked1+'"></span><span class="fa fa-star '+checked2+'"></span><span class="fa fa-star '+checked3+'"></span><span class="fa fa-star '+checked4+'"></span><span class="fa fa-star '+checked5+'"></p>';
								html += '<p style="clear:both;margin: 8px;">'+jj['description']+'</p>';
							html += "</div><hr/>";
						})
						c_page = $this.data("page");
				    	jQuery(".review_data_div").html(html);
				    	jQuery(".side_review_div .current-pages").html(c_page);
						if($this.hasClass("next-page")){
							if((c_page + 1) > json['data']['total'] ){
								$this.addClass("disabled");
							}
							jQuery(".side_review_div .next-page").data("page",c_page + 1);
							jQuery(".side_review_div .prev-page").data("page",c_page - 1);
						}else{
							if((c_page - 1) <= 0 ){
								$this.addClass("disabled");
							}
							jQuery(".side_review_div .next-page").data("page",c_page + 1);
							jQuery(".side_review_div .prev-page").data("page",c_page - 1);
						}
	            	}
	                //jQuery(".side_review_div").addClass("active");
	            }
	        })
		});
		jQuery(document).delegate(".dashicons-thumbs-up","click",function(e){
			like = 1;
			if(jQuery(this).hasClass("active")){
				like = 0;
			}
			$this = jQuery(this);
			jQuery(".dashicons-thumbs-down[data-id='"+$this.data("id")+"']").removeClass("active");
			jQuery.ajax({
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=snippet_like',
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            type:"post",
	            dataType:"json",
	            data:{
	            	id:$this.data("id"),
	            	like:like,
	            	site:"<?php echo $_SERVER['SERVER_NAME']; ?>",
	            },
	            success:function(json){
	            	if(json['success']){
		            	$this.find("span").html("("+json['snippet_like']+")");
						jQuery(".dashicons-thumbs-down[data-id='"+$this.data("id")+"'] span").html("("+json['snippet_unlike']+")");
	            	}
	            	$this.toggleClass("active");
	            }
	        });
		});
		jQuery(document).delegate(".dashicons-thumbs-down","click",function(e){
			like = 1;
			if(jQuery(this).hasClass("active")){
				like = 0;
			}
			$this = jQuery(this);
			jQuery(".dashicons-thumbs-up[data-id='"+$this.data("id")+"']").removeClass("active");

			jQuery.ajax({
	            url:'https://crmentries.com/snippet_manager/?project=wordpress&api=snippet_unlike',
	            headers: {
					"authorization": "Token token=c25pcHBldF9tYW5hZ2VyL3NuaXBwZXRfbWFuYWdlcg==",
				},
	            type:"post",
	            dataType:"json",
	            data:{
	            	id:$this.data("id"),
	            	dislike:like,
	            	site:"<?php echo $_SERVER['SERVER_NAME']; ?>",
	            },
	            success:function(json){
	            	if(json['success']){
		            	jQuery(".dashicons-thumbs-up[data-id='"+$this.data("id")+"'] span").html("("+json['snippet_like']+")");
						$this.find("span").html("("+json['snippet_unlike']+")");
	            	}
	            	$this.toggleClass("active");
	            }
	        });
		});
		
		
		jQuery(".close_side_div").click(function(){
			jQuery(".side_div").removeClass("active");
			jQuery(".side_review_div").removeClass("active");
			jQuery(".side_snippet_info_div").removeClass("active");
		})
	})
</script>