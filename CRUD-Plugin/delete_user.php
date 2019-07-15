<?php include('../../../wp-config.php'); ?>
<?php 
$id = $_GET['id'];
//echo $id;



$table = 'custom_user_registration';
$delete_user = $wpdb->delete( $table, array( 'id' => $id ) );
if(is_wp_error($delete_user)){
	echo "<p style='color:red;'>Failed to delete data</p>";

}
else{

	$path = plugins_url();
	wp_redirect($path.'/CRUD-Plugin/alluser.php');
	//echo "User Deleted Successfully";
}

?>