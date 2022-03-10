<!doctype html>
<html lang="en"> 
<head>
  <?php wp_head(); ?>
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;1,200&display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
  <!--container start-->
  <div class="container">
    <!--header section start-->
    <header>
      <div class="wrapper">
        <?php
          if( function_exists('the_custom_logo')) {
            the_custom_logo();
          }
        ?>
        <nav>
          <?php wp_nav_menu(array(
            'theme_location' => 'primary-menu',
            'menu_class' => 'nav-list'
            ))?>
        </nav>
      </div>
    </header>
    <!--header section end-->