<?php require_once("./wp-blog-header.php"); ?>
<?php



$args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	'category_name'    => 'Pulse',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$pulse_posts_array = get_posts( $args );
$args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	'category_name'    => 'News',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$news_posts_array = get_posts( $args );
$args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	'category_name'    => 'Sports',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$sports_posts_array = get_posts( $args );
$args = array(
	'posts_per_page'   => 5,
	'offset'           => 0,
	'category_name'    => 'Opinion',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'post_type'        => 'post',
	'post_status'      => 'publish',
	'suppress_filters' => true
);
$opinion_posts_array = get_posts( $args );

$path = "wp-content/uploads/companypics/940x100/home";

$latest_ctime = 0;
$latest_filename_100 = '';

$d = dir($path);
while (false !== ($entry = $d->read())) {
  $filepath = "{$path}/{$entry}";
  // could do also other checks than just checking whether the entry is a file
  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename_100 = $entry;
  }
}

$path = "wp-content/uploads/companypics/940x200/home";

$latest_ctime = 0;
$latest_filename_200 = '';

$d = dir($path);
while (false !== ($entry = $d->read())) {
  $filepath = "{$path}/{$entry}";
  // could do also other checks than just checking whether the entry is a file
  if (is_file($filepath) && filectime($filepath) > $latest_ctime) {
    $latest_ctime = filectime($filepath);
    $latest_filename_200 = $entry;
  }
}

$adv_url_100 = "https://goo.gl/".substr($latest_filename_100, 0, 6);
$adv_url_200 = "https://goo.gl/".substr($latest_filename_200, 0, 6);


?>

<html>

