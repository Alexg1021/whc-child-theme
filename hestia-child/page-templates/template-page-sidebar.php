<?php
/**
 * Template Name: Page with Sidebar
 *
 * The template for displaying simple page with sidebar
 *
 * @package Hestia
 * @since Hestia 1.1.49
 * @author Themeisle
 */

get_header();

/**
 * Don't display page header if header layout is set as classic blog.
 */
do_action( 'hestia_before_single_page_wrapper' ); ?>

<div class="<?php echo hestia_layout(); ?>">
	<?php
	$class_to_add = '';
	if ( class_exists( 'WooCommerce' ) && ! is_cart() ) {
		$class_to_add = 'blog-post-wrapper';
	}
	?>
	<div class="row">
		<div class="col-md-8">
			<div class="blog-post <?php esc_attr( $class_to_add ); ?>">
					<div class="container">
						<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'page' );
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							endwhile;
						else :
							get_template_part( 'template-parts/content', 'none' );
						endif;
						?>
					</div>
				</div>
		</div>
		<div class="col-md-4">
			<div id="sidebar-primary" class="sidebar">
    			<?php dynamic_sidebar( 'whc-primary' ); ?>
			</div>
		</div>
	</div>
	
    <?php 
    get_footer(); ?>
