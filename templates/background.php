<div id="background" class="splash-active">

<!--Splash-->
<?php
if ( is_front_page() ) {
  get_template_part('templates/splash');
} else {
  get_template_part('templates/splash_two');
}
?>

<!--Projects-->
<section id="back_projects">
<div class="background">
      <img class="fullBleed" src="<?php bloginfo('template_url'); ?>/assets/img/background/01/left.jpg" />
</div>
</section>

<!--Programme-->
<section id="back_programme">
  <div class="background">
      <img class="fullBleed" src="<?php bloginfo('template_url'); ?>/assets/img/background/01/center.jpg" />
  </div>
</section>


<!--Information-->
<section id="back_information">
<div class="background">
      <img class="fullBleed" src="<?php bloginfo('template_url'); ?>/assets/img/background/01/right.jpg" />
</div>
</section>

</div>