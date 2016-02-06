<?php
$bio = get_field('biography');
$participant = get_field('participant');
$room = get_field('room');
?>

<?php if (has_post_thumbnail()) {
	the_post_thumbnail('full');
}?>

<?php echo $bio;?>

Projects
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

Events
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