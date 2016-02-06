<?php
$args = array(
  'paged' => $paged,
  'posts_per_page' => -1,
);
query_posts($args);
?>
<div id="project_thumbs">
<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
  <?php get_template_part('templates/content', 'thumb'); ?>
<?php endwhile; ?>
</div>
<?php wp_reset_query(); ?>