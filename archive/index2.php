<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Garden Watering System</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
 	<link href="style.css" rel="stylesheet" 
 	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- Leave those next 4 lines if you care about users using IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- Header -->
                        <section id="header" class="header ">
                                <header>
                                        <h1>Welcome to your garden watering system</h1>
                                        <p>Never let your garden dying of thirst again!</p>
                                </header>
                                <footer>
                                        <a href="#first" class="btn btn-warning btn-lg" role="button">Let's take a look to your garden</a>
                                </footer>
                        </section>
                        
                <!-- First -->
                        <section id="first">
										<div class="row">
											<div class="col-md-2"></div>
											<div class="col-md-8">
													<h2 class="text-center">Take a look at the latest watering session</h2>
													<div class="text-center">													
														<?php
														$servername = "localhost";
														$username = "root";
														$password = "raspberry";
														$dbname = "_gard_proj";
	
														// Create connection
														$conn = new mysqli($servername, $username, $password, $dbname);
														// Check connection
														if ($conn->connect_error) {
															die("Connection failed: " . $conn->connect_error);
														} 
	
														$sql = "SELECT id, timestamp, humidity_sensor_value FROM humidity_sensor_value ORDER BY id DESC LIMIT 6";
														$result = $conn->query($sql);
  	
														if ($result->num_rows > 0) {
															// output data of each row
															while($row = $result->fetch_assoc()) {	
																echo "id: " . $row["id"]. " - Timestamp: " . $row["timestamp"]. " - Moisture: " . $row["humidity_sensor_value"]. "<br>";
															}
														} else {										  
															echo "0 results";
														}
														$conn->close();
														?> 
											</div>
										<div class="col-md-2"></div>
                                        </div>
                        </section>                                 
    <!-- Including Bootstrap JS (with its jQuery dependency) so that dynamic components work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  </body>
</html>