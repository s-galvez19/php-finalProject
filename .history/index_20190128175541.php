<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Welcome to Roulette Game</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="gifffer.min.js"></script>

  </head>
  <body>
  
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
    <?php else: ?>
      <h1>Please Login or SignUp</h1>

      <a href="login.php">Login</a> or
      <a href="signup.php">SignUp</a>
    <?php endif; ?>


	<div class="title-game"></div>
	<div class='roulette-buttons'>
		<button id="clear-bets">CLEAR BETS</button>
		<button id="spin-time">Check Winnings</button>
		<button id="generate-number">Generate Number</button>
	</div>
	<div class='roulette-game'>	
		<div id="report"></div>
		<div id="instructions">
			<h1>Instructions</h1>
				<h4 <p>Your initial balance is 100.  Place your bets by clicking on the boxes below.  Each click is a one dollar bet.  If you wish to clear your bets and start over, click on the "CLEAR BETS" button and you can place your bets all over again.</p>
				<h4 <p>When you are ready to start the spin, click on the "Generate Number" button.  You will then see the winning number in the black box.  This will produce  the winning number.</p>
			<h4	<p>To see if you won, you will then press the "Check Winnings" button.  You can now check your balance and see how much you have won.</p>
		</div>
				<!-- this is where the number pops out for now 10.3.17 -->
		<div id="MAGICAL-NUMBER"></div>
<!-- 		<div id="roulette-person">
			<div class='gif'>
				<img data-gifffer="http://img15.laughinggif.com/pic/HTTP3N0cmVhbTEuZ2lmc291cC5jb20vdmlldzE	vMjAxNjAzMjQvNTMwMjczOS9yb3VsZXR0ZS13aGVlbC1vLmdpZgloglog.gif">
			</div>
		</div> -->
	</div>
	<div id="balance">
		<h5>BALANCE YO</h5>
	</div>
<!-- 	this is where the table is created with divs -->
	<div id="roulette-table">
		<div id='first-row'>
				<div id="number" class="odd">3</div>
				<div id="number" class="even">6</div>
				<div id="number" class="odd">9</div>
				<div id="number" class="even">12</div>
				<div id="number" class="odd">15</div>
				<div id="number" class="even">18</div>
				<div id="number" class="odd">21</div>
				<div id="number" class="even">24</div>
				<div id="number" class="odd">27</div>
				<div id="number" class="even">30</div>
				<div id="number" class="odd">33</div>
				<div id="number" class="even">36</div>
		</div>
		<div id='second-row'>
			<div id="number" class="zero">0</div>
			<div id="number" class="even">2</div>
			<div id="number" class="odd">5</div>
			<div id="number" class="even">8</div>
			<div id="number" class="odd">11</div>
			<div id="number" class="even">14</div>
			<div id="number" class="odd">17</div>
			<div id="number" class="even">20</div>
			<div id="number" class="odd">23</div>
			<div id="number" class="even">26</div>
			<div id="number" class="odd">29</div>
			<div id="number" class="even">32</div>
			<div id="number" class="odd">35</div>
		</div>
		<div id='third-row'>
			<div id="number" class="odd">1</div>
			<div id="number" class="even">4</div>
			<div id="number" class="odd">7</div>
			<div id="number" class="even">10</div>
			<div id="number" class="odd">13</div>
			<div id="number" class="even">16</div>
			<div id="number" class="odd">19</div>
			<div id="number" class="even">22</div>
			<div id="number" class="odd">25</div>
			<div id="number" class="even">28</div>
			<div id="number" class="odd">31</div>
			<div id="number" class="even">34</div>
		</div>			
	</div>	
<audio id="background" src="sounds/background-music.mp3" autostart='true' preload="auto" loop='true'></audio>
<audio id="audio" src="sounds/chip-sound.wav" autostart="false" preload="auto" ></audio>
<audio id="clear-bet" src="sounds/clear-bet.wav" autostart="false" preload="auto" ></audio>
<audio id="roulette-spin" src="sounds/roulette-spin.wav" autostart="false" preload="auto" ></audio>
<audio id="win-sound" src="sounds/win-sound.mp3" autostart="false" preload="auto" ></audio>




<!-- <script type="text/javascript" src="gifffer.min.js"></script> -->
<script src='main.js'></script>

  </body>
</html>
