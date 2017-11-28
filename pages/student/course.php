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
				<h1 class = "w3-panel w3-gray marginRight10"><?php echo $_GET['courseTitle']?></h1>

				<?php 
					$_SESSION['courseID'] = $_GET['id'];
					$_SESSION['courseTitle'] = $_GET['courseTitle'];
					
					include("../../phpScript/topics.php");
					while($row)
					{
						$temp = $row['topic'];
						echo 	"<div class = 'w3-display-container w3-panel w3-card-4 topicList marginRight10'>
									<i class = 'fa fa-newspaper-o'></i><span> Topic $temp</span></br> 
									<a href='#'>" . $row['title']."</a>";

								while($row = $result->fetch_array()){
									if($row['topic'] != $temp){
										break;
									}
									$fileDir = "../";
									$queryDir = "SELECT * FROM activities WHERE title = '$row[title]'";
									$resultDir = $conn->query($queryDir);
									$rowDir = $resultDir->fetch_array();
									$fileDir .= $rowDir['fileDir'];
									echo "<a href='$fileDir' download>" . $row['title'] . "</a>";
								}

						echo    "</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>