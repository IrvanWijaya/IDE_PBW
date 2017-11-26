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
		<?php $myCourses = false ?>
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
				<h1 class = "w3-panel w3-gray">COURSE OVERVIEW</h1>

				<?php 
					include("../../phpScript/courses.php");
					while($row = $result->fetch_array())
					{
						$_SESSION['courseCode'] = $row['code'];
						echo 	"<div class = 'w3-display-container w3-panel w3-card-4 coursesList'>
									<a href = 'course.php?id=" . $row['id'] . "&courseTitle=" . $row['course']. "' class= 'w3-display-left noTextDecoration'>" . $row['code']. "/" . $row['course']."</a>
								</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>