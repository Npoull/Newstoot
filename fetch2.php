<?php

/*
	Template Name: Fetch2
	
	engadget
*/
header("Content-Type:application/json");
	$raw = array();
	if(isset($_GET['url'])){
		
	
		$url = $_GET['url'];
			
		$data = file_get_contents($url);
			
			
		
		
		$parse = simplexml_load_string($data,"SimpleXMLElement",LIBXML_NOCDATA);
		print_r($parse);
	
		foreach($parse->channel->item as $key => $value){
			$article = array(
					"post_title"=>$value->title,
					"post_content"=>$value->description,
					"post_status"=>"publish",
					"post_author"=>"1",
				
				);
				
			
				$title = get_page_by_title($value->title,"OBJECT","post");
				
				if($title == ""){
					$id = wp_insert_post($article);
				
					//add some meta fields we need so that we can get other attributes
					add_post_meta($id,"author",$value->author->name,true);
					add_post_meta($id,"link",$value->id);
				}


			
		}
		
		
		
		
	}
	
	