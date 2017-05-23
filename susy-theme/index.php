<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * 
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Susy Theme
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
        <div class="basic-grid">
        <?php 
            $args = array(
                'posts_per_page'=> 5, 
                'ignore_sticky_posts'=> true,  
            );
            $query = new WP_Query($args);
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();              
        ?>        
        <article>
            <?php if (has_post_thumbnail()): ?>
            <div class="thumb medium-thumb background-image" style="background-image:url('<?php the_post_thumbnail_url('full'); ?>');">
            <a href="<?php the_permalink(); ?>" class="thumb-link" title="<?php the_title(); ?>"></a>
            </div>
            <?php endif; ?>

            <a href="<?php the_permalink(); ?>" class="entry-title">
                 <?php the_title( '<h2>', '</h2>' ); ?>
            </a>  
            <?php echo susy_custom_excerpt(); ?>        
        </article>           
        <?php 
                } 
            wp_reset_postdata();
            }  
        ?>
        </div><!-- .basic-grid -->
        
        <?php 
            $args2 = array(
                'posts_per_page'         => 14,
                'offset'                 => 5,
                'ignore_sticky_posts'    => true,   
            );
            $query2 = new WP_Query( $args2 );
            if ( $query2->have_posts() ) {   
                $i = 1;
                echo '<div class="wide-grid">';
                while ( $query2->have_posts() ) {
                    $query2->the_post();              
        ?>        
            <article>

            <?php if (has_post_thumbnail()): ?>
                <div class="thumb small-thumb background-image" style="background-image:url('<?php the_post_thumbnail_url('full'); ?>');">
                <a href="<?php the_permalink(); ?>" class="thumb-link" title="<?php the_title(); ?>"></a>
                </div>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>" class="entry-title">
                     <?php the_title( '<h3>', '</h3>' ); ?>
                </a>    
                <?php echo susy_custom_excerpt(); ?>        
            </article> 
            
            <?php 
            if ($i % 7 == 0) {
                // close the row at every 7th post
                echo '</div><div class="wide-grid">';
            }
                
            $i++;
                }
            echo '</div>';
            
            wp_reset_postdata();
            }         
        ?>
       

    </main><!-- #main -->

<?php get_footer(); ?>