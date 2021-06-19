<?php get_header(); ?>

<div class="content_wrapper">

	<div class="left_content">

		<?php

		if (have_posts()) :
			while (have_posts()) : the_post(); ?>
				<article>
					<h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>

					<a href="<?php the_permalink(); ?>">
						<div class="featured_image">
							<?php the_post_thumbnail(); ?>
						</div>
					</a>

					<div class="post_meta">
						Posted By: <?php the_author_posts_link(); ?> | Posted On: <?php the_date('F j, Y'); ?> at <?php the_time('g:i a') ?> | Posted In: <?php the_category(', '); ?> | <?php comments_popup_link('No Comment', '1 Comment', '% Comments', 'my_comments', 'Comment Off') ?>
					</div>
					<p> <?php excerpt(30); ?></p>
				</article>
		<?php endwhile;
		else :
			echo "No post Found!";
		endif;
		?>
	</div>

	<?php get_sidebar(); ?>

	<br class="clear" />
	<?php if (function_exists("pagination")) {
		pagination($additional_loop->max_num_pages);
	} ?>

</div>

<?php get_footer(); ?>