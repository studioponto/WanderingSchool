<?php wp_footer(); ?>

<script type="text/javascript">
	$(window).load(function() {
		setTimeout(function(){
			$("#spinner").fadeOut(700);
		}, 3000);
		setTimeout(function(){
			$(".wrap-section").removeClass('splash-active');
		}, 3700);
	});
</script>

</body>
</html>