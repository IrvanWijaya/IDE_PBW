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
					//buat topic & cancel
					$_SESSION['courseID'] = $_GET['id'];
					//bwt cancel di addingActivity & gagal upload
					$_SESSION['courseCode'] = $_GET['code'];
					$_SESSION['courseTitle'] = $_GET['courseTitle'];
					
					include("../../phpScript/topics.php");
					while($row)
					{
						$temp = $row['topic'];
						echo 	"<div class = 'w3-display-container w3-panel w3-card-4 topicList marginRight10'>
									<i class = 'fa fa-newspaper-o'></i><span> Topic $temp</span></br>";
								
								while($row = $result->fetch_array()){
									if($row['topic'] != $temp){
										break;
									}
									
									if($row['ID_AT'] == 2){
										$fileDir = "../" . $row['fileDir'];
										echo "<a href='$fileDir' download>File " . $row['title'] . "</a>";
									}
									else{
										echo "<a href='../phpScript/submission.php?id=". $row['ID_A'] ."'>
												Assignment " . $row['title'] . 
											"</a>";
									}
								} ?>

								<button 
									<?php echo "id = $temp"?>
									class="w3-btn w3-gray w3-opacity-min btnAddActivity"
								>Add Activity</button>
						<?php echo    "</div>";
					}
				?>
			</div>

			<div id="addActModal" class="w3-modal " style="color:black;">
				<div class="w3-modal-content w3-display-middle modalContent">
					<a href="#" onclick="closeModal()" class="w3-button w3-display-topright modalBtnClose">&times;</a>
					<div class="w3-container">
						<h2>Select Activity</h2>
					</div>

					<form id="addActForm" class="w3-container formInput" method="GET" action="addingActivity.php">
						<p>
						  	<input class="w3-radio" type="radio" name="typeAct" value="1">
  							<i class="fa fa-file-text-o"></i> <label>Assignment</label></p>
						<p>
						  	<input class="w3-radio" type="radio" name="typeAct" value="2" >
  							<i class="fa fa-file-o"></i> <label>File</label></p>
						    <input type="hidden" class="id" name="id" />
						    <input type="hidden" class="topic" name="topic" />
						<input id="btnSubmit" type="button" class="w3-btn w3-black" value="Add">
					</form>
				</div>
			</div>

		</div>

		<script>
			var topic;
			var type;
			var id;//Pindahin ke PHP

			var getUrlParameter = function getUrlParameter(sParam) {
				var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					sURLVariables = sPageURL.split('&'),
					sParameterName,
					i;

				for (i = 0; i < sURLVariables.length; i++) {
					sParameterName = sURLVariables[i].split('=');

					if (sParameterName[0] === sParam) {
						return sParameterName[1] === undefined ? true : sParameterName[1];
					}
				}
			};

			function closeModal(){
				$('#addActModal').css("display","none");
			}
			
			$(document).ready(function() {
				id = getUrlParameter('id');

				$('button.btnAddActivity').click(function() { 
					topic = $(this).attr('id');
					$('#addActModal').css("display","block");
				});

				$('#addActForm input').on('change', function() {
					type = $('input[name=typeAct]:checked', '#addActForm').val(); 
				});
				
				$('#btnSubmit').click(function(){
					$("input.id").val(id);
					$("input.topic").val(topic);
					$('#addActForm').submit();
				});
			});	
		</script>
	</body>
</html>