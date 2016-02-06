<?php
$thumbID = get_the_post_thumbnail( $post->ID, 'thumb' );
?>

<?php if ( has_post_thumbnail() ) { ?>
	<div id="thumb_<?php echo basename(get_permalink()); ?>" class="preview"><?php echo "$thumbID"; ?></div>
<?php } else {?>
	<!--<div class="preview"><img src="<?php bloginfo('template_url'); ?>/assets/img/preview.png" /></div>-->
<?php } ?>