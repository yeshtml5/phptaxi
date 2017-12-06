<!--
@modify: 2017.11.30
-->
<?php include_once(get_theme_root()."/taxi/inc/common.inc"); ?>
<!Doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title(); ?></title>
	<?php wp_head();?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php path();?>src/css/basic.css" />
	<link type="text/css" rel="stylesheet" href="<?php path();?>src/css/common.css" />
	<link type="text/css" rel="stylesheet" href="<?php path();?>src/css/layout.css" />
	<link type="text/css" rel="stylesheet" href="<?php path();?>src/css/page.css" />
	<script type="text/javascript" src="<?php path();?>src/js/jquery.js"></script>
	<script type="text/javascript" src="<?php path();?>src/js/masonry.js"></script>
	<script type="text/javascript" src="<?php path();?>src/js/core.js"></script>
	<script type="text/javascript" src="<?php path();?>src/js/common.js"></script>
	<script type="text/javascript" src="<?php path();?>src/js/analytics.js"></script>
	<script type="text/javascript">console.log('%cphp.taxi','font-size:18px;letter-spacing:-0.5px;color:#33414e;');</script>
</head>
<body>
	<header class="clfix">		
		<a class="logo" href="/"><img src="<?php path();?>src/images/svg/taxi.svg" width="40" height="40"/><span>PHP.TAXI</span></a>
		<nav>
			<?php /*WP Menu*/ wp_nav_menu();?>
			<aside>
				<?php if (is_user_logged_in()):?>
				<a href="/admin/">ADMIN</a>
				<a href="<?php echo wp_logout_url(home_url()) ?>">LOGOUT</a>
				<?php else:?>
				<a href="/login/">LOGIN</a>
				<?php endif;?>
			</aside>
		</nav>
	</header>
