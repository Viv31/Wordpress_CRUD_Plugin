<?php include('../../../wp-config.php'); 
$id = $_POST['id'];
/*echo $id;*/

if(isset($_POST['update_plugin_data'])){
	//echo "Hello";
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$user_email = $_POST['user_email'];

	/*echo $first_name;
	echo "<br>";
	echo $last_name;
	echo "<br>";
	echo $user_email;
	die;*/

	if($first_name =='' || $last_name =='' || $user_email ==''){

		echo "<p style='color:red;'>All fields are required</p>";
	}
	else{
		$updataData = $wpdb->update('custom_user_registration',
		array(
			'id'=>$id,
			'first_name'=>$first_name,
			'last_name'=>$last_name,
			'user_email'=>$user_email

		),array('id'=>$id));

		if(is_wp_error($updataData)){

			echo "<p style='color:red;'>Failed to Update</p>";

		} 
		else{
			$path = plugins_url();
				wp_redirect($path.'/CRUD-Plugin/alluser.php');
			//echo "<p style='color:green;'>Update Successful</p>";

		}


	}

	
}



?>