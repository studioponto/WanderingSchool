<div class="day-event">
<?php
$description = get_field('description');
$project = get_field('related_project');
$date = get_field('date');
$start_t = get_field('start_time');
$end_t = get_field('end_time');
$show_end_t = get_field('show_end_time');
$room = get_field('room');
?>

<?php 
    $ysd = substr($date, 0, 4);
    $msd = substr($date, 4, 2);
    $dsd = substr($date, 6, 2);
    $timesdquery = strtotime("{$dsd}-{$msd}-{$ysd}");
?>

<div class="event_time">
<?php echo $start_t;?>
<?php if($show_end_t):?>
    — 
<?php echo $end_t;?>
<?php endif;?>

<?php if($room):?>
    at 
    <?php foreach( $room as $post):?>
        <?php setup_postdata($post); ?>
            <?php the_title(); ?>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif;?>
</div>

<div class="event_title">
    <?php if( $project ): $post = $project; setup_postdata( $post );  ?>
        <span><?php the_title(); ?></span>: 
    <?php wp_reset_postdata();  ?>
    <?php endif;?>
    <?php the_title();?>
</div>


</div>