<head>
<title>Michigan Tech Lode</title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="google-site-verification" content="d4imTL6RQ5vngl7i5okdeTEA7PWU3G4slx6lXC2sMZY" />

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
                                    <li><a href="search_page.php">ARCHIVES</a></li>
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
									<li><a href="index.php">HOME</a><div class="tail"></div></li>
									<li><a href="category.php?c=News">NEWS</a><div class="tail"></div></li>
									<li><a href="category.php?c=Pulse">PULSE</a></li>
									<li><a href="category.php?c=Opinion">OPINION</a></li>
									<li><a href="category.php?c=Sports">SPORTS</a></li>
									<li><a href="about_us.php">ABOUT US</a></li>
                                    <li><a href="search_page.php">ARCHIVES</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</section>
			</div>
		</header>
		<!-- HEADER END -->
		
		<!-- CONTENT BEGIN -->
		<div id="content" class="sidebar_right">
			<div class="inner">
				<div class="block_slider_type_1 general_not_loaded">
					<div id="slider" class="slider flexslider">
						<ul class="slides">
							<li>
								<?php $news = $news_posts_array[0]; ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $news->ID ), 'single-post-thumbnail' ); ?>
								<a href="blog_post.php?p=<?php echo $news->ID;?>"><img class="responsive-carosel" src="<?php echo $image[0]; ?>" width="940" height="403"></a>
								<div class="animated_item text_1_1" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown">News</div>
								<div class="animated_item text_1_2" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown"><?php echo $news->post_title; ?></div>
							</li>
							
							<li>
								<?php $opinion = $opinion_posts_array[0]; ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $opinion->ID ), 'single-post-thumbnail' ); ?>
								<a href="blog_post.php?p=<?php echo $opinion->ID;?>"><img class="responsive-carosel" src="<?php echo $image[0]; ?>" width="940" height="403"></a>
								<div class="animated_item text_1_1" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown">Opinion</div>
								<div class="animated_item text_1_2" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown"><?php echo $opinion->post_title; ?></div>
								
							</li>
							
							<li>
								<?php $pulse = $pulse_posts_array[0]; ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $pulse->ID ), 'single-post-thumbnail' ); ?>
								<a href="blog_post.php?p=<?php echo $pulse->ID;?>" ><img class="responsive-carosel" src="<?php echo $image[0]; ?>" width="940" height="403"></a>
								<div class="animated_item text_1_1" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown">Pulse</div>
								<div class="animated_item text_1_2" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown"><?php echo $pulse->post_title; ?></div>
							</li>
							
							<li>
								<?php $sports = $sports_posts_array[0]; ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $sports->ID ), 'single-post-thumbnail' ); ?>
								<a href="blog_post.php?p=<?php echo $sports->ID;?>"><img class="responsive-carosel" src="<?php echo $image[0]; ?>" width="940" height="403"></a>
								<div class="animated_item text_1_1" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown">Sports</div>
								<div class="animated_item text_1_2" data-animation-show="fadeInUp" data-animation-hide="fadeOutDown"><?php echo $sports->post_title; ?></div>
							</li>
							
						</ul>
					</div>
					
					<script type="text/javascript">
						jQuery(function() {
							init_slider_1('#slider');
						});
					</script>
				</div>
				
				<br><br>
				<div align="center">
					<a href="<?php if($adv_url_100 == "https://goo.gl/LODEad") echo "#"; else echo $adv_url_100;?>" <?php if($adv_url_100 != "https://goo.gl/LODEad") echo "target=\"_blank\""; ?>><img src="wp-content/uploads/companypics/940x100/home/<?php echo $latest_filename_100; ?>" class="img-responsive" alt="..."></a>
				</div>
				
				
				<div class="block_general_title_1 w_margin_1">
					<h1>LATEST POSTS</h1>
				</div>
				
				<!-- NEWS SECTION-->
                <article align="center" class="post_type_4 home-section-title">
						<h1><center>News</center></h1>
				</article>
				<div class="block_posts type_2">
				
					
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $news->ID ), 'single-post-thumbnail' ); ?>
					<article class="post_type_4">
						<div class="feature">
							<div class="image">
								<a href="blog_post.php?p=<?php echo $news->ID;?>"><img src="<?php echo $image[0]; ?>" width="601" height="384" alt=""><span class="hover"></span></a>
							</div>
						</div>
						
						<div class="content">
							<div class="info">
								<div class="date"><?php echo formatDate($news->post_date) ?></div>
							</div>
							
							<div class="title">
								<a href="blog_post.php?p=<?php echo $news->ID;?>"><?php echo $news->post_title ?></a>
							</div>
						</div>
					</article>
					
					
					<div class="posts isotope">
						<?php for($i = 1; $i < 6; $i++) {
						if($news_posts_array[$i] != null) {?>
						<article class="post_type_2 isotope-item small-post">
							
							<div class="content">
								<div class="info">
									
									<div class="date"><?php echo formatDate($news_posts_array[$i]->post_date) ?></div>
								</div>
								
								<div class="title">
									<a href="blog_post.php?p=<?php echo $news_posts_array[$i]->ID;?>"><?php echo $news_posts_array[$i]->post_title ?></a>
								</div>
							</div>
						</article>
						<?php }}?>
					</div>
					<div class="clearboth"></div>
				</div>
				
				<!-- OPINION SECTION -->
                <article align="center" class="post_type_4 home-section-title">
						<h1><center>Opinion</center></h1>
					</article>
				<div class="block_posts type_2">
				
					
					
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $opinion->ID ), 'single-post-thumbnail' ); ?>
					<article class="post_type_4">
						<div class="feature">
							<div class="image">
								<a href="blog_post.php?p=<?php echo $opinion->ID;?>"><img src="<?php echo $image[0]; ?>" width="601" height="384" alt=""><span class="hover"></span></a>
							</div>
						</div>
						
						<div class="content">
							<div class="info">
								<div class="date"><?php echo formatDate($opinion->post_date) ?></div>
							</div>
							
							<div class="title">
								<a href="blog_post.php?p=<?php echo $opinion->ID;?>"><?php echo $opinion->post_title ?></a>
							</div>
						</div>
					</article>
					<div class="posts isotope">
						<?php for($i = 1; $i < 6; $i++) {
						if($opinion_posts_array[$i] != null) {?>
						<article class="post_type_2 isotope-item small-post">
							
							<div class="content">
								<div class="info">
									
									<div class="date"><?php echo formatDate($opinion_posts_array[$i]->post_date) ?></div>
								</div>
								
								<div class="title">
									<a href="blog_post.php?p=<?php echo $opinion_posts_array[$i]->ID;?>"><?php echo $opinion_posts_array[$i]->post_title ?></a>
								</div>
							</div>
						</article>
						<?php }}?>
					</div>
					<div class="clearboth"></div>
				</div>
				<div align="center">
					<a href="<?php if($adv_url_200 == "https://goo.gl/LODEad") echo "#"; else echo $adv_url_200;?>?>" <?php if($adv_url_200 != "https://goo.gl/LODEad") echo "target=\"_blank\""; ?>><img src="wp-content/uploads/companypics/940x200/home/<?php echo $latest_filename_200; ?>" class="img-responsive" alt="..."></a>
				</div>
				<br><br>
				
				<!-- PULSE SECTION -->
                <article align="center" class="post_type_4 home-section-title">
						<h1><center>Pulse</center></h1>
					</article>
				<div class="block_posts type_2">
				
					
					
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $pulse->ID ), 'single-post-thumbnail' ); ?>
					<article class="post_type_4">
						<div class="feature">
							<div class="image">
								<a href="blog_post.php?p=<?php echo $pulse->ID;?>"><img src="<?php echo $image[0]; ?>" width="601" height="384" alt=""><span class="hover"></span></a>
							</div>
						</div>
						
						<div class="content">
							<div class="info">
								<div class="date"><?php echo formatDate($pulse->post_date) ?></div>
							</div>
							
							<div class="title">
								<a href="blog_post.php?p=<?php echo $pulse->ID;?>"><?php echo $pulse->post_title ?></a>
							</div>
						</div>
					</article>
					<div class="posts isotope">
						<?php for($i = 1; $i < 6; $i++) {
						if($pulse_posts_array[$i] != null) {?>
						<article class="post_type_2 isotope-item small-post">
							
							<div class="content">
								<div class="info">
									
									<div class="date"><?php echo formatDate($pulse_posts_array[$i]->post_date) ?></div>
								</div>
								
								<div class="title">
									<a href="blog_post.php?p=<?php echo $pulse_posts_array[$i]->ID;?>"><?php echo $pulse_posts_array[$i]->post_title ?></a>
								</div>
							</div>
						</article>
						<?php }}?>
					</div>
					<div class="clearboth"></div>
				</div>
				
				<!-- SPORTS SECTION -->
                <article align="center" class="post_type_4 home-section-title">
						<h1><center>Sports</center></h1>
					</article>
				<div class="block_posts type_2">
				
					
					
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $sports->ID ), 'single-post-thumbnail' ); ?>
					<article class="post_type_4">
						<div class="feature">
							<div class="image">
								<a href="blog_post.php?p=<?php echo $sports->ID;?>"><img src="<?php echo $image[0]; ?>" width="601" height="384" alt=""><span class="hover"></span></a>
							</div>
						</div>
						
						<div class="content">
							<div class="info">
								<div class="date"><?php echo formatDate($sports->post_date) ?></div>
							</div>
							
							<div class="title">
								<a href="blog_post.php?p=<?php echo $sports->ID;?>"><?php echo $sports->post_title ?></a>
							</div>
						</div>
					</article>
					<div class="posts isotope">
						<?php for($i = 1; $i < 6; $i++) {
						if($sports_posts_array[$i] != null) {?>
						<article class="post_type_2 isotope-item small-post">
							
							<div class="content">
								<div class="info">
									
									<div class="date"><?php echo formatDate($sports_posts_array[$i]->post_date) ?></div>
								</div>
								
								<div class="title">
									<a href="blog_post.php?p=<?php echo $sports_posts_array[$i]->ID;?>"><?php echo $sports_posts_array[$i]->post_title ?></a>
								</div>
							</div>
						</article>
						<?php }}?>
					</div>
					<div class="clearboth"></div>
				</div>

				<div class="clearboth"></div>
				
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
                                    <li><a href="search_page.php">ARCHIVES</a></li>
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

<?php
	function formatDate($date)
	{
		$returnString;
		switch (substr($date, 5, 2)) {
			case '01':
				$returnString = "January";
				break;
			case '02':
				$returnString = "Feburary";
				break;
			case '03':
				$returnString = "March";
				break;
			case '04':
				$returnString = "April";
				break;
			case '05':
				$returnString = "May";
				break;
			case '06':
				$returnString = "June";
				break;
			case '07':
				$returnString = "July";
				break;
			case '08':
				$returnString = "August";
				break;
			case '09':
				$returnString = "September";
				break;
			case '10':
				$returnString = "October";
				break;
			case '11':
				$returnString = "November";
				break;
			default:
				$returnString = "December";
		}
		
		return $returnString." ".substr($date, 8, 2).", ".substr($date, 0, 4);
	}
	
	// retrieves the attachment ID from the file URL
function pippin_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
        return $attachment[0];
}

?>
