<!doctype html>
<html>
	<meta charset="utf-8"/>

	<head>
	
	
		<title></title>
		<style>
		.close{
  
    height:40px;
    width:40px;
    position: relative;
    z-index: 99999;  
    border: none;
    background:url("http://www.theuseragent.com/wp-content/themes/useragent/img/close.gif");
    background-size: 100%;
    display: none;
   
   }
		</style>
		
	
		<!--css-->
		<?php css("style","home");?>
		<?php css("bootstrap.min");?>
	
	</head>
	<body>
			
		<div id="overlay"></div>
		<?php get_header();?>
		
		<?php if(!isset($_GET["s"])){?>
		
		
<section id="main">
		
			<div id="intro">
				<div id="content-wrapper">
					<div class="intro">
						<h2>NewsToot, for all the news thats fit to Toot</h2>
					</div><!--end intro-->
					
					<div id="latest">
						<h2 class="section-title">Latest Articles</h2>
						
						
						
					
					</div><!--end latest-->
					
					
				</div><!--end content-wrapper-->
				
				
			</div><!--end content-->
				<section id="articles">
					<div class="wrapper">					
						
					<div class="article">
					<?php
				    $paged = get_query_var('paged');
				    query_posts("posts_per_page=1&paged=$paged&category_name=Verge");?>
				    <?php if(have_posts()) : while(have_posts() ) : the_post();?>
				    <?php
				    	$comments = get_comments(array("post_id"=>$post->ID));
					
					
					
					//claculates the rating
					$rating = calculateRating($comments);
					?>
				    <div class="article" data-title="<?php the_title();?>" data-permalink="<?php the_permalink();?>" data-thumb="<?php get_the_post_thumbnail();?>">
				    <div class="article-meta">
				  	  <h2>From the Verge</h2>
				    </div>
				        <div class="excerpt"><?php the_excerpt();?></div>
				        
				          <div class="rating-home" style="position:relative;top:12px;">
				        	<h1>Current Rating: <?php echo $rating;?></h1>
				        
				        </div>
					   				    </div>
				
				<?php endwhile; else:?>
				<?php endif;?>
				<?php wp_reset_query();?>
					</div><!--end wrapper-->
					
					
					
				<div class="article">
				
						<?php
				    $paged = get_query_var('paged');
				    query_posts("posts_per_page=1&paged=$paged&category_name=Engadget");?>
				    <?php if(have_posts()) : while(have_posts() ) : the_post();?>
				    <?php
				    	$comments = get_comments(array("post_id"=>$post->ID));
					
					
					
					//claculates the rating
					$rating = calculateRating($comments);
					?>
				    <div class="article" data-title="<?php the_title();?>" data-permalink="<?php the_permalink();?>" data-thumb="<?php get_the_post_thumbnail();?>">
			
				    <div class="article-meta">
				    <h2>From the Engadget</h2>
				    </div>
				        <div class="excerpt"><?php the_excerpt();?></div>
					   
				        <div class="rating-home">
				        	<h1>Current Rating: <?php echo $rating;?></h1>
				        
				        </div>
					   
					     </div>
				
				<?php endwhile; else:?>
				<?php endif;?>
				<?php wp_reset_query();?>

				</div>
					

					
	
			
				<div class="article">
				
						<?php
				    $paged = get_query_var('paged');
				    query_posts("posts_per_page=1&paged=$paged&category_name=Gizmodo");?>
				    <?php if(have_posts()) : while(have_posts() ) : the_post();?>
				    <?php
				    	$comments = get_comments(array("post_id"=>$post->ID));
					
					
					
					//claculates the rating
					$rating = calculateRating($comments);
					?>
				    <div class="article" data-title="<?php the_title();?>" data-permalink="<?php the_permalink();?>" data-thumb="<?php get_the_post_thumbnail();?>">
				     <div class="article-meta">
				    <h2>From Gizmodo</h2>
				    </div>
				              <div class="excerpt"><?php the_excerpt();?></div>
				              
				                <div class="rating-home">
				        	<h1>Current Rating: <?php echo $rating;?></h1>
				        
				        </div>
								    </div>
				
				<?php endwhile; else:?>
				<?php endif;?>
				<?php wp_reset_query();?>

				</div>
					

	
					</div>
	
	
	
	
	
					
		
	
	
	
	
	
	
				</section><!--end articles-->
	
	
					

					
					</div>
				</section><!--end articles-->
	
				<div id="overlay">
				</div>
				
	
	
	
	
		</section><!--end main-->				
		
		
		<?php }else{?>
			<style>
				#search-results{
					
					background: #fc3;
					padding:50px;
				}
			</style>
			<div id="intro">
				<div id="content-wrapper">
					<div class="intro">
						<h2>Search Results</h2>
					</div><!--end intro-->
					
					<div id="latest">
											
						
						
					
					</div><!--end latest-->
					
					
				</div><!--end content-wrapper-->
				
			</div>
		<div id="search-results">
		
			<div class="wrapper">
		
				<?php if(have_posts()) : while(have_posts() ) : the_post();?>
				<?php $perma = get_permalink();
				$perma = str_replace("http://localhost:8888", "", $perma);
					
					
				?>
				
				<a href="http://localhost:8888/#<?php echo $perma;?>">	<h1><?php the_title();?></h1></a>			
			
			<?php endwhile; else:?>
			<?php endif;?>
		

			
			</div>		
		</div>
		<?php }?>
		<script type="text/javascript" src="//use.typekit.net/iik2eji.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php js("Jquery");?>
		<?php js("App");?>
		
		<script>
		
						</script>
	</body>
</html>
