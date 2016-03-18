<?php
$participant = get_field('participant');
?>

<div class="thumb col-xs-12 col-md-6" data-thumb="<?php echo basename(get_permalink()); ?>">
	<a href="<?php the_permalink() ?>">
		<div class="thumb_info">

			<div class="thumb_title"><?php the_title(); ?></div>
			<?php if($participant):?>
			<div class="thumb_participant">
				<?php $i = 0; foreach( $participant as $post): $i++; ?><?php setup_postdata($post); ?><?php if ($i == 1) {echo 'By '; } else {echo ', '; }?><?php the_title(); ?><?php endforeach; ?><?php wp_reset_postdata(); ?>
			</div>
			<?php endif;?>
		</div>
	</a>
</div>