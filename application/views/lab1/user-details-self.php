<h1>Self Details - <?= $user->name ?></h1>

<?php
if($user->token == "") {
	echo "<div><p>You have not enabled Foursquare. You can do so by clicking <a href='https://foursquare.com/oauth2/authenticate?client_id=AKEEBQXVGYNERMINA3NV3HMXMG33AJYG5ELXHWSUENELR2CI&response_type=code&redirect_uri=https://54.245.233.32/cs462/index.php/lab1/addUserToken'>here</a> </p></div>";
} else {
	echo $userdata;
}
?>