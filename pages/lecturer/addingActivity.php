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
				<h1 class = "w3-panel w3-gray">Adding New Assignment</h1>

                <div style="height:40px; width:100%">
                    <button class="w3-right w3-button w3-black">Collapse All</button>
                </div>

                <form class= "addActForm">
                <fieldset>
                <legend><button class= "w3-button w3-black">General</button></legend>
                    <label class="w3-quarter">Name:</label> 
                        <div class="w3-rest">
                            <input type="text" class="w3-input w3-border">
                        </div>
                    <label class="w3-quarter">Description:</label> 
                        <div class="w3-rest">
                            <textarea  class="w3-input w3-border" rows="4" cols="50" name="comment" form="usrform">Enter text here...</textarea>
                        </div>
                </fieldset>
                </form>

                <form class= "addActForm">
                <fieldset>
                <legend><button class= "w3-button w3-black">Availability</button></legend>
                    Name: <input type="text"><br>
                    Email: <input type="text"><br>
                    Date of birth: <input type="text">
                </fieldset>
                </form>

                <form class= "addActForm">
                <fieldset>
                <legend><button class= "w3-button w3-black">Content</button></legend>
                    Name: <input type="text"><br>
                    Email: <input type="text"><br>
                    Date of birth: <input type="text">
                </fieldset>
                </form>
			</div>
		</div>
	</body>
</html>