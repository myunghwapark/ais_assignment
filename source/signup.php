<?php
	require('../database/database.php');
	require('../database/query.php');

	$userId = $_POST['userId'];
	$userPassword = $_POST['userPassword'];
	$userFirstName = $_POST['userFirstName'];
	$userLastName = $_POST['userLastName'];
	$email = $_POST['email'];
	$userType = $_POST['userType'];

	$result = registerUser($userId, $userPassword, $userFirstName, $userLastName, $email, $userType);
	
	if ($result == 1) {
		echo "true";
	}
	else {
		echo "false";
	}

?>