<?php 
/**
* Plugin name: Complete Crud Operations
* Plugin URI:
* Description:A plugin for CRUD (Create,Read,Update,Delete) operations it creates Table in Database Automatically.  It creates page called Crud automatically.
* version:1.0
* Author:Vaibhav Gangrade
* Author URI:
*/

include('inc/plugin_header.php');

/* 
=================================================================================

	This Function is used for creating a custom page on plugin activation 

=================================================================================
*/



function create_custom_page_in_admin_panel_onactive(){

add_option('Custom Crud','Plugin-Slug');

$create_fields = array(
	'post_title'=>wp_strip_all_tags('CrudPage'),
	'post_content'=>'[CRUD_Register_shortcode]',
	'post_status'=>'publish',
	'post_author'=>1,
	'post_type'=>'page'



);
wp_insert_post($create_fields);

}
register_activation_hook(__FILE__,'create_custom_page_in_admin_panel_onactive');

/* 
=================================================================================

			End of Custom page and shortcode on activation  

=================================================================================
*/






/* 
=================================================================================
			 Now we are creating CPT for admin sidebar  
=================================================================================

 */

function create_custom_post_type_for_user_registration(){
	register_post_type('CRUD Userlist',
		array(
			'labels'=>array(
				'name'=>__('User_List'),
				'Singular_name'=>__('User_List')

			),
			'Supports'=>array('title','editor','thumbnail'),
			'public'=>true,
			'has_archive'=>true,
			'rewrite'=>array('slug'=>'User_List')
		));
}
add_action('init','create_custom_post_type_for_user_registration');


/* 
=================================================================================
								End of CPT
=================================================================================

 */

/*
=================================================================================

				Database table Creation on Plugin Activation Starts
=================================================================================
*/

	global $wpdb;
	global $table_name;
	$table_name ='custom_user_registration';

	$charset_collate = $wpdb->get_charset_collate();

	$sql = "CREATE TABLE IF NOT EXISTS $table_name(
  		id mediumint(11) NOT NULL AUTO_INCREMENT,
  		first_name varchar(100) NOT NULL,
  		last_name varchar(100) NOT NULL,
  		user_email varchar(100) NOT NULL,
 		PRIMARY KEY  (id)
) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );

/*
=================================================================================

				Database table Creation on Plugin Activation End
=================================================================================
*/


/*
================================================================================
Main Function of Plugin which contains Registration form Starts here
================================================================================
*/

function crudOperationPluginFunction(){

 global $wpdb;
	//Now we will create a form for inserting data 

//echo plugins_url();
//die;

	?>
	<style type="text/css">
		body{

			/*background-color: #00000061;;*/
			background-image: url('http://localhost/Wordpress/custom_plugin_development/wp-content/plugins/CRUD-Plugin/img/bg.jpg');

		}
		
		 

	</style>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<div class="container mycontent">
		
		
		
		<a href="<?php echo plugins_url();?>/CRUD-Plugin/alluser.php"><button class="btn btn-primary pull-right">View All User</button></a>
		<br><br>

		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="jumbotron">
				<h4 class="text-center">Regsitration Form</h4>
				<form action="<?php echo plugins_url();?>/CRUD-Plugin/plugin_user_register.php" method="POST" onsubmit="return FormValidationForReg();">
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Insert First Name">
						<div class="popup_error" id="first_name_error_msg"></div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" name="last_name" id="last_name" placeholder="Insert Last Name" class="form-control">
						<div class="popup_error" id="last_name_error_msg"></div>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="user_email" id="user_email" placeholder="Insert email" class="form-control">
						<div class="popup_error" id="email_error_msg"></div>
					</div>
					<input type="submit" name="insert_plugin_data" class="btn btn-primary">

				</form>
			</div>
			

		</div>
		<div class="col-md-1"></div>
		
	
		
</div><!--End of Container-->
<?php include('inc/plugin_footer.php');?>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->


<?php

}




/*
================================================================================
Main Function of Plugin which contains Registration form Ends here
================================================================================
*/

/*
================================================================================

In this section we will create a function for Shortcode and in this function we will call our main plugin function which contains form 

================================================================================
*/

function crud_operation_shortcode_function(){

	crudOperationPluginFunction(); //calling our main plugin function 

	 //ob_start();

	//  return ob_get_clean();




}

add_shortcode('CRUD_Register_shortcode','crud_operation_shortcode_function');






/*
================================================================================
						End of Shortcode Function
================================================================================
*/

?>
<?php
register_deactivation_hook( __FILE__, 'my_plugin_remove_database' );
function my_plugin_remove_database() {
	$page = get_page_by_path('CrudPage');
    wp_delete_post($page->ID);
     global $wpdb;
     $drop_table_name ='custom_user_registration';
     $delete_table = "DROP TABLE IF EXISTS $drop_table_name";
     //echo  $delete_table; die;
     $wpdb->query($delete_table);
     delete_option("my_plugin_db_version");
}  

 ?>



