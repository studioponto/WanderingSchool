<article <?php post_class(); ?>>
<div class="container-fluid">

<?php
$description = get_field('description');
$participant = get_field('participant');
?>

<div class="single_title col-xs-12 col-lg-offset-1 col-lg-10">
    <div class="thumb_info">
        <div class="thumb_title"><?php the_title(); ?></div>
        <?php if($participant):?>
        <div class="thumb_participant">
            <?php $i = 0; foreach( $participant as $post): $i++; ?><?php setup_postdata($post); ?><?php if ($i == 1) {echo 'By '; } else {echo ', '; }?><?php the_title(); ?><?php endforeach; ?><?php wp_reset_postdata(); ?>
        </div>
        <?php endif;?>
    </div>
</div>

<div class="clearfix"></div>

<div class="single_description col-xs-12 col-lg-offset-1 col-lg-10">
    <?php echo $description;?>
</div>


</div>
</article>