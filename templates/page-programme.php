<article>

<div class="container-fluid">
<div class="row"><div class="col-xs-12 col-lg-offset-1 col-lg-10">
<div class="day-wrap hide"><div class="day-title col-xs-12">Programme</div><div class="day-content col-xs-8">
<?php
$args = array(
	'post_type'		=> 'events',
	'posts_per_page'	=> -1,
	'meta_key'		=> 'date',
	'orderby'		=> 'meta_value_num',
	'order'			=> 'ASC'
);
?>
<?php query_posts( $args ); ?>
  <?php $i = 0; ?>
  <?php $prev_day = ''; $prev_month = ''; ?>

<?php while ( have_posts() ) : the_post(); $i++; ?>


<?php 
    $datequery = get_field('date');
    $ysd = substr($datequery, 0, 4);
	$msd = substr($datequery, 4, 2);
	$dsd = substr($datequery, 6, 2);
	$timesdquery = strtotime("{$dsd}-{$msd}-{$ysd}");
?>

<?php if(date('d', $timesdquery) != $prev_day || date('F', $timesdquery) != $prev_month) {
	echo '</div></div><div class="day-wrap"><div class="day-title col-xs-12">' . date('l, jS', $timesdquery) . ' of ' . date('F', $timesdquery) . '<hr></div><div class="day-content col-xs-12">';
} ?>


<?php get_template_part('templates/content','events-thumb'); ?>


<?php $prev_day = date('d', $timesdquery); $prev_month = date('F', $timesdquery); ?>
<?php endwhile; ?>

<?php wp_reset_query(); ?>

</div>
</div>
</div></div>



</article>