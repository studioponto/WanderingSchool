<!--Projects-->
<section id="projects" class="active">
	<a class="p-link" href="<?php echo home_url(); ?>/projects/"></a>
	<div class="p-wrap">
		<div class="p-single">

<?php
$args = array(
  'paged' => $paged,
  'posts_per_page' => -1,
);
query_posts($args);
?>
<div class="container-fluid">
<?php $i = 0; ?>
<?php while (have_posts()) : the_post(); $i++; ?>
  <?php get_template_part('templates/content'); ?>
  <?php if ($i % 2 == 0) echo '<div class="clearfix"></div>'?>
<?php endwhile; ?>
</div>

<?php wp_reset_query(); ?>

		</div>
	</div>
</section>

<!--Programme-->
<section id="programme" class="close">
	<a class="p-link" href="<?php echo home_url(); ?>/programme/"></a>
	<div class="p-wrap">
		<div class="p-single">
			programme
		</div>
	</div>
</section>

<!--Floorplan-->
<section id="floorplan" class="close">
	<a class="p-link" href="<?php echo home_url(); ?>/floorplan/"></a>
	<div class="p-wrap">
		<div class="p-single">
			floorplan
		</div>
	</div>
</section>

<!--Information-->
<section id="information" class="close">
	<a class="p-link" href="<?php echo home_url(); ?>/information/"></a>
	<div class="p-wrap">
		<div class="p-single">
			information
		</div>
	</div>
</section>