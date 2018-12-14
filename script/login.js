function showpass(e, field) {
				if(document.getElementById(field).type == "text") {
					e.className = "fa fa-fw fa-eye fa-eye-slash field-icon";
					document.getElementById(field).type="password";
				} else {
					e.className = "fa fa-fw fa-eye field-icon";
					document.getElementById(field).type="text";
				}
			}
			function validatetextbox(){
				var pasval = document.getElementById('password').value;
				var repasreval = document.getElementById('password2').value;
				if (pasval != repasreval) {
					document.getElementById('subbut').disabled = true;
					$("#subbut").css("background", "#BABABA");
					$("#password2").css("border", "2px solid red");
				} else {
					document.getElementById('subbut').disabled = false;
					$("#subbut").css("background", "#EF3B3A");
					$("#password2").css("border", "");
				}
			}
			function validateEmail(email) {
				var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(String(email).toLowerCase());
			}
			function validate(e) {
				var email = e.value;
				if (validateEmail(email)) {
					document.getElementById('subbut').disabled = false;
					$("#subbut").css("background", "#EF3B3A");
					$("#email").css("border", "");
				} else {
					document.getElementById('subbut').disabled = true;
					$("#subbut").css("background", "#BABABA");
					$("#email").css("border", "2px solid red");
				}
				return false;
			}