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
	<div class="col-xs-9">
		<?php the_content(); ?>
	</div>

	<div class="col-xs-3 sidebar">
		<?php if( have_rows('sidebar') ): while ( have_rows('sidebar') ) : the_row();?>
        <?php if( get_row_layout() == 'image' ):
        	$image = get_sub_field('image');
        	$caption = get_sub_field('caption');
        	?>
        	<div class="sidebar_div">
        	<img src="<?php echo $image;?>">
        	<?php if($caption):?>
        		<div class="caption"><?php echo $caption;?></div>
        	<?php endif;?>
        	</div>
        <?php elseif( get_row_layout() == 'text' ): ?>
        <?php endif; endwhile; endif;?>
    </div>


</div>
</article>
<?php endwhile; ?>
<?php endif; ?>