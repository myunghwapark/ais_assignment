<script>
	$(document).ready(function(){
		$("#menuCompany1").on("click", function() {
			$("#menuCompany2").css("background-color", "#585858");
			$(this).css("background-color", "#fc8369");
			$('#mainPage').load('./company_request_list.php'); 
		});

		$("#menuCompany2").on("click", function() {
			$("#menuCompany1").css("background-color", "#585858");
			$(this).css("background-color", "#fc8369");
			$('#mainPage').load('./company_list.php'); 
		});
	});
</script>

<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<p style="text-align: center;"><img src="../images/alice_logo.png" style="width:150px;display:block;margin-left:auto;margin-right:auto;"></p>
<nav class="cbp-spmenu cbp-spmenu-vertical" id="cbp-spmenu-s1">
	<h3>Property</h3>
	<a id="menuCompany1" href="./property_list.php">Property List</a>
</nav>

