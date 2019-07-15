<?php include('../../../wp-config.php'); ?>
<?php include('inc/plugin_header.php'); ?>
<div class="container">


<div class="row">

			<div class="col-md-12">
	<center>	<div class="jumbotron">
   <a href="<?php echo site_url();?>/CRUD-Plugin/crudpage"><button class="btn btn-primary pull-right">Back</button></a>
			<h4>Register User List</h4><hr>

			 <table class="table">
    <thead>
      <tr>
      	<th>Sno.<?php $sno ='1'; ?></th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
<?php 
//include('../../../wp-config.php');
		global $wpdb;
 		$sql = "SELECT * FROM `custom_user_registration`";
		$data = $wpdb->get_results($sql);
		/*print_r($exist_user_data);
		die;*/

		foreach ($data as $user_data) {
			?>
			<tr>
      			<th><?php echo $sno++; ?></th>
        		<td><?php echo $user_data->first_name; ?></td>
       			<td><?php echo $user_data->last_name; ?></td>
        		<td><?php echo $user_data->user_email; ?></td>
        		<td><a href="edit_user.php?id=<?php echo $user_data->id;?>"><button class="btn btn-primary">Edit</button></a></td>
        		<td><a href="delete_user.php?id=<?php echo $user_data->id; ?>"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this');">Delete</button></a></td>
      		</tr>


			
	<?php	}

?>
 </tbody>
  </table>

		</div>
    </center>
	</div>


	</div>
</div>
<?php include('inc/plugin_footer.php'); ?>

