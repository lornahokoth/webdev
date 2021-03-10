<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Buy Your Way to a Better Education!</title>
	<link href="buygrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
	<?php
	$valid = false;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			if (isset($_POST['section']) && !empty($_POST['section'])) {
				if (isset($_POST['cardNum']) && !empty($_POST['cardNum'])) {
					if (isset($_POST['card']) && !empty($_POST['card'])) {
						$valid = true;
					}
				}
			}
		}
	}
	if ($valid) {
	?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd>
				<?php echo $_POST["name"]; ?>
			</dd>

			<dt>Section</dt>
			<dd>
				<?php echo $_POST["section"]; ?>
			</dd>

			<dt>Credit Card</dt>
			<dd>
				<?php echo $_POST["cardNum"]; ?>
				<?php echo $_POST["card"]; ?>
			</dd>
		</dl>
		Here are all the suckers who have submitted here: <br>
	<?php
		$data = $_POST;
		$file = 'sucker.html';
		$string = $data['name'] . "|" . $data['section'] . "|" . $data['cardNum'] . "|" . $data['card'] . "<br>";
		file_put_contents($file, $string, FILE_APPEND);

		print "<pre>" . file_get_contents($file) . "</pre>";
	} else {
	?>
		<h1>Sorry</h1>

		<p>You didn't fill out the form completely. <a href="./buyagrade.html">Try again?</a></p>
	<?php
	}
	?>
</body>

</html>