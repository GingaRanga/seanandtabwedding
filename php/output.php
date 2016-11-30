<!doctype html>
<html>
<!-- START HEAD SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --><head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<meta property="og:description" content="Sean and Tabitha are getting married!">
		<meta name="description" content="Sean and Tabitha are getting married!">
		<title>RSVP Output</title>
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
<!-- END HEAD SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<!-- START BODY SECTION ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
	<body>
	
		<?php

			$servername = "rsvp.db";
			$username = "gingaranga";
			$password = "Ch33K02?";
			$dbname = "rsvp";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			$q = "SELECT id, dbrsvp, dbattend, dbfullname, dbemail, dbguests, dbguestnames, dbextras, DATE_FORMAT(rsvpdate, '%M %d, %Y') AS dr, id FROM rsvp ORDER BY rsvpdate ASC";

			$r = mysqli_query($conn, $q);
		
			$num = mysqli_num_rows($r);
		
			if ($num > 0){
				
				echo "<h2 class='text-center' style='padding-bottom:20px;color:#C1B3C4;'>There are $num completed RSVPs.</h2>";
				
				echo 
				"<div class='table-responsive'>
					<table class='table table-hover'>
						<thead>
							<tr>
								<th>#</th>
								<th>Wedding Attendance</th>
								<th>Friday Attendance</th>
								<th>Name</th>
								<th>Email</th>
								<th># of Extra Guests</th>
								<th>Extra Guest Name(s)</th>
								<th>Comments</th>
								<th>Date of RSVP</th>
							</tr>
						</thead>";

				while($row = mysqli_fetch_array($r)){

					echo 
					"<tbody>
						<tr>
							<th scope='row'>".$row['id']."</th>
							<td>".$row['dbrsvp']."</td>
							<td>".$row['dbattend']."</td>
							<td>".$row['dbfullname']."</td>
							<td>".$row['dbemail']."</td>
							<td>".$row['dbguests']."</td>
							<td>".$row['dbguestnames']."</td>
							<td>".$row['dbextras']."</td>
							<td>".$row['dr']."</td>
						</tr>
					</tbody>";


				}

				echo
					"</table>
				</div>";
				
			}else{
				echo "<h2 class='text-center'>There are currently no completed RSVPs.</h2>";
			}

		mysqli_close($conn);

		?>
		
		<!-- JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   		<!-- BOOTSTRAP JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
<!-- END BODY SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --></html>	