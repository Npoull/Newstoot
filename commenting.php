<?php

	/*
		Template Name:Commenting
	*/
	


	
	$old = $_POST['old'];
	
	$time = current_time('mysql');
	
	$data = array(
		"comment_post_ID"=>$_POST['post_id'],
		"comment_author"=>$_POST['commenter'],
		"comment_author_email" => $_POST['email'],
		"comment_author_url"=>"",
		"comment_content"=>$_POST['comment'],
		"comment_type"=>"",
		"comment_parent"=>"0",
		"user_id"=>1,
		"comment_author_IP"=> $_SERVER["SERVER_ADDR"],
		"comment_agent" => $_SERVER["HTTP_USER_AGENT"],
		"comment_date"=>$time,
		"comment_approved"=>1,
		
	);
	
	$id = wp_insert_comment($data);
	
	

	//add rating
	$status = add_comment_meta($id,'rating',$_POST['rating'],true);
	
	
	
	header("Location:$old");