<?php session_start(); ?>
<html>
<head>
	<title>Alice Cleaning Management</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script src="../js/common/jquery-3.3.1.js" ></script>
	<?php 
	require('../database/database.php');
	require('../database/query.php'); 
	$pageNum = 0;
	?>

	<script>
		
	</script>
</head>
<body style="margin: 0;">
	<div class="topBackground">
		<?php require('./top.php'); ?>
	</div>
	<div style="clear: both;">
		<div class="menuBackground">
			<?php require('./menu.php'); ?>
		</div>
		<div id="requestListArea" class="contentBackground">
			<table class="gridtable">
				<?php
		         
				$propertyList = getPropertyList($pageNum, 20);
				if ($propertyList->num_rows > 0) {
					$num = 0;
		            while($board = $propertyList->fetch_array())
		            {
		        ?>
				      <tbody>
				        <tr>
				          <td width="50" class="center"><?php echo ++$num; ?></td>
				          <td width="350"><img src="<?php echo $board['pictureThumbUrl']?>" width="350px"/></td>
				          <td width="300" class="center">
				          	<table class="gridtable internal">
				          		<tr>
				          			<td><?php echo $board['address']?></td>
				          		</tr>
				          		<tr>
				          			<td>Bedroom: <?php echo $board['bedRoomNumber']?></td>
				          		</tr>
				          		<tr>
				          			<td>Bathroom: <?php echo $board['bathRoomNumber']?></td>
				          		</tr>
				          		<tr>
				          			<td>Price: <?php echo $board['price']?></td>
				          		</tr>
				          	</table>
				          </td>
				        </tr>
				      </tbody>
				<?php 
					}
				  } 
				  ?>
			</table>
		</div>
	</div>
</body>
</html>


