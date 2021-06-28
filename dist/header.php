<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="container header" id="header-sticky">
        <div class="row">
            <div class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                <a class="navbar-brand" href="#">
                <?php
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                
                if ( has_custom_logo() ) {
                    echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                }
			?>
                    <img class="logo" src="./images/logo.svg" alt="Logo">
                </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar">
                <nav class="navbar-nav m-auto">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-main', 'menu_id' => 'menu-main' ) ); ?>
                        <a class="nav-link" href="#">About</a>
                        <a class="nav-link" href="#">Product</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link" href="#">Resources</a>
                        <a class="nav-link" href="#">Jobs</a>
                </nav>
                <div class="btn-wrap">
                    <div class="btn btn-login">Login</div>
                    <div class="btn btn-signup">Sign up</div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </header>
    <main>