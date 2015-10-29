<?php include("./inc/header.inc.php"); ?>
<h1> Welcome To BudyMe</h1>
<h3> Login into your account</h3>
<form action="index.php" method="post" name="form1" id="form1">
                <h5>Username</h5>
                <input type="text" size="40" name="user_login" id="user_login" class="auto-clear" title="Username ..." /><p /><br />
                <h5>Password</h5>
                <input type="password" size="40" name="password_login" id="password_login" value="" /><p />
                <input type="submit" name="button" id="button" value="Login to your account">
            </form>