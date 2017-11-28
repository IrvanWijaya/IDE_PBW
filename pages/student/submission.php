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
				<?php
					$query = "SELECT * FROM activities
							JOIN courses 
							ON activities.ID_C = courses.ID_C  
							WHERE ID_A = '$_GET[id]'";

					$result = $conn->query($query);
					$row = $result->fetch_array();?>

				<h1 class = "w3-panel w3-gray">Submission <?php echo $row['code']."/Topic ".$row['topic']; ?></h1>

                <form action="../../phpScript/upload.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
					<input type="hidden" name="dir" value="<?php echo $_GET['dir'] ?>" />
                    <input type="hidden" name="code" value="<?php echo $_SESSION['courseCode']?>" />                    

                    <?php
						echo "<h2>$row[title]</h2><br>
								<a href='$_GET[dir]' download>Assignment File Here</a>
                                <h3>Submission status</h3><br>
                                <div class= 'w3-row'>
									<table class='w3-col s6 w3-table-all w3-card-4 w3-hoverable submissionTable marginB20'>
										<tr>
											<th>Start date</th>
											<td>$row[dateOpen]</td>
										</tr>
										<tr>
											<th>Due date</th>
											<td>$row[dateClose]</td>
										</tr>
										<tr>
											<th>Total Submission</th>
											<td>$row[submissions]</td>
										</tr>
									</table>
								</div>" ;
                    ?>
					<input type="hidden" name="submissions" 
							value="<?php 
								if($row['submissions']){
									echo $row['submissions'];
								}else{
									echo '0';
								} ?>" 
					/>

                    <input type="file" name="fileToUpload" id="fileToUpload" >
                    <input type="submit" value="Add Submission" name="submit" class="w3-btn w3-black">
                </form>
            </div>
	    </div>
	</body>
</html>