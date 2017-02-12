<?php 
	require_once("./wp-blog-header.php"); 
	$title = "";
	if(isset($_GET['c']) && !empty($_GET['c'])) {
		$category = $_GET["c"];
		$args = array(
			'category_name'    => $category,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'exclude'		   => '55',
			'suppress_filters' => true,
			'numberposts'      => 100
		);
		$posts_array = get_posts( $args );
		$title = $category;
		
		$path = "wp-content/uploads/companypics/940x200/".strtolower($category); 

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
	}
	else if(isset($_GET['t']) && !empty($_GET['t'])) {
		$tag = $_GET["t"];
		$args = array(
			'tag'    		   => $tag,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'exclude'		   => '55',
			'suppress_filters' => true,
			'numberposts'      => 100
		);
		$posts_array = get_posts( $args );
		$title = "Tag: ".$tag;
		
		$path = "wp-content/uploads/companypics/940x200/other"; 

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
	}
	else {
		$args = array(
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'exclude'		   => '55',	
			'suppress_filters' => true,
			'numberposts'      => 100
		);
		$posts_array = get_posts( $args );
		$title = "All Posts";
		
		$path = "wp-content/uploads/companypics/940x200/other"; 

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
	}
	$path = $path."/".$latest_filename_200;
	$adv_url_200 = "https://goo.gl/".substr($latest_filename_200, 0, 6);

	if((count($posts_array) % 7) == 0) {
			$numOfPages = (int)(count($posts_array) / 7);
		}
		else {
			$numOfPages = (int)((count($posts_array) / 7) + 1);
		}

?>

<html>

<head>
<title>The Lode</title>

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
<script>
$(document).ready(function() {
	window.currentPage = 1;
	window.lastPage = <?php echo $numOfPages;
	?>;
});
</script>
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
					<a href="<?php  if($adv_url_200 == "https://goo.gl/LODEad") echo "#"; else echo $adv_url_200; ?>" <?php if($adv_url_200 != "https://goo.gl/LODEad") echo "target=\"_blank\""; ?>><img src="<?php echo $path; ?>" class="img-responsive" alt="..."></a>
				</div>
				<br><br><br><br>
				<div class="block_general_title_1">
					<h1><?php echo $title; ?></h1>
				</div>
				
					
					<div class="block_posts type_6">
						<?php $postNum = 0; 
						      $pageNum = 1;
						 foreach($posts_array as $p) {
						 $image = wp_get_attachment_image_src( get_post_thumbnail_id( $p->ID ), 'single-post-thumbnail' ); 
						 ?>
						<article class="post_type_5 <?php if($pageNum > 1) echo "hidden"; ?>" name="post<?php echo $pageNum; ?>">
							<div class="feature">
								<div class="image">
									<a href="blog_post.php?p=<?php echo $p->ID ?>"><img src="<?php echo $image[0]; ?>" width="641" height="461" alt=""><span class="hover"></span></a>
								</div>
							</div>
							
							<div class="content">
								<div class="info">
									<div class="date"><?php echo formatDate($p->post_date) ?></div>
								</div>
								
								<div class="title">
									<a href="blog_post.php?p=<?php echo $p->ID ?>"><?php echo $p->post_title ?></a>
								</div>
								
								<div class="text">
									<p><?php echo substr($p->post_content, 0, 400)."..."; ?></p>
								</div>
							</div>
						</article>
						
						<hr  name="post<?php echo $pageNum; ?>" class="post_split <?php if($pageNum > 1) echo "hidden"; ?>"/>
						<?php 
							  $postNum++;
							  if($postNum == 7) {
								  $postNum = 0;
								  $pageNum++;
							  }
						} ?>
						
					</div>
					
					
					<div class="block_pager_1">
						<ul>
							<li class="hidden" id="prev"><a href="#" onclick="prevPage()" class="next">Previous</a></li>
							<?php for($i = 1; $i <= $numOfPages; $i++) { ?>
							<li name="page" id="paging<?php echo $i ?>" class="<?php if($i == 1) echo "current"; ?>"><a href="#" onclick="changePage(<?php echo $i ?>)"><?php echo $i ?></a></li>
							<?php } ?>
							<li id="next" <?php if($numOfPages == 1) echo 'class="hidden"'; ?>><a href="#" onclick="nextPage()" class="next">Next</a></li>
							
						</ul>
						
						<div class="info" id="pagingNums">Page 1 of <?php echo $numOfPages; ?></div>
						
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

        function get_adv_link($url)
        {
	    global $wpdb;
	    $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $url )); 
            $id = $attachment[0]; 
            $attachment = get_post( $id );
            return $attachment->post_excerpt;
        }
?>			