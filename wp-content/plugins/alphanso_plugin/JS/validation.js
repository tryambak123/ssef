function validatestudentreg()
{
	jQuery(function($){
		username = $('#username').val().trim();
		if (username == ''){
			alert('Please enter Email Id');
			$('#username').focus();
			return false;
		} else {
			var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
			if (!filter.test(username)) {
				alert('Please enter a valid Email Id');
				$('#username').focus();
				return false;
			} else {
				return true;
			}
		}
	});
}

function validatestudentlogin() {
	jQuery(function($){
		username = $('#username').val().trim();
		password = $('#password').val().trim();
			
		if (username == ''){
			alert('Please enter Email Id');
			$('#username').focus();
		} else if (password == '') {
			alert('Please enter password');
			$('#password').focus();
		} else {
			alert('username = ' + username + ' pwd = ' + password);
			$('#student_login_frm').submit();
		}
	});
}
