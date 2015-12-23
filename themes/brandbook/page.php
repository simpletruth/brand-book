<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

		<?php
			// show sub pages
			// https://wordpress.org/support/topic/show-sub-page-content-on-a-parent-page
			$pages = get_pages('child_of='.$post->ID.'&sort_column=post_date&sort_order=desc&parent='.$post->ID);
			foreach($pages as $page) {
		?>

			<div class="section" id="<?php echo $page->post_name; ?>">
				<h4><a href="<?php echo get_page_link($page->ID) ?>"><?php echo $page->post_title ?></a></h4>
				<?php echo apply_filters('the_content', $page->post_content); ?>
			</div>

		<?php } ?>

	</main><!-- .site-main -->

	<?php // get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
