<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>	
<div class="wrapper d-flex align-items-stretch">
	<nav id="sidebar" class="">
		<div class="p-4 pt-5">
      <div id="site-title" class="mb-4">
        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?>
        <?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<div id="site-description">'.bloginfo( 'description' ).'</div>'; } ?>
      </div>
      <div id="site-logo" class="mb-4">
  		<?php
        if ( has_custom_logo() )
        {
          the_custom_logo();
        }
      ?>
      </div>
  		<?php
      if ( has_nav_menu( 'main-menu' ) )
      {
        wp_nav_menu( array( 'theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'list-unstyled components mb-5', 'walker'          => new Primary_Walker_Nav_Menu() ) );
      }
      ?>

    <div class="footer">
      <?php get_search_form();?>
    </div>

  </div>
  <?php get_sidebar();?>
</nav>

<!-- Page Content  -->
  	<div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

        	<?php
          if ( has_nav_menu( 'extra-menu' ) )
          {
            wp_nav_menu( array( 'theme_location' => 'extra-menu', 'container' => false, 'menu_class' => 'nav navbar-nav ml-auto', 'walker' => new Extra_Walker_Nav_Menu() ) );
          }
          ?>
        </div>
      </div>
    </nav>
    <div class="row">