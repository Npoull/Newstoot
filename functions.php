<?php


	function css($file,$root=null){
		
		if($root == null){
			$file = get_bloginfo('template_url')."/css/$file.css";
		
		}else{
			$file = get_bloginfo('template_url')."/$file.css";
		}
		
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$file\"/>";
	}
	
	
	function js($file,$root=null){
		
		if($root == null){
			$file = get_bloginfo('template_url')."/js/$file.js";
		
		}else{
			$file = get_bloginfo('template_url')."/$file.js";
		}
		
		echo "<script type=\"text/javascript\" src=\"$file\"></script>";	
		
	}
	
	
	function calculateRating($comments){
		$rating = 0;
		foreach($comments as $key=>$value){
			$meta = get_comment_meta($value->comment_ID,"rating");
			if(!empty($meta)){
				$rating += $meta[0];
			}
		}
	
		return $rating;
	}
	
	
	function listComments($comments){
		foreach($comments as $key=>$value){
			echo "<div class=\"comment\">";
			echo "<h2 class=\comment-author\">$value->comment_author says:</h2>";
			echo "<p class=\"comment-comment\">$value->comment_content</p>";
			echo "</div>";
		}
	}