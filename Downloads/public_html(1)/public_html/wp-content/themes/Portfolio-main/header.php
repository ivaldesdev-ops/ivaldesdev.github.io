<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="navbar">
  <div class="logo"><a href="<?php echo site_url('/home'); ?>">My Portfolio</a></div>
  <div class="hamburger" id="hamburger">&#9776;</div>
  <ul class="nav-menu" id="navMenu">
    <li><a href="<?php echo site_url('/home'); ?>">Home</a></li>
    <li><a href="<?php echo site_url('/projects'); ?>">Projects</a></li>
    <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
    <!--<li><a href="<?php echo site_url('/login'); ?>">Login</a></li>-->
	<li><div id="habit-tracker" class="container">
  <?php include( get_template_directory() . '/habit-tracker/index.html' ); ?>
</div></li>
  </ul>
</header>
