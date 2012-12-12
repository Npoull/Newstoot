<!doctype html>
<html>
	<meta charset="utf-8"/>

	<head>
		<title></title>
		
			
		<!--css-->
		<?php css("style","home");?>
		<?php css("bootstrap.min");?>
	</head>
	<body>
		<header>
			<div class="wrapper">
				<div id="post-title">
				   				    <h1 id="site-title"><?php bloginfo('title');?></h1>
				</div>
				
				
			</div>
		</header>
		
		<div id="post-main">
			
			<?php if(have_posts()) : while(have_posts() ) : the_post();?>
			
				<h1 class="post-title"><?php the_title();?></h1>
				
				<div class="content">
					<?php the_content();?>
				</div>
			
			<?php endwhile; else:?>
			<?php endif;?>
			
					
		<section id="comments">
			<section id="comment-list">
				<?php
					$comments = get_comments($post->ID);
					
					
					//claculates the rating
					$rating = calculateRating($comments);
					
					echo $rating;
				
					listComments($comments);
					
				?>
			</section>
		
			
			
			
			
			<section id="comment-form">
			
			<form action="/comment" method="post">
				
				<div class="form-item">
					<h2>Name</h2>
					<input type="text" name="commenter"/>
				</div>
				
				<div class="form-item">
					<h2>Email</h2>
					<input type="text" name="email"/>
				</div>
				
				
				<div class="form-item">
					<h2>Comment</h2>
					<textarea name="comment"></textarea>
				</div>
				
				
				<div class="form-item">
				    <h4>Rating</h4>
				    <select name="rating">
				    	<option value="0"></option>
				    	<option value="1">1</option>
				    	<option value="2">2</option>
				    	<option value="3">3</option>
				    	
				    </select>
				    	
				</div>				
				<input type="hidden" name="old" value="<?php echo $_SERVER['REQUEST_URI'];?>"/>
				<input type="submit" class="btn" />
			</form>

			</section><!--end comment form--<
		
		
		</section><!--end coments-->
		
		
		</div><!--end post-main-->
		<script type="text/javascript" src="//use.typekit.net/iik2eji.js"></script>
		<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
		<?php js("Jquery");?>
		<?php js("App");?>
	</body>
</html>
