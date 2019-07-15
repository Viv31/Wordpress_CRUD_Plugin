<?php 
include('../../../wp-config.php');
//used for including inbuilt query function 


if(isset($_POST['insert_plugin_data'])){
	//echo "Hello world";



$first_name =	$_POST['first_name'];
$last_name = $_POST['last_name'];
$user_email = $_POST['user_email'];

/*
echo $first_name;
echo $last_name;
echo $user_email;
die;*/

if(!empty($first_name) && !empty($last_name) && !empty($user_email)){


		global $wpdb;
 		$sql = "SELECT first_name FROM `custom_user_registration` WHERE user_email='".$user_email."'";
		$exist_user_data = $wpdb->get_results($sql);

		if($exist_user_data){
			
			echo "<p style='color:red'>Email exist</p>";

		}
		else{
				global $wpdb;
	$insert_data =$wpdb->insert('custom_user_registration',
		array(
			'first_name'=>$first_name,
			'last_name'=>$last_name, 
			'user_email'=>$user_email,
			));
			if(is_wp_error($insert_data)){

				echo "<p style='color:red'>Failed to insert data</p>";
			}
			else{
				//echo "<p style='color:green'>Data inserted Successfully</p>";
				$path = plugins_url();
				wp_redirect($path.'/CRUD-Plugin/alluser.php');

			}

}




		}
		else
{
	echo "<p style='color:red'>All fields are required</p>";
}

}


?>
