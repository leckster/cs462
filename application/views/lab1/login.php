<h1>Login</h1>
<?php
if (isset($error)){
	echo "<div class='error'><p>$error</p></div>";
}
?>
<form class="form-horizontal" role="form" name="login_form" method="post" action="login_user">
	<div class="form-group">
		<label for="create_username" class="col-sm-2 control-label">Username</label>
		<div class="col-sm-10">
			<input id="create_fname" class="form-control" type="text" name="username" placeholder="Username">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default" name="create_account">Submit</button>
		</div>
	</div>
</form>