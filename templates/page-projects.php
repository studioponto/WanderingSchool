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
<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
  <?php get_template_part('templates/content'); ?>
  <?php if ($i % 1 == 0) echo '<div class="clearfix"></div>'?>
<?php endwhile; ?>
</div>

<?php wp_reset_query(); ?>

</article>