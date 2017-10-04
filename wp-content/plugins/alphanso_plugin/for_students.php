<?php
	function forstudents(){
		if(isset($_REQUEST['message']))
		{
			echo $_REQUEST['message'];
		}
		$str = '<p><h2>Register Your Project</h2></p>';
		$str .= '<p>You need the following information for your project online registration.</p>';
		$str .= '<ul>';
		$str .= '<li>Email</li>';
		$str .= '<li>School Name</li>';
		$str .= '<li>Teacher IC\'s Email</li>';
		
		$str .= '<p>NOTE: A project code will be generated upon successful registration.You will need to inform your teacher IC of your project code. In addition, your teacher IC will be collecting additional personal information from you.</p>';
		
		$str .= '<br/>Register now by clicking <a href="student-registration">here</a>.';
		$str .= '<br/>For registered users, please log in <a href="students_login">here</a> to make changes.';
		echo $str;
	}

	add_shortcode('short_forstudents', 'forstudents');
	add_filter( 'edit_post_link', '__return_false' );
?>
