//Developer: Jonathan Musa Skosana

//Validate password
function validatePassword(input) {
	var passwordFormat = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,16}$/;

	if (passwordFormat.test(input)) {
		return true;
	} else {
		return false;
	}
}

//Validate inputs
function pregMatch(input) {
	var regExp = /^[a-zA-Z ]*$/;

	if (regExp.test(input)) {
		return true;
	} else {
		return false
	}
}

//Validation and Form Registration ajax call
function ajaxRegistration() {
	$(".error").text("");
	$('#first-name-info').removeClass("error");
	$('#last-name-info').removeClass("error");
	$('#username-info').removeClass("error");
	$('#register-password-info').removeClass("error");
	$('#confirm-password-info').removeClass("error");

	var firstName = $('#first-name').val();
	var lastName = $('#last-name').val();
	var username = $('#username').val();
	var password = $('#register-password').val();
	var confirmPassword = $('#confirm-password').val();
	var actionString = 'registration';

	if (firstName == "") {
		$('#first-name-info').addClass("error");
		$(".error").text("First Name is required");
	} else if (!pregMatch(firstName)) {
		$('#first-name-info').addClass("error");
		$(".error").text('This field can only consitst of alphabets and white space');
	} else if(lastName !== "" && !pregMatch(lastName)){		
		$('#last-name-info').addClass("error");
		$(".error").text('This field can only consitst of alphabets');
	}  else if (username == "") {
		$('#username-info').addClass("error");
		$(".error").text("Username is required");
	} else if (!pregMatch(username)) {
		$('#username-info').addClass("error");
		$(".error").text('This field can only consitst of alphabets and white space');
	} else if (password == "") {
		$('#register-password-info').addClass("error");
		$(".error").text("Password is required");
	} else if (!validatePassword(password)) {
		$('#register-password-info').addClass("error");
		$(".error").text("Password must be at least 8 Characters, 1 Capital letter, 1 Special character");
	}else if (confirmPassword == "") {
		$('#confirm-password-info').addClass("error");
		$(".error").text("Confirm password required");
	} else if (password != confirmPassword) {
		$('#confirm-password-info').addClass("error");
		$(".error").text("Your confirm password does not match.");
	} else {
		console.log('Clicked');
		$.ajax({
			url : 'ajax-login-registration.php',
			type : 'POST',
			data : {
				firstName : firstName,
				lastName : lastName,
				username : username,
				password : password,
				confirmPassword : confirmPassword,
				action : actionString
			},
			success : function(response) {
				console.log(response);
				if (response.trim() === 'Username already exists!') {
					console.log('error');
					$('#message').hide();
					$('#message').removeClass('alert alert-success col-sm-10');
					$("#message").addClass('alert alert-danger col-sm-10');
					$("#message").text(response);
					$('#message').show();
				} else {
					console.log('success');
					$('#message').hide();
					$('#message').removeClass('alert alert-danger col-sm-10');
					$("#message").addClass('alert alert-success col-sm-10');
					$("#message").text(response);
					$('#message').show();

					//empty the inputs
					$('#first-name').val('');
					$('#last-name').val('');
					$('#username').val('');
					$('#register-password').val('');
					$('#confirm-password').val('');
				}
			}

		});
	}// endif
}

////Validation and Form Useer login ajax call
function ajaxLogin() {
	$(".error").text("");
	$('#login-username-info').removeClass("error");
	$('#password-info').removeClass("error");

	var username = $('#login-username').val();
	var password = $('#login-password').val();
	var actionString = 'login';

	if (username == "") {
		$('#login-username-info').addClass("error");
		$(".error").text("Username is required");
	} else if (!pregMatch(username)) {
		$('#login-username-info').addClass("error");
		$(".error").text('This field can only consitst of alphabets and white space');
	} else if (password == "") {
		$('#password-info').addClass("error");
		$(".error").text("Password is required");
	} else {
		$.ajax({
			url : 'ajax-login-registration.php',
			type : 'POST',
			data : {
				username : username,
				password : password,
				action : actionString
			},
			success : function(response) {
				if (response.trim() == 'Wrong username or password!') {
					$('#login-message').hide();
					$('#login-message').removeClass('alert alert-success col-sm-10');
					$("#login-message").addClass('alert alert-danger col-sm-10');
					$("#login-message").text(response);
					$('#login-message').show();
				} else {
                    window.location.href = response;

					//empty inputs
					$('#login-username').val('');
					$('#login-password').val('');
				}
			}
		});
	}// endif
}