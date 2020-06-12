<html>
<head>
	<title>PHP</title>
</head>
<body>
	<?php
	$header = htmlspecialchars($_GET["UserID"]);
	$file = fopen("./Users/" . $header, "r") or die ("Unable to open file!");
	$lines = file("./Users/" . $header, FILE_IGNORE_NEW_LINES);
	fclose($file);
	?>
	<h1><?php echo $lines[0] ?>'s Files</h1>
	<h6>ID: <?php echo $lines[1] ?></h6>
	<h3>Files:</h3>
	<?php
	for ($x = 2; $x < count($lines); $x++) {
		if (substr($lines[$x], 0, 2) != "-h") {
			echo "<a href=\"./Files/" . $lines[$x] . "\">" . $lines[$x] . "</a> <br />";
		}
		else {
			echo "<a hidden href=\"./Files/" .  substr($lines[$x], 2, strlen($lines[$x])-2) . "\">" . substr($lines[$x], 2, strlen($lines[$x])-2) . "</a> <br />";
		}
	}
	?>
</body>
</html>
