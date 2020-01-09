<?php
include("includes/config.php");

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
} else {
	header("Location: register.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Soundify</title>

	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

	<div id="nowPlayingBarContainer">

		<div id="nowPlayingBar">

			<div id="nowPlayingLeft">
				<div class="content">
					<span class="albumLink">
						<img class="albumArtwork" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTLMt5pl6xNtP-TurEH_khpR84Q8nrie0IEV2AL1lMXtfmo4fH7&s" alt="">
					</span>

					<div class="trackInfo">

						<span class="trackName">
							<span>Original Song</span>
						</span>
						<span class="artistName">
							<span>Beyu</span>
						</span>

					</div>

				</div>
			</div>

			<div id="nowPlayingCenter">
				<div class="content playerControls">
					<div class="buttons">

						<button class="controlButton shuffle" title="Shuffle button">
							<img src="assets/images/icons/shuffle-button.png" alt="Shuffle">
						</button>

						<button class="controlButton previous" title="Shuffle button">
							<img src="assets/images/icons/previous-button.png" alt="Previous">
						</button>

						<button class="controlButton play" title="Shuffle button">
							<img src="assets/images/icons/play-button.png" alt="Play">
						</button>

						<button class="controlButton pause" title="Shuffle button" style="display: none;">
							<img src="assets/images/icons/pause-button.png" alt="Pause">
						</button>

						<button class="controlButton next" title="Shuffle button">
							<img src="assets/images/icons/next-button.png" alt="Next">
						</button>

						<button class="controlButton repeat" title="Shuffle button">
							<img src="assets/images/icons/repeat-button.png" alt="Repeat">
						</button>

					</div>

					<div class="playbackBar">
						<span class="progressTime current">0.00</span>
						<div class="progressBar">
							<div class="progressBarBg">
								<div class="progress"></div>
							</div>
						</div>
						<span class="progressTime remaining">0.00</span>
					</div>

				</div>
			</div>

			<div id="nowPlayingRight"></div>

		</div>

	</div>

</body>

</html>