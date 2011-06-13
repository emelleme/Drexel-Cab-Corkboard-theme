<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php bloginfo('name'); ?> <?php wp_title('|', true, 'left'); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link type="text/css" media="screen" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/colorbox.css" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	

    <script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.3.2.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.colorbox.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-modal.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/calendarInit.js"></script>

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="toolbar_wrapper">

	<div id="toolbar">

    <div class="drexel"><a href="http://www.drexel.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/drexel.png"></a></div>
    <div class="tickets"><a href="/events/tickets"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/ticket_sales.png"></a></div>
    <div class="separator"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/toolbar_separator.png"></div>
    <div class="calendar"><a href="/events/calendar"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/events_calendar.png"></a></div>

	</div>
    <!-- /toolbar -->
    
</div>
<!-- /toolbar wrapper -->

<div id="cork">

<div id="wrapper">

	<div id="container">
    
    	<div id="pin_left"></div>
    	<div id="pin_right"></div>
        <div id="logo"><a href="/"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png"></a></div>

		<div id="navigation" class="<?php $parent_title = get_the_title($post->post_parent);echo $parent_title; ?>">
        
        <ul>
        <li><a href="/" class="nav_home"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank.png" alt="Home" width="104" height="70"></a></li>
        <li><a href="/events" class="nav_events"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank.png" alt="Events" width="150" height="70"></a></li>
        <li style="width:234px;height:70px;"></li>
        <li><a href="/about" class="nav_about"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank.png" alt="About CAB" width="166" height="70"></a></li>
        <li><a href="/contact" class="nav_contact"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/blank.png" alt="Contact Us" width="118" height="70"></a></li>
        </div>
        <!-- /navigation -->
        
        <div id="main">
