<?php
$xml_string = "";
require_once("../wp-blog-header.php");
header('Content-Type: application/rss+xml; charset=ISO-8859-1');

$args = array(
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'post',
			'post_status'      => 'publish',
			'exclude'		   => '55',
			'suppress_filters' => true,
			'numberposts'      => 15
		);
		$posts_array = get_posts( $args );

$xml_string .= '<?xml version="1.0" encoding="ISO-8859-1"?>';
$xml_string .= '
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
>

<channel>
	<title>Michigan Tech Lode</title>
	<atom:link href="http://mtulode.com/feed/" rel="self" type="application/rss+xml" />
	<link>http://mtulode.com</link>
	<description>Michigan Tech&#039;s Student Newspaper</description>
	<lastBuildDate>Fri, 18 Nov 2016 22:06:04 +0000</lastBuildDate>
	<language>en-US</language>
	<sy:updatePeriod>hourly</sy:updatePeriod>
	<sy:updateFrequency>1</sy:updateFrequency>
	<generator>https://wordpress.org/?v=4.6.1</generator>';
	
	
	foreach($posts_array as $p):
	$xml_string .= '
	<item>
		<title>'.htmlentities($p->post_title).'</title>
		<link>http://mtulode.com/blog_post.php?p='.$p->ID.'</link>
		<pubDate>'.mysql2date('D, d M Y H:i:s +0000', $p->post_date, false).'</pubDate>
		<dc:creator><![CDATA['.get_the_author_meta('display_name', $p->post_author).']]></dc:creator>
		<category><![CDATA['.get_the_category($p->ID)[0]->name.']]></category>

		<guid isPermaLink="false">"http://mtulode.com/?p='.$p->ID.'</guid>
		<description><![CDATA['.htmlentities(substr($p->post_content, 0, 360)).']]></description>
		<content:encoded><![CDATA['.htmlentities($p->post_content).']]></content:encoded>

	</item>';
	 endforeach;
	$xml_string .= '
</channel>
</rss>';
echo $xml_string;
