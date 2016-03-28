<?php if( have_rows('events') ): ?>



    <?php while( have_rows('events') ): the_row(); ?>

<?php
$description = get_sub_field('event_title_links');
$location = get_sub_field('location');
$start_t = get_sub_field('start_time');
$end_t = get_sub_field('end_time');
$show_end_t = get_sub_field('show_end_time');
?>

<div class="day-event">
<div class="event_time">
<?php echo $start_t;?>
<?php if($show_end_t):?>
    <Br/>— 
<?php echo $end_t;?>
<?php endif;?>

</div>

<div class="event_title">
    <?php echo $description;?>
</div>
<div class="event_location">
<?php echo $location;?>
</div>
</div>



    <?php endwhile; ?>


<?php endif; ?>


<hr>