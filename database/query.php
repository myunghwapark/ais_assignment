<?php

	function getUser($userId, $userPassword) {
		global $connection;
		$query = "Select userId, userFirstName, userLastName, userEmail, userType from tbuser where userId = '" .$userId ."' and userPassword = SHA1(UNHEX(SHA1('".$userPassword."')));";

		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function checkUserId($userId) {
		global $connection;
		$query = "Select userId from tbuser where userId = '" .$userId ."';";

		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}

	function registerUser($userId, $userPassword, $userFirstName, $userLastName, $email, $userType) {
		global $connection;
		$query = "Insert into tbuser(userId, userPassword, userFirstName, userLastName, userEmail, userType, createDate) values('$userId', SHA1(UNHEX(SHA1('$userPassword'))), '$userFirstName', '$userLastName', '$email', '$userType', NOW());";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return  $result;
	}

	function getPropertyList($startPageNum, $rowCount) {
		global $connection;
		$query = "Select 
			propertyId, 
			address, 
			pictureThumbUrl, 
			bedRoomNumber, 
			bathRoomNumber, 
			price
		from tbproperty LIMIT ".$startPageNum.", ".$rowCount.";";
		$result = mysqli_query($connection, $query);

		if($result == false) {
			 echo "error: " . mysqli_error($connection);
		}
		return $result;
	}


?>