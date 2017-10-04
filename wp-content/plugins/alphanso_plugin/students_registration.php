<?php
	ob_start();
	function students_registration(){
		$str = '<p><h2>Account Registration</h2></p>';
		$str .= '<form method="post" id="student_re_frm" name="student_re_frm" onsubmit="return validatestudentreg()">';
		$str .= '<input type="text" name="username" class="username" id="username">';
		$str .= '<input type="submit" name="register" value="Register">';
		$str .= '</form>';
		echo $str;
		
		if(isset($_POST['register'])){
			global $wpdb;
			$username = $_POST['username'];
			
			$table_name = $wpdb->prefix . 'students';
			$user_count = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name WHERE username = '$username'" );
			if ($user_count != 0) {
				$message.="Student already registered";
			} else {
				$table_name = $wpdb->prefix . 'students';
				$password = 'abc@123';
				
				$wpdb->insert(
						"$table_name", //table
						array('username' => $username, 'password' => $password), //data
						array('%s', '%s') //data format
				);

				$message.="Student Added";
			}
			header("location:for_students?message=$message");
		}
	}

	add_shortcode('short_student_register', 'students_registration');
?>