<h1>Other Details - <?= $user->name ?></h1>

<?php
if($user->token == "") {
	echo "<div><p>This user has not enabled Foursquare.</p></div>";
}else {
	var_dump($userdata);
}
?>

