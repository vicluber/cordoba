<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="col-md-4 col-lg-3" id="post-summary-container">
      <div id="post-summary-title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_title( '<h2>', '</h2>' ); ?>
        </a>
      </div>
      <div id="post-summary-thumbnail">
        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
              the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'style' => 'width: 100%; height: auto;']);
            ?>
          </a>
        <?php endif; ?>
      </div>
      <div id="post-summary-excerpt">
        <?php the_excerpt(); ?>
      </div>
      <div id="post-summary-date"><?php the_date(); ?><span style="float: right;"><?php edit_post_link();?></span></div>
    </div>
<?php endwhile; endif; ?>
<?php get_footer();?>