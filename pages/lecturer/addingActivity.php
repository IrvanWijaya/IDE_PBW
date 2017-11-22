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

                
                <fieldset class = "w3-margin-bottom">
                <legend><button onclick= "myFunction('General')" class= "w3-button w3-black">General</button></legend>
                    <form class= "addActForm">
                    <div id="General" class="w3-show marginRight">
                        <div class="w3-display-container">
                            <div class="w3-quarter w3-display-container" style="height: 40px">
                                <label class="w3-display-middle w3-text-red">Name *</label> 
                            </div>
                            <div class="w3-rest">
                                <input type="text" class="w3-input w3-border">
                            </div>
                        </div>
                        <div class="w3-display-container">
                            <div class="w3-quarter w3-display-container" style="height: 40px">
                                <label class="w3-display-middle">Description</label> 
                            </div>
                            <div class="w3-rest">
                                <textarea  class="w3-input w3-border" rows="4" cols="50" name="comment" form="usrform">Enter text here...</textarea>
                            </div>
                        </div>
                    </div>
                    </form>
                </fieldset>

            
                <fieldset class = "w3-margin-bottom">
                <legend><button onclick= "myFunction('Availability')" class= "w3-button w3-black">Availability</button></legend>
                    <div id="Availability" class="w3-show marginRight">
                        <div class="w3-display-container">
                            <div class="w3-quarter w3-display-container" style="height: 40px">
                                <label class="w3-display-middle">Allow subsmissions from</label> 
                            </div>
                            <div class="w3-rest">
                                <input type="text" class="w3-input w3-border">
                            </div>
                        </div>
                        <div class="w3-display-container">
                            <div class="w3-quarter w3-display-container" style="height: 40px">
                                <label class="w3-display-middle">Dude date</label> 
                            </div>
                            <div class="w3-rest">
                                <textarea  class="w3-input w3-border" rows="4" cols="50" name="comment" form="usrform">Enter text here...</textarea>
                            </div>
                        </div>
                    </div>
                </fieldset>
     
                <fieldset class = "w3-margin-bottom">
                <legend><button onclick= "myFunction('Content')" class= "w3-button w3-black">Content</button></legend>
                    <div id="Content" class="w3-show marginRight">
                        <div class="w3-display-container">
                            <div class="w3-quarter w3-display-container" style="height: 40px">
                                <label class="w3-display-middle">Select files</label> 
                            </div>
                            <div class="w3-rest">
                                <input type="text" class="w3-input w3-border">
                            </div>
                        </div>
                    </div>
                </fieldset>
			</div>
		</div>

        <script>
            function myFunction(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else { 
                    x.className = x.className.replace(" w3-hide", "");
                }
            }
        </script>
	</body>
</html>