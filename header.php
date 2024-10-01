<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo(
     'html_type'
 ); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="Keywords">
	<meta name="author" content="Name">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- <meta meta name="viewport" content="width=device-width, user-scalable=no" /> -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo(
     'name'
 ); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<header>
	<?php echo wp_kses_post(do_action('npub_header')); ?>
</header>
