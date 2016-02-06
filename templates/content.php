<?php
$participant = get_field('participant');
?>

<div class="thumb col-xs-12 col-md-offset-1 col-md-10" data-thumb="<?php echo basename(get_permalink()); ?>">
	<a href="<?php the_permalink() ?>">
		<div class="thumb_info">
			<?php $terms = get_the_terms( $post->ID, 'category' ); if ( $terms && ! is_wp_error( $terms ) ) :  $category = array(); foreach ( $terms as $term ) { $category[] = $term->name; }	
				$categories = join( " / ", $category );
			?>
			<div class="thumb_cat"><?php echo $categories; ?></div>
			<?php endif; ?>

			<div class="thumb_title"><?php the_title(); ?></div>
			<?php if($participant):?>
			<div class="thumb_participant">
				<?php $i = 0; foreach( $participant as $post): $i++; ?><?php setup_postdata($post); ?>
					<?php if ($i == 1) {echo ''; } else {echo ' , '; }?>
					<?php the_title(); ?>
			    <?php endforeach; ?><?php wp_reset_postdata(); ?>
			</div>
			<?php endif;?>
		</div>
	</a>
</div>