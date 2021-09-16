
<!-- Use shortcode : [counter_shortcode];
 -->
<?php 

global $wpdb;
global $table_prefix;
$table=$table_prefix.'counter_table';
$sql="select * from $table";
$results=$wpdb->get_results($sql);

$count=1;


$userid=1;

//$wpdb->query($wpdb->prepare("UPDATE $table SET count='$count' WHERE id=$userid"));

foreach ($results as $key => $value) {

$val = $value->count;
?>


<h1>Page Count = <?php echo $value->count; }  ?></h1>
<?php


if ($val==0) {

	//$wpdb->query($wpdb->prepare("UPDATE $table SET count='1' "));
	$wpdb->query($wpdb->prepare("insert into $table (count) Values (1) "));


 }
 else{
 	++$val;
 	$wpdb->query($wpdb->prepare("UPDATE $table SET count='$val' "));
 }
	



?>