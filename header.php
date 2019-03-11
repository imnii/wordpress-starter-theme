<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div id="app" class="app">
			<header class="app-header">
				<div class="container">
					[Header]
					<button class="app-header__menu-toggle">
						<div>
						<span></span>
						<span></span>
						<span></span>
						</div>
					</button>
				</div>
			</header>
			<main class="app-main">
				<?php get_component('banner') ?>
				<?php get_component('social-media') ?>