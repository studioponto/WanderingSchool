<?php
$the_slug = 'information';
$args = array(
  'name'        => $the_slug,
  'post_type'   => 'page',
  'post_status' => 'publish',
  'numberposts' => 1
);
$my_posts = get_posts($args);
if( $my_posts ) : ?>
<?php $infoid = $my_posts[0]->ID; $my_query = new WP_Query('page_id='.$infoid); while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID;?>
<article <?php post_class(); ?>>
<div class="container-fluid">
	<div class="col-xs-12 col-lg-10 col-lg-offset-1">
		<?php the_content(); ?>

		<div class="info_extra"><?php the_field('extra_info');?></div>
	</div>

</div>
</article>
<?php endwhile; ?>
<?php endif; ?>

