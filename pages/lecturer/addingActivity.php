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
				<h1 class = "w3-panel w3-gray marginRight10">Adding New Assignment</h1>

                <div style="height:40px; width:100%">
                    <button id="colExAll" class="w3-right w3-button w3-black marginRight10">Collapse All</button>
                </div>
                <form id ="addActForm" class= "w3-display-container" action="../../phpScript/upload.php" method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="typeAct" value="<?php echo $_GET['typeAct'] ?>" />
                    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>" />
                    <input type="hidden" name="topic" value="<?php echo $_GET['topic'] ?>"/>
                    
                    <fieldset class = "w3-margin-bottom">
                    <legend><button id="btnGeneral" class= "colExBtn w3-button w3-black">General <i class="fa fa-sort-desc" aria-hidden="true"></i></button></legend>
                        <div id="General" class="marginRight">
                            <div class="w3-display-container marginB10">
                                <div class="w3-quarter w3-display-container" style="height: 40px">
                                    <label class="w3-display-middle w3-text-red" style="font-weight: bold">Name *</label> 
                                </div>
                                <div class="w3-rest">
                                    <input type="text" class="w3-input w3-border" name="title" required>
                                </div>
                            </div>
                            <div class="w3-display-container">
                                <div class="w3-quarter w3-display-container" style="height: 100px">
                                    <label class="w3-display-middle">Description</label> 
                                </div>
                                <div class="w3-rest">
                                    <textarea  class="w3-input w3-border" rows="4" cols="50" name="submissions" placeholder="Enter text here..."></textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    
                    <?php
                        //echo submission time 
                        if($_GET['typeAct'] == 1){
                            echo '<fieldset class = "w3-margin-bottom">
                                    <legend><button id="btnAvailability" class= "colExBtn w3-button w3-black">Availability <i class="fa fa-sort-desc" aria-hidden="true"></i></button></legend>
                                        <div id="Availability" class="marginRight">
                                            <div class="w3-display-container marginB10">
                                                <div class="w3-quarter w3-display-container" style="height: 40px">
                                                    <label class="w3-display-left">Allow subsmissions from <i class="fa fa-question-circle" aria-hidden="true"></i></label>
                                                </div>
                                                <div class="w3-rest">
                                                    <table>
                                                        <tr>
                                                            <td><input id= "startDate" type="date" class="w3-input w3-border" style="width: auto" name="dateOpen"></td>
                                                            <td><input id= "enStart" type="checkbox"> Enable</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="w3-display-container">
                                                <div class="w3-quarter w3-display-container" style="height: 40px">
                                                    <label class="w3-display-middle">Dude date <i class="fa fa-question-circle" aria-hidden="true"></i></label> 
                                                </div>
                                                <div class="w3-rest">
                                                    <table>
                                                        <tr>
                                                            <td><input id= "endDate" type="date" class="w3-input w3-border" style="width: auto" name="dateClose"></td>
                                                            <td><input id= "enEnd" type="checkbox"> Enable</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>';
                        }
                    ?>

                    <fieldset class = "w3-margin-bottom">
                    <legend><button id="btnContent" class= "colExBtn w3-button w3-black">Content <i class="fa fa-sort-desc" aria-hidden="true"></i></button></legend>
                            <div id="Content" class="marginRight">
                                <div class="w3-display-container">
                                    <div class="w3-quarter w3-display-container" style="height: 40px">
                                        <label class="w3-display-middle">Select files <i class="fa fa-question-circle" aria-hidden="true"></i></label> 
                                    </div>
                                </div>
                                <div class="w3-rest w3-display-container">
                                    <input type="file" name="fileToUpload" id="fileToUpload" style="margin-top: 5px">
                                </div> 
                            </div>
                    </fieldset>

                    <div style="height:40px;"></div>
                    <div class="w3-display-bottommiddle" style="padding-bottom:20px">
                        <input type="submit" class="w3-button w3-black w3-container padding" value="SAVE AND RETURN TO COURSE">
                        <a href="course.php?id=<?php echo $_GET['id']; ?>&courseTitle=<?php echo $_SESSION['courseTitle']; ?>"
                            class= "w3-button w3-black w3-container padding">Cancel</a>
                    </div>
                </form>
			</div>
		</div>

        <script>
            var tipeAssign = getQueryVariable("typeAct");
            var totalKebuka;
            var id;
            if(tipeAssign == 1){
                totalKebuka = 3;
                id = ["General","Availability","Content"];
            } else {
                totalKebuka = 2;
                id = ["General","Content"];
            }

            function expandOrCollapse(id) {
                var x = document.getElementById(id);
                if (x.className.indexOf("w3-hide") == -1) {
                    totalKebuka--;
                    x.className += " w3-hide";
                } else { 
                    totalKebuka++;
                    x.className = x.className.replace(" w3-hide", "");
                }

                if(totalKebuka > 0){
                    $('#colExAll').html("Collapse All");
                }else{
                    $('#colExAll').html("Expand All");
                }
            }

            function getQueryVariable(variable) {
                var query = window.location.search.substring(1);
                var vars = query.split("&");
                for (var i=0;i<vars.length;i++) {
                    var pair = vars[i].split("=");
                    if (pair[0] == variable) {
                        return pair[1];
                    }
                }
            }

            $(document).ready(function(){
                var disStartDate = !$('#enStart').is(":checked");
                var disEndDate = !$('#enEnd').is(":checked");

                $('#startDate').prop('disabled',disStartDate);
                $('#endDate').prop('disabled',disEndDate);

                $('.colExBtn').click(function(){
                    var tempID = $(this).attr('id').slice(3);
                    expandOrCollapse(tempID);
                });

                $('#colExAll').click(function(){
                    var i = 0;
                    console.log(totalKebuka);
                    if(totalKebuka == 0){
                        for(i = 0; i < id.length; i++){
                            expandOrCollapse(id[i]);
                        }
                    }else{
                        for(i = 0; i < id.length; i++){
                            if(!$('#'+id[i]).is(".w3-hide")){
                                expandOrCollapse(id[i]);
                            }
                        }                        
                    }
                });

                $('#enStart').click(function(){
                    disStartDate = !disStartDate;
                    $('#startDate').prop('disabled',disStartDate);
                });

                $('#enEnd').click(function(){
                    disEndDate = !disEndDate;
                    $('#endDate').prop('disabled',disEndDate);
                });
            });
        </script>
	</body>
</html>