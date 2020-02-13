<?php get_header();?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_title( '<h2>', '</h2>' ); ?>
        </a>


        <?php if ( has_post_thumbnail() ) : ?>
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php
              the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full', 'style' => 'width: 100%; height: auto;']);
            ?>
          </a>
        <?php endif; ?>


        <?php the_excerpt(); ?>

<?php endwhile; endif; ?>
<?php get_footer();?>