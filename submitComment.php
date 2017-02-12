<?php
require_once("./wp-blog-header.php");
if(isset($_POST['name']) && !empty($_POST['name']) &&
   isset($_POST['email']) && !empty($_POST['email']) &&
   isset($_POST['comment']) && !empty($_POST['comment']) &&
   isset($_POST['id']) && !empty($_POST['id'])) 
   {
		$name = $_POST["name"];
		$email = $_POST["email"];
		$comment = $_POST["comment"];
		$id = $_POST["id"];
		$time = current_time('mysql');

		$data = array(
			'comment_post_ID' => $id,
			'comment_author' => $name,
			'comment_author_email' => $email,
			'comment_content' => $comment,
			'comment_type' => '',
			'comment_parent' => 0,
			'comment_author_IP' => getUserIP(),
			'comment_date' => $time,
			'comment_approved' => 1,
		);

		wp_insert_comment($data);
		

   }
   else
   {

   }

   function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
?>