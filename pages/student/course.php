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
				<h1 class = "w3-panel w3-gray"><?php echo $_GET['courseTitle']?></h1>

				<?php 
					$_SESSION['courseID'] = $_GET['id'];
					
					include("../../phpScript/topics.php");
					 while($row)
					{
						echo 	"<div class = 'w3-display-container w3-panel w3-card-4 topicList'>
									<i class = 'fa fa-newspaper-o'></i><span> Topic ". $row['topic'] . "</span></br> 
									<a href='#'>" . $row['title']."</a>";
								
								$temp = $row['topic'];

								while($row = $result->fetch_array()){
									if($row['topic'] != $temp){
										break;
									}
									echo "<a href='#'>" . $row['title'] . "</a>";
								}

						echo    "</div>";
					}
				?>
			</div>
		</div>
	</body>
</html>