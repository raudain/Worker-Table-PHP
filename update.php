<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

	<meta charset="ISO-8859-1">
	<meta http-equiv="Content-Type"
		  content="text/html; charset=ISO-8859-1">
	<meta name="description"
		  content="Worker list updater for the Virtual Beggar mobile clicker game">
	<meta name="author"
	  	  content="Roody Audain">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	<title>Change Inc | Create Room</title>
	<link rel="stylesheet" href="layouts/style/nav.css">
	<link rel="stylesheet" href="layouts/style/update.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<?php
require_once 'header.php';
?>
	
<div class = "w3-container w3-khaki">
	<h2>Worker</h2>
</div>

<form action = "Onboarding" method = "POST">

	<p class = "w3-margin-left">
		<label>Room</label>
        <?php
        require_once 'doa/WorkerDAO.php';
        $doa = new WorkerDAO();
        $room = $doa->getNextRoom();
        echo "<input name = \"room\" type = \"text\" value = \"$room\"";
        echo "class = \"field w3-input w3-border w3-hover-red\">";
        ?>
	</p>
	<p class = "w3-margin-left">
		<label>Name</label>
		<input name = "name" type = "text" minlength = "2" maxlength = "255"
		autocomplete = "on" class = "field w3-input w3-border w3-hover-red"
		required>
	</p>
	
	<div class = "w3-display-container w3-margin-left">
	
	<div>
		<p class = "w3-display-container">
			<label>Profession</label>
			<select class = "field w3-select w3-border w3-display-bottomleft w3-hover-red" name = "profession" required>
				<option value = ""></option>
		    	<option value = "21">Artist</option>
		    	<option value = "71">Businessman</option>
		    	<option value = "42">Computer Engineer</option>
		    	<option value = "11">Construction Worker</option>
		    	<option value = "22">Cook</option>
		    	<option value = "41">Doctor</option>
		    	<option value = "24">Firefighter</option>
		    	<option value = "32">Journalist</option>
		    	<option value = "44">Lawyer</option>
		    	<option value = "61">Mad Scientist</option>
		    	<option value = "23">Magician</option>
		    	<option value = "52">Pilot</option>
		    	<option value = "51">Politician</option>
		    	<option value = "12">Postman</option>
		    	<option value = "43">Santa</option>
		    	<option value = "31">Scientist</option>
			</select>
		</p>
		<p>
			<label>Endurance</label>
			<select class = "field w3-select w3-border w3-display-bottomleft w3-hover-red" name = "endurance" required>
				<option value = ""></option>
		    	<option value = "1">Lazy</option>
		    	<option value = "2">Sleepy</option>
		    	<option value = "3">Diligent</option>
		    	<option value = "4">Productive</option>
		    	<option value = "5">Hard-working</option>
		    	<option value = "6">Tireless</option>
			</select>
		</p>
	</div>
	<input id = "save"
	class = "w3-button w3-light-green w3-jumbo w3-round-large w3-border w3-border-lime w3-hover-red w3-ripple w3-display-bottomright" type = "submit" value = "Hire">
	
	</div>
	  	
	</form>

</html>