<!DOCTYPE html>

<html lang = "en" dir = "ltr">

<head>

	<meta charset = "ISO-8859-1">
	<meta http-equiv="Content-Type"
		content = "text/html; charset=ISO-8859-1">
	<meta name = "description" content =
		"Worker table for the Virtual Beggar mobile clicker game">
	<meta name = "author" content = "Roody Audain">
	<meta name = "viewport"
		content = "width=device-width, initial-scale=1.0">
	<link rel = "shortcut icon" type = "image/png"
		href = "images/favicon.png">
	<title>Table</title>
	<link rel = "stylesheet" href = "layouts/style/nav.css">
	<link rel = "stylesheet"
		href = "https://www.w3schools.com/w3css/4/w3.css">
	<link rel = "stylesheet" href = "layouts/style/table.css">

</head>

<?php
require_once 'header.php';
?>

<div class = "w3-container w3-display-container w3-margin-top">

	<table class = "w3-table-all">
		<thead>
			<tr class = "w3-light-grey">
				<th class = "w3-border">
					Room
					<a href = "table.php?page=1">
						<i class = "fa-solid fa-arrow-down-9-1"></i>
					</a>
					<form action = "table.php" method = "POST">
					<input type = "number" name = "position"
					min = "1" max ="3"
	 				class="w3-input w3-border w3-hover-red">
	 				</form>
				</th>
				
				<th class = "w3-border">Name</th>
				<th class = "w3-border">Profession</th>
				<th class = "w3-border">Endurance</th>
				<th class = "w3-border">
					Cost<a href = "table.php?page=69">
							<i class = "fa-solid fa-arrow-up-1-9"></i>
						</a>
				</th>
			</tr>
		</thead>

<?php
require_once 'TableRows.php';
require_once 'doa/WorkerDAO.php';

$isGetRequest = count($_GET) > 0;
$workerList = null;
try {
	$doa = new WorkerDAO();
	if ($isGetRequest) {
		$page = $_GET['page'];
	}
	else {
		$page = "1" . $_POST['position'];	
	}
	$workerList = $doa->getWorkers($page);
  	foreach(new TableRows(new RecursiveArrayIterator($workerList)) as $k=>$v) {
    	echo $v;
  	}
}
catch(PDOException $exception) {
	echo $exception->getMessage();
	echo "<br>";
	echo $exception->getTraceAsString();
}
$conn = null;
echo "</table>";

if ($workerList == null) {
    echo "<main class=\"w3-display-container\">";
	echo 	"<h1 class = \"w3-xxxlarge w3-center w3-margin-top\">";
	echo			"We lost this page";
	echo	"</h1>";
	echo	"<h3 class = \"w3-center w3-margin-right w3-margin-left\">";
	echo		"We searched high and low but couldn’t find what you’re looking for. Let’s find a better place for you to go.";
	echo	"</h3>";
	echo	"<img src=\"images/table/404Horse.gif\"";
	echo		"class=\"w3-display-bottommiddle\"";
	echo		"alt=\"Horse\">";
	echo "</main>";
} 
?>
	
<div class = "w3-bar w3-margin-top w3-display-bottommiddle w3-center">
	
	<a id = "pageFirst" href = "table.php?page=1"
		class = "w3-button w3-hover-red w3-mobile">&laquo;
	</a>
	<a id = "arrowPrevious"
		class = "w3-button w3-hover-red w3-mobile">&#60;
	</a>
	<a id = page1 href = "table.php?page=1"
		class = "w3-button w3-hover-red w3-mobile">1
	</a>
	<a id = page2 href = "table.php?page=2"
		class = "w3-button w3-hover-red w3-mobile">2
	</a>
	<a id = page3 href = "table.php?page=3"
		class = "w3-button w3-hover-red w3-mobile">3
	</a>
	<a id = page4 href = "table.php?page=4"
		class = "w3-button w3-hover-red w3-mobile">4
	</a>
	<a id = page5 href = "table.php?page=5"
		class = "w3-button w3-hover-red w3-mobile">5
	</a>
	<a id = page6 href = "table.php?page=6"
		class = "w3-button w3-hover-red w3-mobile">6
	</a>
	<a id = page7 href = "table.php?page=7"
		class = "w3-button w3-hover-red w3-mobile">7
	</a>
	<a id = page8 href = "table.php?page=8"
		class = "w3-button w3-hover-red w3-mobile">8
	</a>
	<a id = "arrowNext"
		class = "w3-button w3-hover-red w3-mobile"> &#62;
	</a>
	<a id = "pageLast" href = "table.php?page=8"
		class = "w3-button w3-hover-red w3-mobile">&raquo;
	</a>
	<script src = "javascript/table.js"></script>
		
</div>

</body>

</html>
