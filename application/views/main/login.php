<h1>Log into Kirkman's Blog</h1>
<p><b>NOTE:</b> Currently, to log into Kirkman's Blog you must have a pre-existing account.  If you have such an account, please log in with it below.</p>
<?php if (isset($error)): ?>
<p style="color:red;font-weight:bold;"><?php echo $error; ?></p>
<?php endif; ?>
<form method="post">
	Username: <input type="text" name="username"><br />
	Password: <input type="password" name="password"><br />
	<input type="submit" name="login" value="Log in">
</form>