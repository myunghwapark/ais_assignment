<html>
<head>
	<title>Auckland Property Management System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script src="../js/common/jquery-3.3.1.js" ></script>
	<?php 
	require('../database/database.php');
	?>

	<script>
		var checkIdYn = false;
		
		$(document).ready(function(){


			$("#btnSignUp").on("click", function(){
				if(!checkForm()) {
					return;
				}
				$.ajax({
					url: "./signup.php",
					type: "post",
					data: {userId:$("#userId").val(), userPassword:$("#userPassword").val(), userFirstName: $("#userFirstName").val(), userLastName: $("#userLastName").val(), email: $("#email").val(), userType: $("#userType").val()}
				}).done(function(result) {
					if(result == "true") {
						alert("Signed up successfully");
						location.href = "../index.php";
					}
					else {
						alert("An error occured during processing. Please, try again later.");
					}
				});
			});

			$("#btnCancel").on("click", function(){
				
				location.href = "../index.php";
				
			});

			$("#btnCheckId").on("click", function(){
				$.ajax({
					url: "./check_id.php",
					type: "post",
					data: {userId:$("#userId").val()}
				}).done(function(result) {
					if(result == "true") {
						checkIdYn = true;
						alert("You can use the ID");
					}
					else {
						checkIdYn = false;
						alert("Please, choose other ID");
					}
				});
			});

		});


		function checkForm() {
			if($("#userId").val() == null || $("#userId").val() == "") {
				alert("Please enter your ID.");
				$("#userId").focus();
				return false;
			}
			else if(checkIdYn == false) {
				alert("Please check your ID.");
				return false;
			}
			else if($("#userPassword").val() == null || $("#userPassword").val() == "") {
				alert("Please enter your password.");
				$("#userPassword").focus();
				return false;
			}
			else if($("#confirmPassword").val() == null || $("#confirmPassword").val() == "" || $("#confirmPassword").val() != $("#userPassword").val()) {
				alert("Confirm password should be same as password.");
				$("#confirmPassword").focus();
				return false;
			}
			else if($("#userFirstName").val() == null || $("#userFirstName").val() == "") {
				alert("Please enter your first name.");
				$("#userFirstName").focus();
				return false;
			}
			else if($("#userLastName").val() == null || $("#userLastName").val() == "") {
				alert("Please enter your last name.");
				$("#userLastName").focus();
				return false;
			}
			else if($("#email").val() == null || $("#email").val() == "") {
				alert("Please enter your email.");
				$("#email").focus();
				return false;
			}
			else if(verifyEmail() == false) {
				alert("Please enter validated email.");
				$("#email").focus();
				return false;
			}
			else {
				return true;
			}
		}

		verifyEmail = function() {
		  var emailVal = $("#email").val();

		  var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

		  if (emailVal.match(regExp) != null) {
		    return true;
		  }
		  else {
		    return false;
		  }
		};
	</script>
</head>
<body style="margin: 0;">
	<form method="post" action="./source/signup.php">
		<div class="contentBackground" style="width:100%;text-align: center;padding-top: 20px;">
			<p class="textBlue">Join Auckland Property Management System</p>
			<table style="vertical-align: middle;display: inline-block;">
				<tr>
					<td class="textGray">ID</td>
					<td><input type="text" id="userId" /><input type="button" value="Check ID" id="btnCheckId"></td>
				</tr>
				<tr>
					<td class="textGray">Password</td>
					<td><input type="Password" id="userPassword" /></td>
				</tr>
				<tr>
					<td class="textGray">Cinfirm Password</td>
					<td><input type="Password" id="confirmPassword" /></td>
				</tr>
				<tr>
					<td class="textGray">First Name</td>
					<td><input type="text" id="userFirstName" /></td>
				</tr>
				<tr>
					<td class="textGray">Last Name</td>
					<td><input type="text" id="userLastName" /></td>
				</tr>
				<tr>
					<td class="textGray">Type</td>
					<td>
						<select id="userType">
							<option value="o">Owner</option>
							<option value="t">Tenant</option>
						</select>
					</td>
				</tr>
				<tr>
					<td class="textGray">E-mail</td>
					<td><input type="text" id="email" /></td>
				</tr>
			</table>
			<p><input type="button" value="Cancel" id="btnCancel" class="btnSubmit"/>&nbsp;<input type="button" value="Sign Up" id="btnSignUp" class="btnSubmit"/></p>
		</div>
	</form>
</body>
</html>