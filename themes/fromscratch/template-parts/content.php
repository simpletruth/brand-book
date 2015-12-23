<?php
/**
 * The template part for displaying content
 */
?>


<h2><?php the_field('section_title', $other_page); ?></h2>
<?php the_field('text_description', $other_page); ?>
<?php $image = wp_get_attachment_image_src(get_field('image_test', $other_page), 'full'); ?>
<img src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title(get_field('image_test', $other_page)) ?>" />
