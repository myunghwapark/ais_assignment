<?php
	require('../database/database.php');
	require('../database/query.php');

	$userId = $_POST['userId'];

	$userInfo = checkUserId($userId);
	if ($userInfo->num_rows > 0) {
		echo "false";
	}
	else {
		echo "true";
	}

?>