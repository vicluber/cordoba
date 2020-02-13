<?php
/*
    ====================================
      Loading scripts
    ====================================
 */


function will_load_scripts()
{
    wp_enqueue_style('will-style-with-bootstrap-css', get_stylesheet_uri());
    //wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('Jquery-slim', 'https://code.jquery.com/jquery-3.4.1.slim.min.js');
    wp_enqueue_style('Font-Awesome', 'https://use.fontawesome.com/releases/v5.7.1/css/all.css');
    wp_enqueue_script('Popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
    wp_enqueue_script('Bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');

    //wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts', 'will_load_scripts');


/*
    ====================================
      Menu registering
    ====================================
 */


function will_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'The main menu' ),
      'extra-menu' => __( 'The extra menu' )
    )
  );
}
add_action( 'init', 'will_menus' );


/*
    ====================================
      Custom menu with walker
    ====================================
 */


class Primary_Walker_Nav_Menu extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if ( array_search( 'menu-item-has-children', $item->classes ) )
        {
            $output .= sprintf( "\n<li><a href='#menuId-".$item->post_name."' data-toggle=\"collapse\" aria-expanded=\"false\" class=\"dropdown-toggle\"  >".$item->title."</a>\n", ( array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ) ) ? 'active' : '', $item->url, $item->title );
            $this->menu = $item->post_name;
        } else {
            $output .= sprintf( "\n<li %s><a href='%s'>%s</a>\n", ( array_search( 'current-menu-item', $item->classes) ) ? ' class="active"' : '', $item->url, $item->title );
        }
    }

    function start_lvl(&$output, $depth = 0, $args = NULL) {
        $indent = str_repeat( "\t", $depth );
        $output .= '<ul class="collapse list-unstyled" id="menuId-'.$this->menu.'">';
    }
}
class Extra_Walker_Nav_Menu extends Walker_Nav_Menu {

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( array_search( 'menu-item-has-children', $item->classes ) )
    {
        if(array_search( 'current-menu-item', $item->classes ) || array_search( 'current-page-parent', $item->classes ))
        {
          $output .= '<div class="nav-item dropdown active"><a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="'.$item->url.'">'.$item->title.'</a>';
        }
        else
        {
          $output .= '<div class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="'.$item->url.'">'.$item->title.'</a>';
        }
    }
    else
    {
      if(array_search( 'current-menu-item', $item->classes ))
      {
        $output .= '<li class="nav-item active"><a class="nav-link active" href="'.$item->url.'">'.$item->title.'</a></li>';
      }
      else
      {
        $output .= '<li class="nav-item"><a class="nav-link" href="'.$item->url.'">'.$item->title.'</a></li>';
      }
    }
  }
}


/*
    ====================================
      Sidebars registering
    ====================================
 */


function will_widgets_init()
{
  register_sidebar(array(
    'name' => esc_html__('Main widget area', 'will'),
    'id' => 'main-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
  /*THIS SIDEBAR IS NOT DEFINED ANYWHERE*/
  register_sidebar(array(
    'name' => esc_html__('Posts releated area', 'will'),
    'id' => 'posts-releated-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
}
add_action('widgets_init', 'will_widgets_init');


/*
    ====================================
      Adding theme support
    ====================================
 */

add_theme_support('html5', array('search-form'));
add_theme_support( 'custom-logo', array(
    'height'      => 120,
    'width'       => 120,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
) );
add_theme_support( 'title-tag' );
?>