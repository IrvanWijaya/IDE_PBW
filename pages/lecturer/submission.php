<!-- include connection -->
<?php 
	include("../../phpScript/connection.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>IDE</title>
		<!-- include style -->
		<?php
			include("../../layout/style.php");
		?>
	</head>
	
	<body>
		<!-- include header -->
		<?php 
			include("../../layout/header.php");
		?>
		<div class="w3-main">
			<!-- include sidebar -->
			<?php 
				include("../../layout/sidebar.php");
			?>
			<div style="margin-left:25%">

			<div class="w3-container overview">
				<h1 class = "w3-panel w3-gray">Submission</h1>

				<?php
					$query = "SELECT * FROM activities WHERE ID_A = '$_GET[id]'";

					$result = $conn->query($query);
					$row = $result->fetch_array();

					echo "<h2>$row[title]</h2><br>
							<h3>Submission status</h3><br>
							<table>
								<tr>
									<td>Start date</td>
									<td>$row[dateOpen]</td>
								</tr>
								<tr>
									<td>Due date</td>
									<td>$row[dateClose]</td>
								</tr>
								<tr>
									<td>Total Submission</td>
									<td>$row[submissions]</td>
								</tr>
							</table>";
				?>

				<a href="../../phpScript/zipSubmission.php" type="submit" name="submit" class="w3-btn w3-black">Download All Submission</a>
			</div>
		</div>
	</body>
</html>