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

                <form action="../../phpScript/upload.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                    <input type="hidden" name="code" value="<?php echo $_SESSION['courseCode']?>" />                    

                    <?php
                        $query = "SELECT * FROM activities WHERE ID_A = '$_GET[id]'";

                        $result = $conn->query($query);
                        $row = $result->fetch_array();

                        echo "<h2>$row[title]</h2><br><br>
                                <h3>Submission status</h3><br>
                                <table>
                                    <tr>
                                        <td>Due date</td>
                                        <td>$row[dateClose]</td>
                                    </tr>
                                </table>";
                    ?>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Add Submission" name="submit">
                </form>
            </div>
	    </div>
	</body>
</html>