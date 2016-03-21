<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <?php wp_head(); ?>

  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
</head>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->


<!--Splash-->
<div id="spinner">
  <img class="sticker sticker_1" src="<?php bloginfo('template_url'); ?>/assets/img/background/sticker_1.png">
  <img class="sticker sticker_2" src="<?php bloginfo('template_url'); ?>/assets/img/background/sticker_2.png">
  <img class="sticker sticker_4" src="<?php bloginfo('template_url'); ?>/assets/img/background/sticker_4.png">
  <img class="sticker sticker_5" src="<?php bloginfo('template_url'); ?>/assets/img/background/sticker_5.png">
  <img class="sticker sticker_6" src="<?php bloginfo('template_url'); ?>/assets/img/background/sticker_6.png">


  <div class="brand brand1">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo-wandering.svg" class="shadow" />
  </div>
  <div class="brand brand2">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/logo-school.svg" class="shadow" />
  </div>
  <!-- <div class="loader"></div> -->

  <div class="tws_info">
      <div class="tws_info_in tws_info_in1">1.—17. April, 2016</div>
      <div class="cleardiv"></div>
      <div class="tws_info_in tws_info_in2">at MACAO, Milan—It</div>
      <div class="cleardiv"></div>
      <div class="tws_info_in tws_info_in3">Viale Molise, 68</div>
  </div>

</div>

<div class="wrap-section splash-active">