<h1>Self Details - <?= $user->name ?></h1>

<?php
if ($user->token == "") {
	echo "<div><p>You have not enabled Foursquare. You can do so by clicking <a href='https://foursquare.com/oauth2/authenticate?client_id=AKEEBQXVGYNERMINA3NV3HMXMG33AJYG5ELXHWSUENELR2CI&response_type=code&redirect_uri=https://54.245.233.32/cs462/index.php/lab1/addUserToken'>here</a> </p></div>";
} else {
	$checkins = $userdata->response->checkins;
	echo "<div><h3>Most Recent Checkin</h3><p>";
	if ($checkins->count > 0) {
		for ($i = 0; $i < $checkins->count || $i < 10; $i++) {
			$mostRecentCheckin = $checkins->items[$i];
			echo date('m/d/Y', $mostRecentCheckin->createdAt);
			echo "</p><p> At: ";
			echo $mostRecentCheckin->venue->name;
			if (isset($mostRecentCheckin->venue->contact->twitter)) {
				echo "</p><p> Twitter: @";
				echo $mostRecentCheckin->venue->contact->twitter;
			}
		}
	} else {
		echo "There are no checkins for this person.";
	}
	echo "</p></div>";
}
?>