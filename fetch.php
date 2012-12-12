<?php

/*
	Template Name: Fetch
*/
header("Content-Type:application/json");
	$raw = array();
	if(isset($_GET['url'])){
		
	
		$url = $_GET['url'];
			
		$data = file_get_contents($url);
			
		
		
		$parse = new SimpleXMLElement($data);

		foreach($parse->entry as $key => $value){
			print_r($value);
			if(isset($_GET['display'])){
				$article = array(
					"title"=>$value->title,
					"review"=>$value->content,
					"url"=>$value->id,
					"author"=>$value->author->name
				);
				
				array_push($raw, $article);
			}else{
				
				$article = array(
					"post_title"=>$value->title,
					"post_content"=>$value->content,
					"post_status"=>"publish",
					"post_author"=>"1",
				
				);
				
				/**
					Next we need to make sure we don't have duplicate posts
				*/
				
				$title = get_page_by_title($value->title,"OBJECT","post");
				
				if($title == ""){
					$id = wp_insert_post($article);
				
					//add some meta fields we need so that we can get other attributes
					add_post_meta($id,"author",$value->author->name,true);
					add_post_meta($id,"link",$value->id);
				}
			
								
			}
		}
			
		
		if(isset($_GET['display'])){
			print_r(json_encode($raw));
		}else{
			//echo id of new post if creating post
			print_r(json_encode(array(1)));
		}
		
		
		
	}
	
	