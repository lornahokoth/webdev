<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hangman Game</title>
	<link rel="stylesheet" href="../css/format.css" />
	<link rel="icon" href="../assets/Logo.png" type="image/x-icon" />
</head>

<body class="background">
	<?php
	include("top.php");
	?>
	<div class="gamespace">
		<div class="tdisplay">
			<a href="./play.php" class="button level btn"> PLAY </a>
			<a class=" button level btn" href="#popup">RULES</a>
			<div id="popup" class="overlay1">
				<div class="popup popup1">
					<div class="alignRight">
						<a class="close" href="#">&times;</a>
					</div>
					<h2>Rules for Hangman:</h2>
					<div class="rules">
						<ul>
							<li>
								You (the player) will try to guess a letter or word to fill<br>in the blank.
							</li>
							<li>
								With each correct letter, the dashes will start filling in.
							</li>
							<li>
								Each wrong letter or word is guessed, a piece of the figure<br>is placed on the gallows.
							</li>
							<li>
								Win by filling in the whole word before the stick figure is<br>drawn out!
							</li>
							<li>
								Fastest time will be placed on the leader board.
							</li>
						</ul>
					</div>
				</div>
			</div>
			<a href="./leaderboard.php" class="button level btn"> LEADERBOARD </a>
			<a href="./credits.php" class="button level btn"> CREDITS </a>
		</div>
	</div>
	<?php include("bottom.html"); ?>
</body>

</html>