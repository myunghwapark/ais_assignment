<?php
	if(!isset($_SESSION['userFirstName'])) {
		echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
		exit;
	}
	$userName = $_SESSION['userFirstName'];
	
?>

<script>
	$(document).ready(function(){
 			

			$("#btnLogout").on("click", function(){

				$.ajax({
					url: "./logout.php",
					type: "post",
					data: null
				}).done(function(result) {
					if(result == "true") {
						location.href='../index.php';
					}
				});
			});
		});
</script>

<div class="textBlue" style="float:left;">Auckland Property Management System</div>
<div class="textRed" style="float:right;">
	Welcome <span id="userName"><?=$userName?></span>
	<span style="margin-left:20px;cursor:pointer;" class="textGray" id="btnLogout">LOGOUT</span>
</div>
