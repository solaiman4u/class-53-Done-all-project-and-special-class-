<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package industry
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<div <?php if(has_post_thumbnail()) : ?> style="background-image: url(<?php the_post_thumbnail_url('large') ?>);"<?php endif; ?> class="industry-page-title-area">
	<div class="container">
		<div class="row ">
			<div class="col-md-12 text-<?php echo $text_title_direction; ?>">				
				<h2><?php the_title(); ?></h2>		
				<?php if(function_exists('bcn_display')){bcn_display(); } ?>
				<div class="entry-meta">
					<?php
						industry_demo_posted_on();
						industry_demo_posted_by();
					?>
				</div><!-- .entry-meta -->
			</div>
		</div>
	</div>
</div>


	<div id="primary" class="content-area industry-content-area-padding">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">				
				<?php if(get_post_type() == 'industry-isotop' && is_active_sidebar('isotop')) : ?>
				    <div class="col-md-4">
				        <div class="isotop-page">
				            <?php dynamic_sidebar('isotop') ?>
				        </div>
				    </div>				    
				<?php endif; ?>
				
					<div class="<?php if(get_post_type() == 'industry-isotop') : ?><?php if(is_active_sidebar('isotop')): ?>col-md-8<?php else : ?>col-md-10 col-md-offset-1<?php endif; ?><?php else:?>col-md-8<?php endif; ?>">
						<?php	
							get_template_part( 'template-parts/content', get_post_type() );

							if (get_post_type() != 'industry-isotop') { the_post_navigation(); }

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;							
						?>
					</div>
					
					<?php if(get_post_type() != 'industry-isotop') { get_sidebar(); } ; ?>
					
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php endwhile; ?> <!--End of the loop.--> 

<?php
get_footer();
