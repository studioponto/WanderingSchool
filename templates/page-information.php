<?php $my_query = new WP_Query('page_id=7'); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;?>
<article <?php post_class(); ?>>
<div class="container-fluid">
	<div class="col-xs-12">
		<?php the_content(); ?>
	</div>
</div>
</article>
<?php endwhile; ?>