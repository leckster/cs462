<h1>Other Details - <?= $user->name ?></h1>

<?php
if($user->token == "") {
	echo "<div><p>This user has not enabled Foursquare.</p></div>";
}else {
	$checkins = $userdata->response->checkins;
	echo "<div><h3>Most Recent Checkin</h3><p>";
	if($checkins->count > 0){
		$mostRecentCheckin = $checkins->items[0];
		echo date('m/d/Y', $mostRecentCheckin->createdAt);
	}else {
		echo "There are no checkins for this person.";
	}
	echo "</p></div>";
}
?>

