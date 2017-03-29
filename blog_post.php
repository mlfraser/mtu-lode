<?php require_once("./wp-blog-header.php");

 ?>
<?php
	$id = $_GET["p"];
    pvc_view_post($id);
	$post = get_post($id);
	$categories = get_the_category($id);
	$category = $categories[0];
    $isVideo = false;
    foreach($categories as $c) {
        if($c == "Video") {
            $isVideo = true;
        }
    }
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'single-post-thumbnail' );
	$tags = get_the_tags($id);
	
	$args = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'category_name'    => $category->name,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'exclude'          => $id,
		'exclude'		   => '55',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$moreInCategory = get_posts( $args );
	
	$args_popular = array(
		'posts_per_page'   => 5,
		'offset'           => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'exclude'          => $id,
		'exclude'		   => '55',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$popularPosts = get_posts( $args_popular );
	
	$commentArgs = array(
		'orderby' => 'comment_date',
		'order' => 'DESC',
		'post_id' => $id
	);
	$comments = get_comments( $commentArgs );
	
	$path = "wp-content/uploads/companypics/940x200/".strtolower($category->name); 

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
	$path = $path."/".$latest_filename_200;
	$adv_url_200 = "https://goo.gl/".substr($latest_filename_200, 0, 6);
?>

<html>

<head>
<title><?php echo $post->post_title; ?></title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta property="og:image" content="<?php echo $image[0]; ?>" />
<meta property="og:type"  content="article" />
<meta property="og:title" content="<?php echo $post->post_title;  ?>" />


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
		<div id="content" class="sidebar_right">
			<div class="inner">
			<div align="center">
					<a href="<?php if($adv_url_200 == "https://goo.gl/LODEad") echo "#"; else echo $adv_url_200;?>"  <?php if($adv_url_200 != "https://goo.gl/LODEad") echo "target=\"_blank\""; ?>><img src="<?php echo $path; ?>" class="img-responsive" alt="..."></a>
				</div>
				<br><br><br><br>
				<div class="block_general_title_2">
					<h1><?php echo $post->post_title; ?></h1>
					<h2><a href="category_<?php echo $category->name; ?>.php" class="tags"><?php echo $category->name; ?></a>&nbsp;&nbsp;/&nbsp;&nbsp;by <?php  echo the_author_meta('display_name', $post->post_author); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<span class="date"><?php echo formatDate($post->post_date) ?></span></h2>
				</div>
				
				
				
				<div class="main_content">
					<div class="block_content">
                        <?php if(!$isVideo) { ?>
                        <?php $pics = $dynamic_featured_image->get_featured_images($id); ?>
                        
                        <div class="block_slider_type_1 general_not_loaded">
                            <div id="slider" class="slider flexslider">
                                <ul class="slides">
                                    <li>
                                        <img class="responsive-carosel" src="<?php echo $image[0]; ?>">
                                    </li>
                                    <?php foreach ($pics as $pic) { ?>
                                    <li>
                                        <img class="responsive-carosel" src="<?php echo $pic["full"]; ?>">
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>

                            <script type="text/javascript">
                                jQuery(function() {
                                    init_slider_1('#slider');
                                });
                            </script>
                        </div>
                        <div align="center" class="post_image_caption"><p><?php echo get_post(get_post_thumbnail_id())->post_excerpt; ?></p></div>
                        
                        <?php } ?>
                        
                        
                        
                        
                        
<script type="text/javascript" src="wp-includes/js/jquery.js"></script>
<script type="text/javascript" src="wp-includes/js/plugins.js"></script>
<script type="text/javascript" src="wp-includes/js/main.js"></script>
<script type="text/javascript" src="wp-includes/js/validator.min.js"></script>
                        
                        
                        
                        
                        
                        
						<p><?php echo wpautop( $post->post_content, $true ); ?></p>
						
					</div>
					<hr>
					
					<div class="block_info_1 type_1">
						<?php if($tags != null) { ?>
						<div class="tags">
							<div class="title"><span>Tags</span></div>
							<?php foreach($tags as $tag){ ?>
							<ul>
								<li><a href="category.php?t=<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a></li>
							</ul>
							<?php } ?>
						</div>
						<?php } ?>
						<div class="social">
							<div class="title"><span>Recommend to friends</span></div>
							
							<ul class="general_social_3">
								<li><a class="social_1"
  href="https://twitter.com/intent/tweet?url=http://mtulode.com/blog_post.php?p=<?php echo $id; ?>" target="_blank">Twitter</a></li>
								<li><a href="https://www.facebook.com/sharer/sharer.php?u=http://mtulode.com/blog_post.php?p=<?php echo $id; ?>" class="social_2" target="_blank">Facebook</a></li>
							</ul>
						</div>
						
					</div>
					
					<div class="block_about_author_post">
						<?php if(!get_avatar( $post->post_author, 32 )) 
							  echo get_avatar( $post->post_author, 32 ); 
						      else {?>
						<div class="photo"><img src="images/ava_default_1.jpg" height="442" width="420" alt=""></div>
						     <?php } ?>
						<div class="content">
							<div class="name">
								<?php  echo the_author_meta('display_name', $post->post_author); ?>
							</div>
							
							<div class="description">
								<p><?php echo the_author_meta('description', $post->post_author);?></p>
							</div>
							
						</div>
					</div>
					
					
					<div class="block_comments_1">
						<h3>Comments <span id="commentCount"><?php echo $post->comment_count; ?></span></h3>
						
						<div id="postComments" class="comments">
							<?php for($i = 0; $i < count($comments); $i++) { ?>
							
							<div class="comment <?php if($i + 1 == count($comments)) echo "last_comment"; ?> ">
								<div class="inside">
									<!--<div class="avatar"><a href="#"><img src="images/ava_default_1.jpg" alt=""></a></div>-->
									<div class="content">
										<div class="author"><?php echo $comments[$i]->comment_author; ?></div>
										<div class="info"><?php echo formatDate($comments[$i]->comment_date); ?></div>
										<div class="text">
											<p><?php echo $comments[$i]->comment_content; ?></p>
										</div>
									</div>
									
									<div class="clearboth"></div>
								</div>
							</div>
							
							<?php } ?>
							
						</div>
					</div>
					
					<div class="block_leave_comment_1 type_1">
						<h3>Leave a comment</h3>
						
						<div class="form">
							<form action="#">
								<div class="fields">
									<div class="label">Name <span>*</span></div>
									<div class="field"><input type="text" name="name" id="userName" class="w_focus_mark required"></div>
									<div class="validate" id="validName">* Must provide a valid name.</div>
									
									<div class="label">E-mail <span>*</span></div>
									<div class="field"><input type="text" name="email" id="email" class="w_focus_mark required"></div>
									<div class="validate" id="validEmail">* Must provide a valid email.</div>
									
								</div>
								
								<div class="oh">
									<div class="label">Message <span>*</span></div>
									<div class="textarea"><textarea name="message" id="comment" class="w_focus_mark" cols="1" rows="1"></textarea></div>
									<div class="validate" id="validComment">* Must provide a message.</div>
									
									<div class="button"><a onclick="submitComment(<?php echo $id; ?>);" class="general_button_type_3 submit">Submit Your Comment</a></div>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="sidebar">
					<aside>
						<article align="center" class="post_type_4 sidebar-section-title">
							<h1><center>More in <?php echo $category->name; ?></center></h1>
						</article>
						
						<div class="block_sidebar_popular_posts">
							<?php for($i = 0; $i < 3; $i++) {
							if($moreInCategory[$i] != null && $moreInCategory->ID != $id) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $moreInCategory[$i]->ID ), 'single-post-thumbnail' );?>
							<article>
								<div class="image"><a href="blog_post.php?p=<?php echo $moreInCategory[$i]->ID;?>"><img width="86" height="66" src="<?php echo $image[0]; ?>" alt=""></a></div>
								
								<div class="content">
								
									<div class="info">
										<div class="date"><?php echo formatDate($moreInCategory[$i]->post_date);?></div>
									</div>
									
									<div class="title">
										<a href="blog_post.php?p=<?php echo $moreInCategory[$i]->ID;?>"><?php echo $moreInCategory[$i]->post_title; ?></a>
									</div>
									
								</div>
							</article>
							<?php }} ?>
						</div>
					</aside>
					
					<aside>
						<article align="center" class="post_type_4 sidebar-section-title">
							<h1><center>Popular Posts</center></h1>
						</article>
						
						<div class="block_sidebar_popular_posts">
							<?php for($i = 0; $i < 3; $i++) {
							if($popularPosts[$i] != null && $popularPosts->ID != $id) {
							$image = wp_get_attachment_image_src( get_post_thumbnail_id( $popularPosts[$i]->ID ), 'single-post-thumbnail' );?>
							<article>
								<div class="image"><a href="blog_post.php?p=<?php echo $popularPosts[$i]->ID;?>"><img width="86" height="66" src="<?php echo $image[0]; ?>" alt=""></a></div>
								
								<div class="content">
								
									<div class="info">
										<div class="date"><?php echo formatDate($popularPosts[$i]->post_date);?></div>
									</div>
									
									<div class="title">
										<a href="blog_post.php?p=<?php echo $popularPosts[$i]->ID;?>"><?php echo $popularPosts[$i]->post_title; ?></a>
									</div>
									
								</div>
							</article>
							<?php }} ?>
						</div>
					</aside>
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
								</ul>
							</nav>
						</div>
					</div>
				</section>
				
			</div>
		</footer>
		<!-- FOOTER END -->
	</div>
	<script type="text/javascript" src="wp-includes/js/jquery.js"></script>
	<script type="text/javascript" src="wp-includes/js/plugins.js"></script>

	<script type="text/javascript" src="wp-includes/js/main.js"></script>

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