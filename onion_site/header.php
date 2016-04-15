<html>
<head>
<title>Onion Site</title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
<div id = "login">
<?php  if(!is_user_logged_in ()): ?>
 	<a href=  "wp-login.php" > login </a> 
 <?php else: ?>

 	<?php global $current_user;
 	get_current_user();
 	echo 'Username:' . $current_user->display_name;
 	 ?>
 	  <a href= 'wp-admin' >go to site </a> | <a href = '<?php echo wp_logout_url( home_url() ); ?>'> logout </a>
<?php endif; ?>
</div>
</head>
<body>
<div id="wrapper">
<div id="header" class="fixed">
<h1 class="center_text">Onion Site</h1>
<form action="<?php
 if(!is_user_logged_in ()) {
 	echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); 
 }else{
 	echo 'wp-admin';
 }
 ?>" method="post">
<input id="logo" type="image" src="http://ww1.prweb.com/prfiles/2015/04/01/12623885/Onion-Badge.png" alt="onion logo">
</form>
</div>