<?php
	require('../database/database.php');
	require('../database/query.php');

	$userId = $_POST['userId'];
	$userPassword = $_POST['userPassword'];

	$userInfo = getUser($userId, $userPassword);
	if ($userInfo->num_rows > 0) {
		session_start();
		while($row = mysqli_fetch_row($userInfo)) {
			$_SESSION['userId'] = $row[0];
			$_SESSION['userFirstName'] = $row[1];
			$_SESSION['userLastName'] = $row[2];
			$_SESSION['userEmail'] = $row[3];
			$_SESSION['userType'] = $row[4];
		}
		echo "true";
	}
	else {
		echo "false";
	}

?>