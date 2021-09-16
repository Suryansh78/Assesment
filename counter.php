<?php 

//Plugin Name:counter page plugin
//Plugin URI:test.com
//Description: A simple wordpress plugin
//Author:Suryansh Mishra
//version:1.0


register_activation_hook(__FILE__,'counter_active');
register_deactivation_hook(__FILE__,'counter_deactive');

function counter_active(){
	global $wpdb;
	global $table_prefix;
	$table=$table_prefix.'counter_table';
	$sql="CREATE TABLE $table (
	  `count` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;
	";
	$wpdb->query($sql);
}
function counter_deactive(){
	global $wpdb;
	global $table_prefix;
	$table=$table_prefix.'counter_table';
	$sql="DROP TABLE $table";
	$wpdb->query($sql);
	}

add_action('admin_menu','counter_menu');

function counter_menu(){
	add_menu_page('Counter', 'Counter',8,__FILE__,'counter_list');

}
function counter_list(){
	//echo "Welcome";
	include('counter_list.php');
}
add_shortcode('counter_shortcode','counter_list');

?>