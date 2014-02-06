<h1>Current Users</h1>

<?php
foreach ($users as $index => $user) {
	echo "<div class='user'>" . HTML::anchor("lab1/userDetails/" . $user->name, $user->name,  NULL, TRUE) . "</div>";
}
?>