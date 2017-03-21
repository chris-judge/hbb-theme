<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php // Force latest IE rendering engine and chrome fram ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php if (is_search()) { ?><meta name="robots" content="noindex, nofollow" /> <?php } ?>
	
	<title><?php bloginfo('name'); ?> <?php wp_title("",true); ?></title>
	
	<?php // Meta SEO Information ?>
	<meta name="title" content="<?php bloginfo('name'); ?> <?php wp_title("",true); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="Hell's Bay Boatworks">
	
	<?php // Mobile Friendly ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	
	<?php // Favicon ?>
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/pro/favicon.ico">
	
	<?php // Pingback URL ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php //Transition ?>	
	<style>
	html{
		opacity: 0;
	    -webkit-transition: opacity 2s cubic-bezier(0.19, 1, 0.22, 1);
	    transition: opacity 2s cubic-bezier(0.19, 1, 0.22, 1);
	    -moz-transition: opacity 2s cubic-bezier(0.19, 1, 0.22, 1);
	    -o-transition: opacity 2s cubic-bezier(0.19, 1, 0.22, 1);
	}
	html.fa-events-icons-ready{
		opacity: 1;
	}
    </style>

	<?php //Google Analytics Code here ?>
	<script>
	</script>
	
	<?php if(is_page('Home') || is_page('Contact')): ?>
		<?php gravity_form_enqueue_scripts( 1, true ); ?>
	<?php endif; ?>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	<header class="header">
		<div class="logo-wrap dn">
			<a href="<?php echo get_home_url(); ?>"><?php include('_/img/logo.svg'); ?></a>
		</div>
		<div class="nav-btn dn">
			<div id="nav-icon3">
			  <span></span>
			  <span></span>
			  <span></span>
			  <span></span>
			</div>
		</div>
		<nav class="flex center">
			<?php wp_nav_menu(array('menu'=>'Header Menu')); ?>
		</nav>
	</header>
	<div class="pad-wrap">