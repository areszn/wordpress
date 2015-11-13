
<?php get_header(); ?>
<div id="primary" class="site-content">
	<section class="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content' ); ?>
	</section>
	<!-- #content -->
	<?php comments_template( '', true ); ?>
	<?php endwhile; ?>
</div>
<!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?> 