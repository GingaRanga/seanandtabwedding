<?php

	include('connection.php');

	// query the database
	//$query = "SELECT * FROM users";
	$query = "SELECT id, formrsvp, formattend, formfullname, formemail, formguestnames, formextras, DATE_FORMAT(submit_date, '%M %d, %Y') AS sd, id FROM users ORDER BY submit_date ASC";
	// store query results in result variable
	$result = mysqli_query($conn, $query);

	$num = mysqli_num_rows($result);

?>

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
				
			// check if anything store in table, by checking rows against the result variable when greater than 0
			if ( $num > 0 ){
				
				echo "<h2 class='text-center' style='padding-bottom:20px;color:#C1B3C4;'>There are $num completed RSVPs.</h2>";
				
				echo 
					"<table class='table table-bordered table-hover'>
						<thead>
							<tr>
								<th>#</th>
								<th>Wedding Attendance</th>
								<th>Friday Attendance</th>
								<th>Name</th>
								<th>Email</th>
								<th>Extra Guest Name(s)</th>
								<th>Comments</th>
								<th>Date of RSVP</th>
							</tr>
						</thead>";

				while( $row = mysqli_fetch_assoc($result) ){

					echo 
					"<tbody>
						<tr>
							<th scope='row'>".$row['id']."</th>
							<td>".$row['formrsvp']."</td>
							<td>".$row['formattend']."</td>
							<td>".$row['formfullname']."</td>
							<td>".$row['formemail']."</td>
							<td>".$row['formguestnames']."</td>
							<td>".$row['formextras']."</td>
							<td>".$row['sd']."</td>
						</tr>
					</tbody>";


				}// while

				echo
					"</table>";
				
			}else{
				echo "<h2 class='text-center'>There are currently no completed RSVPs.</h2>";
			}// else

			mysqli_close($conn);

		?>
		
		<!-- JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   		<!-- BOOTSTRAP JS -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
<!-- END BODY SECTION //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --></html>	