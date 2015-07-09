<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<title><?php wp_title( '—', true, 'right' ); ?><?php bloginfo('name'); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<script>(function(){document.documentElement.className='js'})();</script>
	<?php wp_head(); ?>
</head>

<body>
<!--[if lt IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- HEADER -->
<header id="Header">
<div class="wrapper">
	<h1 class="site-name"><a href="/">Metanomalies</a></h1>
	<small class="tagline">Communities Helping Communities</small>
	
	<button class="hamburger"><i class="fa fa-bars"></i></button>
	<button class="search"><i class="fa fa-search"></i></button>
	
	<form role="search" method="get" class="search" action="<?php echo site_url(); ?>">
		<input type="search" class="text" placeholder="Search …" value="" name="s" title="Search for:">
		<input type="submit" class="submit" value="&#xf002;">
	</form>
	
	<!-- NAV -->
	<nav id="Nav">
		<ul class="menu">
			<li><a href="<?php echo site_url(); ?>">Home</a></li>
			<li><a href="">Categories</a>
				<ul>
					<?php
						$args = array(
						  'orderby' => 'name',
						  'order' => 'ASC'
						  );
						
						$categories = get_categories($args);
						
						foreach($categories as $category) { 
						?>
							<li><a href="<?php echo get_category_link( $category->term_id )?>"><?php echo $category->name; ?></a></li>
						<?php
						} 
					?>
				</ul>
			</li>
			<li><a href="/about">About</a></li>
			<li><a href="">Contact</a></li>
			<li class="social">
				<span class="label">Follow us:</span>
				<a class="fa-stack" href="http://www.facebook.com/metanomalies" target="_blank">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
				</a><a class="fa-stack" href="http://twitter.com/metanomalies" target="_blank">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
				</a><a class="fa-stack" href="http://plus.google.com/communities/115289941541811491783" target="_blank">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
				</a><a class="fa-stack" href="http://www.linkedin.com/company/6395467" target="_blank">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /NAV -->
</div>
</header>
<!-- /HEADER -->