<?php get_header(); ?>
<?php get_template_part('menu'); ?>
<?php get_template_part('slider'); ?>

<div class="main_wrap content_bg">
	<div class="wrap">
		<div id="content_wrapper">
			<div id="content">

				<?php
				if (have_posts()) :
					while (have_posts()) : the_post(); ?>

						<article id="main_article_single">

							<h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>

							<div id="imgp_wrap">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								<p> <?php excerpt(50); ?></p>
							</div>

						</article>


				<?php endwhile;
				endif;
				?>
				
				<?php if (function_exists("pagination")) {
					pagination($additional_loop->max_num_pages);
				} ?>

			</div>

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<?php get_footer(); ?>