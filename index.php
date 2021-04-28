
 <?php
  
       // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        $conn = mysqli_connect("localhost:3325", "root", "", "visitors");
          
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. " 
                . mysqli_connect_error());
        }
          
	if(isset($_POST['submit'])){
		
		$msg = "";
		$Name = $_REQUEST["Name"];
	    $Entry = $_REQUEST["Entry"];
		$Reason  = $_REQUEST["Reason"];
		$Visiting  = $_REQUEST["Visiting"];
		$Exittime = $_REQUEST["Exittime"];
        // Taking all 5 values from the form data(input)
       
          
        // Performing insert query execution
       
        $sql = "INSERT INTO visitorstable (Name,Entry,Reason,Visiting,Exittime) VALUES ('$Name', 
            '$Entry','$Reason','$Visiting','$Exittime')";
          
        if(mysqli_query($conn, $sql)){
            $msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Entry added successfully.</p>";
  
           
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
	}
          
        // Close connection
        mysqli_close($conn);
        ?>

<!Doctype html>
<html>

<head>
	<title>GATE ENTRY REGISTER PORTAL</title>

	<link rel="shortcut icon" href="/images/favicon.ico">

	<link rel="stylesheet" href="css/stylesheet.css">

	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

	<style>
		@import url('https://fonts.googleapis.com/css?family=Calistoga&display=swap');
	</style>
</head>

<body>

	<?php require "header.php"; ?>
	<div class="middle">

		<p id="p01" style="color:blue;">GATE ENTRY REGISTER PORTAL</p>
		<br> <br>
		<center>
			<button type="button" class="btn btn-success btn-lg btn-block btn_space_left" data-toggle="modal"
				data-target="#register">ADD ENTRY</button>
        </center>
	</div>

	<!-- Modal -->
	<div id="register" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style=" background-color: rgb(0,0,0,0.5)">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" style="color:white;">
						<center>Enter Your Details</center>
					</h3>
				</div>
				<div class="modal-body">

					<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Name:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="Name" id="name" placeholder="Enter Name"
									required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Entry time:</label>
							<div class="col-sm-10">
								<input type="datetime-local" class="form-control" name="Entry" id="entry"
									placeholder="Enter Entry time" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Reason of visit:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="Reason" id="reason"
									placeholder="Enter reason for visit" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Visiting person:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="Visiting" id="visiting"
									placeholder="Enter name of Visiting person" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Exit time:</label>
							<div class="col-sm-10">
								<input type="datetime-local" class="form-control" name="Exittime" id="exit"
									placeholder="Enter Exit time" required>
							</div>
						</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" name="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>

				</div>

			</div>


		</div>
	</div>



	<!-- Modal -->
	<div id="exit" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content" style=" background-color: rgb(0,0,0,0.5)">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title" style="color:white;">
						<center>Exit</center>
					</h3>
				</div>
				<div class="modal-body">

					<form class="form-horizontal" action="exit.php" method="POST">
						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">UserId:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="UserId" id="name"
									placeholder="Enter UserId" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-2" for="name" style="color:white;">Email:</label>
							<div class="col-sm-10">
								<input type="Email" class="form-control" name="Email" id="name"
									placeholder="Enter Email" required>
							</div>
						</div>



						<!--
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<div class="checkbox">
									<label><input type="checkbox"> Remember me</label>
								</div>
							</div>
						</div>
					-->

						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-default">Submit</button>
							</div>
						</div>
					</form>

				</div>

			</div>


		</div>
	</div>


</body>

</html>



