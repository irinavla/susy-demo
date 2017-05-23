<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
    <div class="page">
        <nav>
            <?php 
             $custom_logo_id = get_theme_mod( 'custom_logo' );
             $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );   
             if (!empty($logo)) :
            ?>
           <div class="logo" style="background-image:url('<?php echo $logo[0]; ?>')">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
           </div>
           <?php else : ?>
            <div class="logo">
                <?php bloginfo('title'); ?>       
            </div>
           <?php endif; ?>     
           
           <?php 
            $args = array(
                'theme_location'    => 'header_menu',
                'container'         => false,
                'menu_class'        => 'menu'
            );
            wp_nav_menu($args);
           ?>
            <div class="toggle-menu">
                <div class="menu-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </nav>
       <header>
           <?php if (is_front_page()) : ?>
               <h1 class="main-title"><?php bloginfo('name'); ?></h1>
               <div class="tagline"><?php bloginfo('description'); ?></div>
           <?php else : ?>
                <h1 class="main-title"><?php the_title(); ?></h1>
                <div class="tagline"><?php susy_posted_meta(); ?></div>
           <?php endif; ?>
        </header>
