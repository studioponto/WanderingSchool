<?php 

/* Page template, or single.php, or any other typical 
    theme file in charge of displaying a whole page */

the_post();

/* Ajax check  */
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') { ?>

	<?php get_template_part('templates/content', 'single'); ?>

<?php } else { ?>

<?php get_template_part('templates/content', 'single'); ?>

<?php get_template_part('templates/head'); ?>

<!--Projects-->
<section id="projects">
	<a class="p-link" href="<?php echo home_url(); ?>/projects/"></a>
	<div class="page-title">
		<h1>Projects</h1>
	</div>
	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','projects'); ?>
		</div>
	</div>
	<div class="single_post">
		<div class="page-title">
			<h1>Close</h1>
		</div>

		<div class="single_load"></div>
		<div class="p-wrap">
			<div class="p-single">
				<?php get_template_part('templates/content', 'single'); ?>
			</div>
		</div>
	</div>
</section>

<!--Programme-->
<section id="programme">
	<a class="p-link" href="<?php echo home_url(); ?>/programme/"></a>
	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','programme'); ?>
		</div>
	</div>
</section>

<!--Floorplan-->
<section id="floorplan">
	<a class="p-link" href="<?php echo home_url(); ?>/floorplan/"></a>
	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','floorplan'); ?>
		</div>
	</div>
</section>

<!--Information-->
<section id="information">
	<a class="p-link" href="<?php echo home_url(); ?>/information/"></a>
	<div class="page-title">
		<h1>Information</h1>
	</div>

	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','information'); ?>
		</div>
	</div>
</section>

<?php get_template_part('templates/footer'); ?>

<?php } ?>

