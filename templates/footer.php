</div>
<?php get_template_part('templates/background'); ?>

<?php get_template_part('templates/header'); ?>


<?php wp_footer(); ?>


<script type="text/javascript">
	$(window).load(function() {
		$('.grid').packery({
			percentPosition: true
		});
	});
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-35102715-12', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>