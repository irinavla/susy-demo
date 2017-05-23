<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Susy Theme
 * 
 */

get_header(); ?>

<main id="main" class="site-main" role="main">
    <div class="article-layout">
        <?php while ( have_posts() ) : the_post(); ?>
            <article <?php post_class(); ?>>
                <div class="entry-content">
                    <?php the_content(); ?>          
                </div>        
            </article>
        <?php endwhile; ?>

        <aside>
            <?php get_sidebar(); ?>
        </aside>
    </div>   
</main>

<?php get_footer(); ?>