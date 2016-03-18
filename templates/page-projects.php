<article>

<?php
$args = array(
  'paged' => $paged,
  'posts_per_page' => -1,
  'order'    => 'ASC',
  'orderby' => 'title'
);
query_posts($args);
?>
<div class="container-fluid">
	<div class="row"><div class="col-xs-12 col-md-10 col-md-offset-1"><div class="grid">
<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
  <?php get_template_part('templates/content'); ?>
  
<?php endwhile; ?>
	</div></div></div>
</div>

<?php wp_reset_query(); ?>

</article>