<?php
$description = get_field('description');
$participant = get_field('participant');
$room = get_field('room');
?>

<?php if (has_post_thumbnail()) {
	the_post_thumbnail('full');
}?>

<?php echo $description;?>