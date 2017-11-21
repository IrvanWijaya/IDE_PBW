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
				$query = "SELECT Courses.code, Courses.course as course, Courses.ID_C as id
							FROM Courses JOIN Enrollments
							ON Courses.ID_C = Enrollments.ID_C
							WHERE $_SESSION[ID_U] = Enrollments.ID_U";
				$result = $conn->query($query);
			?>
			<div style="margin-left:25%">

			<div class="w3-container overview">
				<h1 class = "w3-panel w3-gray">COURSE OVERVIEW</h1>

				<?php 
					while($row = $result->fetch_assoc())
					{
						echo 	"<div class = 'w3-display-container w3-panel w3-card-4 coursesList'>
									<a href = '' class= 'w3-display-left noTextDecoration'>" . $row['code']. "/" . $row['course']."</a>
								</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>