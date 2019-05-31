<html>
<head>
	<title>Auckland Property Management System</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<script src="./js/common/jquery-3.3.1.js" ></script>
	<?php require('./database/database.php'); ?>

	<script>
		$(document).ready(function(){
 			

			$("#btnLgoin").on("click", function(){
				if(!checkForm()) {
					return;
				}
				$.ajax({
					url: "./source/login.php",
					type: "post",
					data: {userId:$("#userId").val(), userPassword:$("#userPassword").val()}
				}).done(function(result) {
					if(result == "true") {
						location.href = "./source/property_list.php";
					}
					else {
						alert("Invalid login, please try again.");
					}
				});
			});
 			

			$("#btnSignUp").on("click", function(){
				location.href = "./source/signupForm.php";
			});

			$("#userPassword").keypress(function(e) {
			    if(e.which == 13) {
			        $("#btnLgoin").trigger("click");
			    }
			});
		});

		function checkForm() {
			if($("#userId").val() == null || $("#userId").val() == "") {
				alert("Please enter your ID.");
				$("#userId").focus();
				return false;
			}
			else if($("#userPassword").val() == null || $("#userPassword").val() == "") {
				alert("Please enter your password.");
				$("#userPassword").focus();
				return false;
			}
			else {
				return true;
			}
		}
	</script>
</head>
<body style="margin: 0;">
	<form method="post" action="./source/login.php">
		<div class="contentBackground" style="width:100%;text-align: center;padding-top: 20px;">
			<p class="textBlue">Auckland Property Management System</p>
			<table style="vertical-align: middle;display: inline-block;">
				<tr>
					<td class="textGray">ID</td>
					<td><input type="text" id="userId" /></td>
				</tr>
				<tr>
					<td class="textGray">Password</td>
					<td><input type="Password" id="userPassword" /></td>
				</tr>
			</table>
			<p><input type="button" value="Sign Up" id="btnSignUp" class="btnSubmit"/>&nbsp;<input type="button" value="Login" id="btnLgoin" class="btnSubmit"/></p>
		</div>
	</form>
</body>
</html>
