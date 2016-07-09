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
                        <section id="header" class="header">
                                <header>
                                        <h1>Welcome to your magic garden watering system</h1>
                                        <p>Never let your garden dying of thirst again!</p>
                                </header>
                                <footer class="button">
                                        <a href="#first" class="btn btn-warning btn-lg" role="button"> Let's take a <img src="images/unicorn.png" alt="unicorn" style="width:35px;"> to your garden</a>
                                </footer>
                        </section>

                <!-- First -->
                        <section id="first">
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-5 text-left">
												<div class="wat_table_session">
													<h2>Take a look at the latest watering session</h2>
													</div>
												<div class:"wat_table_session">
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
												<div class="wat_but">
													<ul class="list-inline">
													<li><p>Your vegetable need a little more water? Here it is :</p></li>
													<li>


         <?php
         //this php script generate the first page in function of the gpio's status
         $status = array (0);
         for ($i = 0; $i < count($status); $i++) {
                //set the pin's mode to output and read them
                system("gpio mode ".$i." out");
                exec ("gpio read ".$i, $status[$i], $return );
                //if off
                if ($status[$i][0] == 0 ) {
                echo ("<img id='button_".$i."' src='data/img/red/red_".$i.".jpg' alt='off'/>");
                }
                //if on
                if ($status[$i][0] == 1 ) {
                echo ("<img id='button_".$i."' src='data/img/green/green_".$i.".jpg' alt='on'/>");
                }        
         }
         ?>




													</li>
													</ul>

												</div>
											</div>
											<div class="col-md-5">
												<iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="100%" src="http://forecast.io/embed/#lat=47.702477&lon=-2.720838&name=My Home"> </iframe>
<!-- <a href="http://192.168.1.16/gard_proj_website/pihome/indexpihome.php">Will be hot, let's water your garden!</a> -->


											</div>
										<div class="col-md-1"></div>
                                        </div>
                        </section>
                <!-- Second -->
                        <section id="second">
										<div class="row">
											<div class="col-md-1"></div>
											<div class="col-md-5 text-left">
												<div>
												<div>

											</div>
											<div class="col-md-5"></div>
										<div class="col-md-1"></div>
                                        </div>
                        </section>
<!-- Footer -->
                        <section id="footer">
										<div class="row footer_edge">
											<div class="col-md-2"></div>
											<div class="col-md-8 text-center footer_center">
												<ul class="list-inline">
													<li>make every </li>
													<li class="glyphicon glyphicon-tint" aria-hidden="true"></li>
													<li>count</li>
												</ul>
											</div>
										<div class="col-md-2"></div>
                                        </div>
                        </section>
    <!-- Including Bootstrap JS (with its jQuery dependency) so that dynamic components work -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
  </body>
</html>
