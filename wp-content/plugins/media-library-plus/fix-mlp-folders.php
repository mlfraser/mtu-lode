<?php

/*
Plugin Name: Fix Media Library Plus Folders
Plugin URI: http://maxgalleria.com
Description: Plugin for fixing Media Library Plus folders
Author: Max Foundry
Author URI: http://maxfoundry.com
Version: 3.1.8
Copyright 2016 Max Foundry, LLC (http://maxfoundry.com)
*/

function mlp_fix_table_menu() {
  add_menu_page('Fix Media Library Plus Folders', 'Fix Media Library Plus Folders', 'manage_options', 'fix-mlp-folders', 'fix_mlp_folders' );
  add_submenu_page('fix-mlp-folders', 'Update Folders Table', 'Update Folders Table', 'manage_options', 'update_folder_table', 'update_folder_table');
}
add_action('admin_menu', 'mlp_fix_table_menu');

function fix_mlp_folders() {
	?>

<h1>Fix Media Library Plus Folders</h1>

<p>First backup the mgmlp_folders table in your database and then click 'Update Folders Table' to fix folders with invalid parent IDs in your MLP folder database.</p>

  <?php
}

function update_folder_table() {
	
	global $wpdb;
		
	echo "<p>Starting folder table update...</p>";
	
  $upload_folder_id = get_option("mgmlp_upload_folder_id");
	
	if($upload_folder_id !== false) {
	
		$sql = "UPDATE {$wpdb->prefix}mgmlp_folders SET folder_id = REPLACE(folder_id, -1, {$upload_folder_id}) WHERE folder_id = -1;";
		//echo $sql;

		$total = $wpdb->query($sql);
		if($total > 0)
		  echo "<p>$total folders were updated.</p>";
		else
		  echo "<p>No invalid folders were found.</p>";
		
  } else {
		echo "Cound not find the ID of the uploades folder.";
	}
	
}