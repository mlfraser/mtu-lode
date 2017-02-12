<?php require_once("./wp-blog-header.php"); 
$post = get_post(55);
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );

?>
<html>

<head>
<title>Enterprise - Standard Post</title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
<script type="text/javascript" src="layout/plugins/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="wp-includes/css/style.css" type="text/css">

<script type="text/javascript" src="wp-includes/js/jquery.js"></script>
<script type="text/javascript" src="wp-includes/js/plugins.js"></script>
<script type="text/javascript" src="wp-includes/js/main.js"></script>
<script type="text/javascript" src="wp-includes/js/validator.min.js"></script>

</head>

<body class="sticky_footer">
	<div class="wrapper">
		<!-- HEADER BEGIN -->
		<header>
			<div id="header">
				<section class="top"></section>
				<section class="middle hidden-xs">
					<div class="inner">
						<li><img src="Lodelogo-02.png" width="100" height="126" class="logo" /></li>
						<div class="block_top_menu">
							<nav>
								
								<ul>
									<li><a href="index.php">HOME</a></li>
									<li><a href="category.php?c=News">NEWS</a></li>
									<li><a href="category.php?c=Pulse">PULSE</a></li>
									<li><a href="category.php?c=Opinion">OPINION</a></li>
									<li><a href="category.php?c=Sports">SPORTS</a></li>
									<li><a href="about_us.php">ABOUT US</a></li>
								</ul>
							</nav>
						</div>
						
						
						<div class="block_top_social">
							<ul class="general_social_1">
								<li><a href="https://www.facebook.com/mtulode" class="social_2">Facebook</a></li>
							</ul>
						</div>
						
						<div class="clearboth"></div>
					</div>
				</section>
				<section class="bottom hidden-sm hidden-md hidden-lg">
					<div align="center"><img src="Lodelogo-01.png" width="103" height="85" /><br></div>
					<div class="inner">
						<div class="block_secondary_menu">
							<nav>
								<ul>
									<li><a href="index.php">HOME</a></li>
									<li><a href="category.php?c=News">NEWS</a></li>
									<li><a href="category.php?c=Pulse">PULSE</a></li>
									<li><a href="category.php?c=Opinion">OPINION</a></li>
									<li><a href="category.php?c=Sports">SPORTS</a></li>
									<li><a href="about_us.php">ABOUT US</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</section>
			</div>
		</header>
		<!-- HEADER END -->
		
		<!-- CONTENT BEGIN -->
		<div id="content">
			<div class="inner">
				<div class="block_general_title_2">
					<h1>ABOUT US</h1>
				</div>
				
				<div class="main_content">
					<div class="block_content">
						<div class="pic"><img src="<?php echo $image[0]; ?>" width="940" height="403" alt=""></div>
						<p><?php echo wpautop( $post->post_content, $true ); ?></p>
					</div>
			</div>
		</div>
		<!-- CONTENT END -->
		
		<!-- FOOTER BEGIN -->
		<footer>
			<div id="footer">				
				<section class="middle">
					<div class="inner">
						<div class="block_bottom_menu">
							<nav>
								<ul>
									<li><a href="index.php">HOME</a></li>
									<li><a href="category.php?c=News">NEWS</a></li>
									<li><a href="category.php?c=Pulse">PULSE</a></li>
									<li><a href="category.php?c=Opinion">OPINION</a></li>
									<li><a href="category.php?c=Sports">SPORTS</a></li>
									<li><a href="about_us.php">ABOUT US</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</section>
				
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>
</body>

</html>