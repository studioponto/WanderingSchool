<?php
$description = get_field('description');
$project = get_field('related_project');
$date = get_field('date');
$start_t = get_field('start_time');
$end_t = get_field('end_time');
$show_end_t = get_field('show_end_time');
?>

<?php if (has_post_thumbnail()) {
    the_post_thumbnail('full');
}?>

<?php echo $description;?>

<?php echo $date;?>

<?php echo $start_t;?>
<?php if($show_end_t):?>
    — 
<?php echo $end_t;?>
<?php endif;?>


<?php if( $project ): $post = $project; setup_postdata( $post );  ?>
    <div>
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </div>


    <?php
    $participant = get_field('participant');
    $room = get_field('room');
    ?>

    <?php if($participant):?>
        <ul>
        <?php foreach( $participant as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>

    <?php if($room):?>
        <ul>
        <?php foreach( $room as $post): // variable must be called $post (IMPORTANT) ?>
            <?php setup_postdata($post); ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endforeach; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php endif;?>



    <?php wp_reset_postdata();  ?>
<?php endif; ?>

