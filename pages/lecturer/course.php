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
					$i;
					for($i = 1; $i <= 4; $i++)
					{
						echo 	"<div id ='$i'class = 'w3-display-container w3-panel w3-card-4 topicList'>
									<i class = 'fa fa-newspaper-o'></i><span> Topic ". $i . "</span></br> 
									<a href='#'>" . $row['title']."</a>";
								
								$temp = $row['topic'];

								while($row = $result->fetch_array()){
									if($row['topic'] != $temp){
										break;
									}
									echo "<a href='#'>" . $row['title'] . "</a>";
								} ?>

								<button 
									class="w3-btn w3-gray w3-opacity-min btnAddActivity" 
									onclick="document.getElementById('addActModal').style.display='block'">Add Activity</button>
						<?php echo    "</div>";
					}
				?>
			</div>

			<div id="addActModal" class="w3-modal " style="color:black;">
				<div class="w3-modal-content w3-display-middle modalContent">
					<a href="#" onclick="document.getElementById('addActModal').style.display='none'" 
							class="w3-button w3-display-topright modalBtnClose">&times;</a>
					<div class="w3-container">
						<h2>Select Activity</h2>
					</div>

					<form class="w3-container formInput" method="POST" action="addingActivity.php?topic=">
						<p>
						  	<input class="w3-radio" type="radio" name="addAct" value="Assignment" checked>
  							<i class="fa fa-file-text-o"></i> <label>Assignment</label></p>
						<p>
						  	<input class="w3-radio" type="radio" name="addAct" value="File" >
  							<i class="fa fa-file-o"></i> <label>File</label></p>
						<input type="submit" class="w3-btn w3-black" value = "Add" name="submit">
					</form>
				</div>
			</div>

		</div>

		<script>
			function addActivity(){
				$("addActModal").;
			}
		</script>
	</body>
</html>