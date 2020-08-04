<?php
include_once 'C:\xampp\unnamed_hack_game\classes\Session.php';

if (!isset($session)) {
	$session = new Session();
}

?>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	  <!-- Brand -->
	<a class="navbar-brand" href="index.php">Unnamed-hack game</a>

	  <!-- Toggler/collapsibe Button -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	</button>

	  <!-- Navbar links -->
	<div class="collapse navbar-collapse" id="collapsibleNavbar">
		<ul class="navbar-nav mr-auto">
	    	<li class="nav-item">
	        	<a class="nav-link" href="login.php">Login</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link" href="register.php">Register</a>
	      	</li>
	    </ul>

	    <?php if (!empty($session->getSessionValue('login'))) { ?>
		    <ul class="navbar-nav">
		    	<li class="nav-item">
		    		<a class="nav-link" href="logout.php">Logout</a>
		    	</li>
		    </ul>
		<? } ?>
	</div>
</nav>