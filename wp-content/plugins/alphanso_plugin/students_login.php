<?php
	ob_start();
	function students_login(){
		$str = '<p><h2>Student Login</h2></p>';
		$str .= '<form method="post" id="student_login_frm">';
		$str .= '<input type="text" name="username" class="username" id="username">';
		$str .= '<input type="password" name="password" class="password" id="password">';
		$str .= '<input type="button" name="login" value="Login" onclick="validatestudentlogin()">';
		$str .= '</form>';
		echo $str;
		
		if(isset($_POST['login'])){
			global $wpdb;
			$username = $_POST['username'];
			$pwd = $_POST['password'];
									
			$table_name = $wpdb->prefix . 'students';
			$user_count = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE username = '$username' AND password = $pwd");
			
			if ($user_count != 0) {
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $pwd;
				header("location:student_profile");
			} else {
				header("location:students_login?message=Incorrect login id or password");
			}
		}
	}

	add_shortcode('short_student_login', 'students_login');
?>