function createAccount() {
	var xmlhttp = new XMLHttpRequest();
  
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			var response;
			response = xmlhttp.responseText;

			if (!response)
				return false;
			else if (response === "<p>Creating Account...</p>")
				document.getElementById('wineForm').submit();
			else {
				document.getElementById("error").innerHTML = response;
				return false;
			}
		}
	}

	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var params = 'username=' + username + '&password=' + password;

	xmlhttp.open("POST", "dbRegister.php", true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.send(params);

	return false;
};

