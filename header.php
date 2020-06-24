<?php 
$options = get_desing_plus_option(); 
$pickedcolor5 = hex2rgb( $options['pickedcolor5'] );
$background_opacity = $options['background_opacity'] ? $options['background_opacity'] : 0.7;
?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php
     $options = get_desing_plus_option();
     if($options['use_ogp']) {
?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php }; ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<meta name="viewport" content="width=device-width">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<?php if($options['use_ogp']) { ogp(); }; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>

<?php if($options['use_load_icon']) { ?>
<div id="site_loader_overlay">
 <div id="site_loader_spinner"></div>
</div>
<div id="site_wrap">
<?php }; ?>

 <div id="header" style="background-color: rgba(<?php echo esc_attr( implode( ', ', $pickedcolor5 ) ); ?>, <?php echo esc_attr( $background_opacity ); ?>);">
  <div id="header_inner" class="clearfix<?php if($options['use_translate']){ echo ' header_with_translate';}; ?>">
    <div id="h_top_menu">
        <?php
            wp_nav_menu( array(
                'menu' => 'Top Menu'
            ) );
        ?>
    </div>

    <div class="clearfix"></div>
    
   <?php header_logo(); ?>

  <?php if($options['use_translate']){ ?>
    <?php if(count($options['translate_type2_data'])<3){ ?>
     <ul id="translated_sites" class="horizontal">
     <?php
      foreach ( $options['translate_type2_data'] as $key => $value ) :
        $icon = wp_get_attachment_image_src( $value['icon'], 'full');
        $icon_preset = $value['icon_preset'];
        $lang = $value['lang'];
        $url = $value['url'];
     ?>
      <li>
        <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
        <a href="<?php echo esc_url($url); ?>" target="_blank">
        <?php }else{ ?>
        <div class="stay">
        <?php }; ?>
          <?php
            if($icon_preset!='none'){
              echo '<span><img src="'.get_template_directory_uri().'/admin/img/'.esc_html($icon_preset).'.png" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
            }elseif(!empty($icon)){ 
              echo '<span><img src="'.esc_attr($icon[0]).'" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
            };
          ?>
          <?php echo esc_html($lang); ?>
        <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
        </a>
        <?php }else{ ?>
        </div>
        <?php }; ?>
      </li>
     <?php endforeach; ?>
     </ul>
    <?php }else{ ?>
     <ul id="translated_sites" class="vertical">
     <?php
      $count = 1;
      foreach ( $options['translate_type2_data'] as $key => $value ) :
        $icon = wp_get_attachment_image_src( $value['icon'], 'full');
        $icon_preset = $value['icon_preset'];
        $lang = $value['lang'];
        $url = $value['url'];
     ?>
      <?php if($count==1){ ?>
      <li>
        <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
        <a href="<?php echo esc_url($url); ?>" target="_blank">
        <?php }else{ ?>
        <div class="stay">
        <?php }; ?>
          <?php
            if($icon_preset!='none'){
              echo '<span><img src="'.get_template_directory_uri().'/admin/img/'.esc_html($icon_preset).'.png" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
            }elseif(!empty($icon)){ 
              echo '<span><img src="'.esc_attr($icon[0]).'" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
            };
          ?>
          <?php echo esc_html($lang); ?>
        <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
        </a>
        <?php }else{ ?>
        </div>
        <?php }; ?>
        <ul class="sub-menu">
      <?php }elseif($count!=count($options['translate_type2_data'])){ ?>
        <li>
          <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
          <a href="<?php echo esc_url($url); ?>" target="_blank">
          <?php }else{ ?>
          <div class="stay">
          <?php }; ?>
            <?php
              if($icon_preset!='none'){
                echo '<span><img src="'.get_template_directory_uri().'/admin/img/'.esc_html($icon_preset).'.png" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
              }elseif(!empty($icon)){ 
                echo '<span><img src="'.esc_attr($icon[0]).'" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
              };
            ?>
            <?php echo esc_html($lang); ?>
          <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
          </a>
          <?php }else{ ?>
          </div>
          <?php }; ?>
        </li>
      <?php }else{ ?>
        <li>
          <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
          <a href="<?php echo esc_url($url); ?>" target="_blank">
          <?php }else{ ?>
          <div class="stay">
          <?php }; ?>
            <?php
              if($icon_preset!='none'){
                echo '<span><img src="'.get_template_directory_uri().'/admin/img/'.esc_html($icon_preset).'.png" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
              }elseif(!empty($icon)){ 
                echo '<span><img src="'.esc_attr($icon[0]).'" alt="'.esc_html($lang).'" title="'.esc_html($lang).'" /></span>';
              };
            ?>
            <?php echo esc_html($lang); ?>
          <?php if(!preg_match('^'.home_url().'^', $url)){ ?>
          </a>
          <?php }else{ ?>
          </div>
          <?php }; ?>
        </li>
        </ul>
      </li>
      <?php }; ?>
     <?php $count++; endforeach; ?>
     </ul>
    <?php }; ?>
  <?php }; ?>

   <?php if (has_nav_menu('global-menu')) { ?>
   <div id="global_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
   </div>
   <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
   <?php }; ?>
  </div>
 </div><!-- END #header -->

 <?php
      if(is_front_page()) {
        if($options['header_content_type'] == 'header_slider') {
        // header slider -----------------------------------------------------------------------------------------------
 ?>

 <div id="header_slider">
  <?php
       for($i=1; $i<= 5; $i++):
         if ( !is_mobile() ) {
           $image = wp_get_attachment_image_src( $options['slider_image'.$i], 'size6');
         } else {
           $image = wp_get_attachment_image_src( $options['slider_image_mobile'.$i], 'full');
         }
         if(!empty($image)) {
           $url = $options['slider_url'.$i];
           $target = $options['slider_target'.$i];
           $use_catch = $options['use_slider_catch'.$i];
  ?>
  <div class="item item<?php echo $i; ?>">
   <?php
        if($use_catch == 1) {
          $catch = esc_html($options['slider_catch'.$i]);
          $font_size = $options['slider_catch_font_size'.$i];
          $font_color = $options['slider_catch_color'.$i];
          $shadow1 = $options['slider_catch_shadow_a'.$i];
          $shadow2 = $options['slider_catch_shadow_b'.$i];
          $shadow3 = $options['slider_catch_shadow_c'.$i];
          $shadow4 = $options['slider_catch_shadow_color'.$i];
          $use_button = $options['show_slider_catch_button'.$i];
   ?>
   <div class="caption">
    <p class="title rich_font" style="font-size:<?php echo esc_html($font_size); ?>px; text-shadow:<?php echo esc_html($shadow1); ?>px <?php echo esc_html($shadow2); ?>px <?php echo esc_html($shadow3); ?>px #<?php echo esc_html($shadow4); ?>; color:#<?php echo esc_html($font_color); ?>;"><?php echo nl2br($catch); ?></p>
    <?php
         if($use_button == 1) {
           $button_text = $options['slider_catch_button'.$i];
    ?>
    <a class="button" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>><?php echo esc_html($button_text); ?></a>
    <?php }; // END if use button ?>
   </div><!-- END .caption -->
   <?php }; // END if use catch ?>
   <?php if($url) { ?>
   <a class="overlay" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>>
    <span><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></span>
   </a>
   <?php } else { ?>
   <div class="overlay">
    <span><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></span>
   </div>
   <?php }; // END if has url ?>
  </div><!-- END .item -->
  <?php
         } // END if has image
       endfor;
  ?>
 </div><!-- END #header_slider -->

 <?php
      // header content ------------------------------------------------------------------------------------------
      } elseif($options['header_content_type'] == 'header_content') {
 ?>

 <div id="header_content">
  <ol class="clearfix">
   <?php
        for($i=1; $i<= 4; $i++):
           $image = wp_get_attachment_image_src( $options['header_content_image'.$i], 'size5');
          if(!empty($image)) {
            $url = $options['header_content_url'.$i];
            $target = $options['header_content_target'.$i];
            $catch = $options['header_content_catch'.$i];
            $desc = $options['header_content_desc'.$i];
            $font_size = $options['header_content_font_size'.$i];
            $desc_font_size = $options['header_content_desc_font_size'.$i];
   ?>
   <li class="item item<?php echo $i; ?>">
    <?php if($url) { ?>
    <?php if(!empty($catch)) { ?><div class="catch light_font" style="font-size:<?php echo esc_html($font_size); ?>px;"><?php echo wpautop($catch); ?></div><?php }; ?>
    <a class="image" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></a>
    <?php if(!empty($desc)) { ?><a class="desc" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?> style="font-size:<?php echo esc_html($desc_font_size); ?>px;"><?php echo $desc; ?></a><?php }; ?>
    <?php } else { ?>
    <?php if(!empty($catch)) { ?><p class="catch light_font" style="font-size:<?php echo esc_html($font_size); ?>px;"><?php echo $catch; ?></p><?php }; ?>
    <div class="image"><img src="<?php echo esc_attr($image[0]); ?>" alt="" title="" /></div>
    <?php if(!empty($desc)) { ?><p class="desc" style="font-size:<?php echo esc_html($desc_font_size); ?>px;"><?php echo $desc; ?></p><?php }; ?>
    <?php }; ?>
   </li>
   <?php
          } // END if has image
        endfor;
   ?>
  </ol>
 </div><!-- END #header_content -->

 <?php }; // END header content type ?>

 <?php }; // END if is front page ?>

 <div id="main_contents" class="clearfix">

