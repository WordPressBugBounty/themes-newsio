<?php
/**
 * The template for displaying archive pages
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package newsio 
 */
get_header(); 
get_template_part('template-parts/site','breadcrumb');
$newsio_archive_blog_pages_style_layout = get_theme_mod('newsexo_archive_blog_pages_style_layout', 'list_view');
	if($newsio_archive_blog_pages_style_layout == 'grid_view' || $newsio_archive_blog_pages_style_layout == 'standrad_view'){
		$blog_layout_class = 'blog-grid-view-post';
	}
	else { $blog_layout_class = 'blog-list-view-post'; }
$newsio_archive_blog_pages_layout = get_theme_mod('newsexo_archive_blog_pages_layout', 'newsexo_right_sidebar');
$newsio_archive_blog_container_size = get_theme_mod('newsexo_archive_blog_container_size', 'container-full');
?>

<section class="blog-list-view-post">

	<div class="container-full">
	
		<div class="row <?php if($newsio_archive_blog_pages_layout == 'newsexo_left_sidebar'){echo 'sidebar-space-control';} ?>">
		
			<?php if($newsio_archive_blog_pages_layout == 'newsexo_left_sidebar' ||  !$newsio_archive_blog_pages_layout == 'newsexo_no_sidebar'): ?>
			<!--/Blog Section-->
			<?php  get_sidebar(); ?>
			<?php endif; ?>
		
			<?php if($newsio_archive_blog_pages_layout == 'newsexo_no_sidebar'): ?>
		        <div class="col-lg-12 col-md-12 col-sm-12">	
            <?php else: ?>  
                <div class="col-lg-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' : '8' ); ?> col-md-<?php echo ( !is_active_sidebar( 'sidebar-main' ) ? '12' : '6' ); ?> col-sm-12">
            <?php endif; ?>	
				<div class="row">
				<?php 
				if ( have_posts() ) :
				// Start the loop.
					while ( have_posts() ) : the_post();
					
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
					     get_template_part( 'template-parts/content', 'archive' );	
			
					endwhile;
					
			    // End the loop.
						
				
		            // Pgination.
					the_posts_pagination( array(
						'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
						'next_text'          => '<i class="fa fa-angle-double-right"></i>'
					) );
					
				// If no content, include the "No posts found" template.	
					
			    else :
				
			        get_template_part( 'template-parts/content', 'none' );
					
	        	endif;
				
				?>
				</div>
			</div>	
			
			<?php if($newsio_archive_blog_pages_layout == 'newsexo_right_sidebar' ||  !$newsio_archive_blog_pages_layout == 'newsexo_no_sidebar'):
			     get_sidebar();
			endif; ?>
			
		</div>
		
	</div>
	
</section>
<?php get_footer(); ?>