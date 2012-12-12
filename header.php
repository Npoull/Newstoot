<style>
	.screen-reader-text{
		display: none;
	}
	
	#searchsubmit{
		display: none;
	}
	
	#s{
		font-style: italic;
		color:rgba(100,100,100,0.5);
	}
</style>

<header>
	<div class="wrapper">
		<div id="title">
			<h1 id="site-title"><?php bloginfo('title');?></h1>
		</div>
		
		<div class="closes" style="float:right;">
			<?php get_search_form();?>
		</div>		
	</div>
</header>

