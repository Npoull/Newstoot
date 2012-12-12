
		<style>
			#badge{
				height:400px;
				width:400px;
				background: url('<?php bloginfo('template_url');?>/img/groupie_big.png');
				background-size: 100%;
			
				float: right;
				position: relative;
				top:100px;
				
				
				}
				
				#badge h1{
					position: relative;
					top:5%;
					left: 30%;
					font-size: 300px;
				}
				
				.content{
					max-height: 480px;
					overflow: scroll;
				}
				
				.content img{
					max-width: 100%;
				}
		</style>
		<?php 
		
				$comments = get_comments(array("post_id"=>$post->ID));
					
					
					
					//claculates the rating
					$rating = calculateRating($comments);
					?>
		<div id="post-main">
				<div id="badge">
					<h1><?php echo $rating;?></h1>
					
				</div>
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
				
			if(empty($comments)){
						echo "<h1>No Comments yet</h1>";
					}else{
					
				
					listComments($comments);
					}
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
				<input type="hidden" name="old" value="<?php echo "http://localhost:8888/#".$_SERVER['REQUEST_URI'];?>"/>
				<input type="hidden" name="post_id" value="<?php echo $post->ID;?>"/>
				<input type="submit" class="btn" />
			</form>

			</section><!--end comment form-->
		
		
		</section><!--end coments-->
		
	