<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	function FormValidationForReg(){
	//alert('hello');

	var first_name = $('#first_name').val();
	var last_name = $('#last_name').val();
	var user_email = $('#user_email').val();

	/*alert(first_name);
	alert(last_name);
	alert(user_email);*/

	if(first_name ==''){
		 jQuery('#first_name_error_msg').show();
		 jQuery('#first_name_error_msg').css('color','#CC0000');
		 jQuery('#first_name_error_msg').html('First Name field can not be blank');
		 jQuery('#first_name').focus();
       jQuery('#first_name').addClass('error');
      setTimeout("$('#first_name_error_msg').fadeOut();",3000);
      return false;

	}

	if(last_name ==''){
		 jQuery('#last_name_error_msg').show();
		 jQuery('#last_name_error_msg').css('color','#CC0000');
		 jQuery('#last_name_error_msg').html('Last Name field can not be blank');
		 jQuery('#last_name').focus();
       jQuery('#last_name').addClass('error');
      setTimeout("$('#last_name_error_msg').fadeOut();",3000);
      return false;

	}

	if(user_email ==''){
		 jQuery('#email_error_msg').show();
		 jQuery('#email_error_msg').css('color','#CC0000');
		 jQuery('#email_error_msg').html('Email field can not be blank');
		 jQuery('#user_email').focus();
       jQuery('#user_email').addClass('error');
      setTimeout("$('#email_error_msg').fadeOut();",3000);
      return false;

	}


 }
</script>

</body>
</html>