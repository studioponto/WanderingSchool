<article <?php post_class(); ?>>
<div class="container-fluid">

<?php
$description = get_field('description');
$participant = get_field('participant');
$room = get_field('room');
$images = get_field('images');
?>

<div class="single_title col-xs-12 col-md-offset-1 col-md-10">
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
</div>

<div class="clearfix"></div>

<?php if( $images ): ?>
<div class="row">
<div class="single_gallery col-xs-12">
    <div class="single_slides">
    <?php foreach( $images as $image ): ?>
        <div>
            <div class="slide_wrap">
                <div class="slide_image"><img src="<?php echo $image['url']; ?>" /></div>
                <div class="slide_caption"><?php echo $image['caption']; ?></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
</div>
<?php endif; ?>
<div class="clearfix"></div>

<div class="single_description col-xs-12 col-md-offset-1 col-md-10">
    <?php echo $description;?>
</div>

<!--
<div class="single_tools col-xs-4">
<?php if($room):?>
    <ul>
    <?php foreach( $room as $post):?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif;?>
</div>
-->

</div>
</article>