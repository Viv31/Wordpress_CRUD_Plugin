<?php include('../../../wp-config.php'); ?>
<?php 
include('inc/plugin_header.php');
$id = $_GET['id'];
//echo $id;


global $wpdb;
 		$edit_user_data = "SELECT * FROM `custom_user_registration` WHERE id ='".$id."'";
		$data = $wpdb->get_results($edit_user_data);
		/*print_r($data);
		die;*/

		foreach ($data as $edit_data) {
			
		}


?>
<div class="container">
		
		

		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="jumbotron">
				<a href="<?php echo plugins_url();?>/CRUD-Plugin/alluser.php"><button class="btn btn-primary pull-right">Back</button></a>
				<h4 class="text-center">Updation Form</h4><hr>
				<form action="<?php echo plugins_url();?>/CRUD-Plugin/plugin_user_update_data.php" method="POST" onsubmit="return FormValidation();">
					<div class="form-group">
						<label>First Name:</label>
						<input type="text" name="first_name" id="first_name" class="form-control" placeholder="Insert First Name" value="<?php echo $edit_data->first_name; ?>">
						<div class="popup_error" id="first_name_error_msg"></div>
					</div>
					<div class="form-group">
						<label>Last Name:</label>
						<input type="text" name="last_name" id="last_name" placeholder="Insert Last Name" class="form-control" value="<?php echo $edit_data->last_name; ?>">
						<div class="popup_error" id="last_name_error_msg"></div>
					</div>
					<div class="form-group">
						<label>Email:</label>
						<input type="text" name="user_email" id="user_email" placeholder="Insert email" class="form-control" value="<?php echo $edit_data->user_email; ?>">
						<div class="popup_error" id="email_error_msg"></div>
					</div>
					<input type="hidden" name="id" value="<?php echo $edit_data->id; ?>">
					<input type="submit" name="update_plugin_data" class="btn btn-primary">

				</form>
			</div>
			

		</div>

		<?php include('inc/plugin_footer.php');?>
		<script src="js/formvalidation.js"></script>

	