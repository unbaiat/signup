<?php
include 'config.php';
include 'function.php';
dbConnect();

header('Content-type: application/json');

if $_SERVER['REQUEST_METHOD'] === 'POST' 
{
	if $_POST['email'] !== '' 
	{
			# prevent sql injection
			$email 		= mysql_real_escape_string($_POST['email']);
			# email exist or not
			if (!email_exist($email))
			{	# insert new user
				if (inser_new_user($email))
				{	# throw success status
					json_status('success');
					# throw errors
				} else { json_status('Request not complete'); }
			} else { json_status('Email already exist'); }
	} else { json_status('You must complete all the fields'); }
}
?>
