<?php
get_header();

if ( have_posts() ) {

	while (have_posts())
	{
		the_post();
		?>
			<div class="col-md-12 col-lg-8 two-columns" id="post-content">
				<img src="<?php the_post_thumbnail_url();?>" width="100%" height="auto">
				<h2 class="mb-4 mt-4"><?php the_title();?></h2>
				<?php the_content();?>
			</div>
			<div class="col-md-12 col-lg-4">
				<?php get_sidebar('posts');?>
				<?php
					if ( comments_open() || get_comments_number() ) :
					    comments_template('comments.php');
					endif;
				?>
			</div>
			<div class="col-md-8 mb-4 mt-5">
				<div class="row">
			      	<div class="col-lg-6" align="center"><?php previous_post_link();?></div>
			    	<div class="col-lg-6" align="center"><?php next_post_link();?></div>
			    </div>
			</div>
		<?php
	}
}
get_footer(); ?>
