<?php
	function homecontent(){
		$str = '<p><h2>Announcement</h2></p>';
		$str .= '<p>In line with the government’s Personal Data Protection Act and in order to protect students’ privacy on the internet, personal information will not be collected via the SSEF online portal from SSEF 2017. Instead, it will be collected directly through the respective Science HODs/Teacher ICs of each school. More information will be sent to schools nearer the date of SSEF registration.</p>';
		
		echo $str;
	}

	add_shortcode('short_home', 'homecontent');
?>
