<?php get_template_part('templates/head'); ?>

<span class="tip tip-projects">Projects</span>
<span class="tip tip-programme">Programme</span>
<span class="tip tip-information">Information</span>

<!--Projects-->
<section id="projects">

<div class="section_inside">
	<a class="p-link p-link-projects" href="<?php echo home_url(); ?>/projects/"></a>
	<div class="page-title">
		<h1>Projects</h1>
	</div>
	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','projects'); ?>
		</div>
	</div>
	<div class="single_post">
		<div class="single_tools">
		    <div class="container-fluid">
		        <div class="col-xs-12 col-md-offset-1 col-md-10">
		            <a class="look_programme" href="#">Look up on Programme</a>
		            <a class="back_projects" href="#">Back to Projects</a>
		        </div>
		    </div>
		</div>

		<div class="single_load"><div class="loader"></div></div>
		<div class="p-wrap">
			<div class="p-single">
				
			</div>
		</div>
	</div>
</div>
<?php get_template_part('templates/page','projects-thumbs'); ?>

</section>

<!--Programme-->
<section id="programme">

<div class="section_inside">
	<a class="p-link p-link-programme" href="<?php echo home_url(); ?>/programme/"><span class="tip">Programme</span></a>
	<div class="page-title">
		<h1>Programme</h1>
	</div>
	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','programme'); ?>
		</div>
	</div>
</div>

</section>


<!--Information-->
<section id="information">
<div class="section_inside">
	<a class="p-link p-link-information" href="<?php echo home_url(); ?>/information/"><span class="tip">Information</span></a>
	<div class="page-title">
		<h1>Information</h1>
	</div>

	<div class="p-wrap">
		<div class="p-single">
			<?php get_template_part('templates/page','information'); ?>
		</div>
	</div>
</div>
</section>



<?php get_template_part('templates/footer'); ?>