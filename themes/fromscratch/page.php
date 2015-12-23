<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>


	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			</article>
			<!-- /article -->

			<?php
				// show sub pages
				// https://wordpress.org/support/topic/show-sub-page-content-on-a-parent-page
				$pages = get_pages('child_of='.$post->ID.'&sort_column=menu_order&sort_order=asc&parent='.$post->ID);
				foreach($pages as $page) {
				?>

				<article id="<?php echo $page->post_name; ?>">
					<?php $other_page = $page->ID; ?>

					<h2><?php the_field('section_title', $other_page); ?></h2>
					<h1><?php echo get_the_title($other_page); ?></h1>

					<?php the_field('text_description', $other_page); ?>

					<?php $image = wp_get_attachment_image_src(get_field('image_test', $other_page), 'full'); ?>
					<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test', $other_page)) ?>" />

				</article>

			<?php } ?>

		<?php endwhile; ?>

		<?php else: ?>
		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_footer(); ?>
