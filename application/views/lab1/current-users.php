<h1>Current Users</h1>

<?php
foreach ($users as $user) {
	echo "<div class='user'><a href='userDetails/$user'>$user</a></div>";
}
?>