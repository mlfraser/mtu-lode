<?php require_once("./wp-blog-header.php");

 ?>
<html>

<head>
<title>Archives</title>

<meta name="keywords" content="">
<meta name="description" content="">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--[if lt IE 9]>
<script type="text/javascript" src="layout/plugins/html5.js"></script>
<![endif]-->

<link rel="stylesheet" href="wp-includes/css/style.css" type="text/css">
<link rel="stylesheet" href="wp-includes/css/datatables.min.css" type="text/css">

<script type="text/javascript" src="wp-includes/js/jquery.js"></script>
<script type="text/javascript" src="wp-includes/js/plugins.js"></script>
<script type="text/javascript" src="wp-includes/js/main.js"></script>
<script type="text/javascript" src="wp-includes/js/validator.min.js"></script>
<script type="text/javascript" src="wp-includes/js/datatables.min.js"></script>

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
		</header>
		<!-- HEADER END -->
		
		<!-- CONTENT BEGIN -->
		<div id="content">
			<div class="inner">
				<div class="block_general_title_2">
					<h1>ARCHIVES</h1>
				</div>
				
				<div class="main_content">
					<div class="block_content">
                        
                        <?php $args = array(
                            'posts_per_page'   => -1,
                            'orderby'          => 'date',
                            'order'            => 'DESC',
                            'exclude'          => '55',
                            'post_type'        => 'post',
                            'post_status'      => 'publish',
                            'suppress_filters' => true 
                        );
                        $posts_array = get_posts( $args ); ?>
						
                        <table id="search" class="display" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($posts_array as $p) { 
                                    $categories = get_the_category($p->ID);
                                    $tags = get_the_tags($p->ID);
                                ?>
                                
                                <tr>
                                    <td><?php echo formatDate($p->post_date); ?></td>
                                    <td><a href="blog_post.php?p=<?php echo $p->ID;?>"><?php echo $p->post_title; ?></a></td>
                                    <td><center><?php 
                                        $numItems = count($categories);
                                        $i = 0;
                                        foreach($categories as $c) { 
                                            if(++$i === $numItems) {
                                                echo $c->name;
                                            }
                                            else{
                                                echo $c->name.", "; 
                                            }
                                        }   ?>
                                        </center></td>
                                    <td><center>
                                        <?php 
                                            $numItems = count($tags);
                                            $i = 0;
                                            foreach($tags as $t) { 
                                                if(++$i === $numItems) {
                                                    echo $t->name;
                                                }
                                                else{
                                                    echo $t->name.", "; 
                                                }
                                            } ?>
                                        </center></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        
					</div>
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
    <script>
        $(document).ready(function() {
            $('#search').DataTable();
        } );    
    </script>
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
		
		return $returnString." ".substr($date, 0, 4);
	}
?>