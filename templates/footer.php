</div>
<?php get_template_part('templates/background'); ?>

<?php get_template_part('templates/header'); ?>


<?php wp_footer(); ?>


<script type="text/javascript">
	$(window).load(function() {
		setTimeout(function(){
			$("#spinner").addClass('loadcomplete');
			$("#spinner").fadeOut(100);
		}, 3000);
		setTimeout(function(){
			$(".wrap-section").removeClass('splash-active');
		}, 3700);

		setTimeout(function(){
			var post_div = $('#information');
		    var post_div_id = $(post_div).attr("id");

		    $('section').removeClass('close');
		    $('section').removeClass('active');
		    $(post_div).addClass('active');
		    $(post_div).prevAll().addClass('close');
		    $(post_div).nextAll().addClass('close');

		    $('#back_'+post_div_id).addClass('active');
		    $('#back_'+post_div_id).prevAll().addClass('close');
		    $('#back_'+post_div_id).nextAll().addClass('close');
		}, 0);

		


	});
</script>

</body>
</html>