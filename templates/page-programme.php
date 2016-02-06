<article>

<div class="container-fluid">
<div class="day-wrap hide"><div class="day-title col-xs-4">Programme</div><div class="day-content col-xs-8">
<?php if ( have_posts() ) : ?>
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
	echo '</div></div><div class="day-wrap"><div class="day-title col-xs-4">' . date('D, d F', $timesdquery) . '</div><div class="day-content col-xs-8">';
} ?>


<?php get_template_part('templates/content','events-thumb'); ?>


<?php $prev_day = date('d', $timesdquery); $prev_month = date('F', $timesdquery); ?>
<?php endwhile; ?>

<?php wp_reset_query(); ?>
<?php endif; ?>
</div>
</div>



</article>