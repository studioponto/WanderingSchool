<div class="image_wrap">
<?php if (has_post_thumbnail()) {
	the_post_thumbnail('full');
}?>
</div>

<div class="date"><?php the_time('jS F, Y'); ?></div>

<?php previous_post('<div class="nav nav_prev">%</div>', '', 'no'); ?>
<?php next_post('<div class="nav nav_next">%</div>', '', 'no'); ?>