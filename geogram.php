<?php

if($_GET['location']) {
	$maps_url = 'https://maps.googleapis.com/maps/geocode/json/?address='. urlencode($_GET['location']);
	$maps_json = file_get_contents($maps_url);

	$maps_array = json_decode($maps_json, true);

	$lat = $maps_array['results'][0]['geometry']['location']['lat'];
	$lng = $maps_array['results'][0]['geometry']['location']['lng'];

	// have to create var in Instagrams access token

	$instagram_url = 'https://api.instagram.com/v1/media/search/?lat=' . lat '&lng=' . lng '&client_id=' . //append client ID here
	$instagram_json = file_get_contents($instagram_url);
	$instagram_array = json_decode($instagram_json, true);

	//will return a loop
	<br />

	<?php 
	foreach($instagram_array['data'] as $image) {
		echo '<img src ="' 
		.$image['image']['low_resolution']['url'] . '"alt=""/>';

	}

}


 ?>

<!Doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Geogram</title>
</head>

<body>
	<form action="">
		<input type="text" name="location" />
		<button type="submit"></button>
	</form>

</body>
</html>
