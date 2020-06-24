<?php get_header(); $options = get_desing_plus_option(); ?>

<?php
     // project **********************************************************************************
     if($options['show_index_project'] == 1) {
?>
<div id="index_project">

 <?php
      // catch phrase ----------------------------------------------
      $headline = $options['index_project_headline'];
      $desc = $options['index_project_desc'];
      if($headline || $desc) {
        $headline_font_size = $options['index_project_headline_font_size'];
        $desc_font_size = $options['index_project_desc_font_size'];
 ?>
 <div class="catchphrase">
  <?php if($headline) { ?>
  <h2 class="headline rich_font color_headline" style="font-size:<?php echo esc_html($headline_font_size); ?>px;"><?php echo esc_html($headline); ?></h2>
  <?php }; ?>
  <?php if($desc) { ?>
  <div class="desc" style="font-size:<?php echo esc_html($desc_font_size); ?>px;">
   <?php echo wpautop($desc); ?>
  </div>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php
      // project list ----------------------------------------------
      $post_num = esc_html($options['index_project_num']);
      $post_order = esc_html($options['index_project_order']);
      if($post_order == 'order_date') {
        $args = array('post_type' => 'project', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $post_num);
      } else {
        $args = array('post_type' => 'project', 'ignore_sticky_posts' => 1, 'orderby' => 'rand', 'posts_per_page' => $post_num);
      };
      $post_list = get_posts($args);
      if ($post_list) {
 ?>
 <ol id="project_list" class="clearfix">
  <?php
       foreach ($post_list as $post) : setup_postdata ($post);
         $project_catch = get_post_meta($post->ID, 'project_catch', true);
  ?>
  <li class="clearfix">
   <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php if(has_post_thumbnail()) { the_post_thumbnail('size2'); } else { ?><img src="<?php echo bloginfo('template_url'); ?>/img/common/no_image5.gif" title="" alt="" /><?php }; ?></a>
   <a class="title" href="<?php the_permalink() ?>"><span class="project_title"><?php the_title(); ?></span><?php if(!empty($project_catch)) { ?><span class="project_catch"><?php echo esc_html($project_catch); ?></span><?php }; ?></a>
  </li>
  <?php endforeach; wp_reset_query(); ?>
 </ol>
 <?php }; ?>

</div><!-- END #index_project -->
<?php }; ?>

<?php
     // news content **********************************************************************************
     if($options['show_index_news'] == 1) {
?>
<div id="index_news" class="clearfix<?php if( ($options['show_index_news_event'] != 1) || ($options['show_index_news_info'] != 1) ) { echo ' one_list'; }; ?>">

 <?php
      // catch phrase ----------------------------------------------
      $headline = $options['index_news_headline'];
      $desc = $options['index_news_desc'];
      if($headline || $desc) {
        $headline_font_size = $options['index_news_headline_font_size'];
        $desc_font_size = $options['index_news_desc_font_size'];
 ?>
 <div class="catchphrase clearfix">
  <?php if($headline) { ?>
  <h3 class="headline rich_font color_headline" style="font-size:<?php echo esc_html($headline_font_size); ?>px;"><?php echo esc_html($headline); ?></h3>
  <?php }; ?>
  <?php if($desc) { ?>
  <p class="desc" style="font-size:<?php echo esc_html($desc_font_size); ?>px;"><?php echo esc_html($desc); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php
      // event list ----------------------------------------------
      if($options['show_index_news_event'] == 1) {
        $post_num = esc_html($options['index_news_num']);
        $args = array('post_type' => 'event', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $post_num);
        $post_list = get_posts($args);
        if ($post_list) {
          $label = $options['index_news_event_label'];
          $button_label = $options['index_news_button_label'];
 ?>
 <div id="index_event_list" class="index_news_list">
  <?php if(!empty($label)) { ?>
  <h3 class="headline"><?php echo esc_html($label); ?></h3>
<?php
	if ( $button_label ) :
?>
  <a class="archive_link" href="<?php echo get_post_type_archive_link('event'); ?>"><?php echo esc_html($button_label); ?></a>
<?php
	endif;
?>
  <?php }; ?>
  <ol>
   <?php foreach ($post_list as $post) : setup_postdata ($post); ?>
   <li class="clearfix">
    <a href="<?php the_permalink() ?>">
     <time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><span class="title"><?php if(is_mobile()){trim_title(28);}else{trim_title(30);}; ?></span>
    </a>
   </li>
   <?php endforeach; wp_reset_query(); ?>
  </ol>
 </div>
 <?php }; }; ?>

 <?php
      // info list ----------------------------------------------
      if($options['show_index_news_info'] == 1) {
        $post_num = esc_html($options['index_news_num']);
        $args = array('post_type' => 'info', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $post_num);
        $post_list = get_posts($args);
        if ($post_list) {
          $label = $options['index_news_info_label'];
          $button_label = $options['index_news_button_label'];
 ?>
 <div id="index_info_list" class="index_news_list">
  <?php if(!empty($label)) { ?>
  <h3 class="headline"><?php echo esc_html($label); ?></h3>
<?php
	if ( $button_label ) :
?>
  <a class="archive_link" href="<?php echo get_post_type_archive_link('info'); ?>"><?php echo esc_html($button_label); ?></a>
<?php
	endif;
?>
  <?php }; ?>
  <ol>
   <?php foreach ($post_list as $post) : setup_postdata ($post); ?>
   <li class="clearfix">
    <a href="<?php the_permalink() ?>">
		<time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.d'); ?></time><span class="title"><?php if(is_mobile()){trim_title(28);}else{trim_title(30);}; ?></span>
    </a>
   </li>
   <?php endforeach; wp_reset_query(); ?>
  </ol>
 </div>
 <?php }; }; ?>

</div><!-- END #index_news -->
<?php }; ?>

<?php
     // 3 box **********************************************************************************
     if($options['show_index_content1'] == 1) {
?>

<div id="index_box">
 <div id="index_box_inner" class="clearfix">

  <ol class="index_box_list clearfix">
   <?php
        for($i = 1; $i <= 3; $i++):
         $image = wp_get_attachment_image_src( $options['index_content1_image'.$i], 'size3');
         $url = $options['index_content1_url'.$i];
         $target = $options['index_content1_target'.$i];
         $headline = str_replace(array("\r\n", "\r", "\n"), "<br>", $options['index_content1_headline'.$i]);
         $headline2 = str_replace(array("\r\n", "\r", "\n"), " ", $options['index_content1_headline'.$i]);
         $headline_font_size = $options['index_content1_headline_font_size'.$i] ? $options['index_content1_headline_font_size'.$i] : 20;
         $headline_color = $options['index_content1_color'.$i];
         $desc = $options['index_content1_desc'.$i];
         $desc_font_size = $options['index_content1_desc_font_size'.$i] ? $options['index_content1_desc_font_size'.$i] : 14;
   ?>
   <li class="box box<?php echo $i; ?>">
    <?php if(!empty($headline)) { ?><h3 class="headline light_font" style="background:#<?php echo esc_attr($headline_color); ?>; font-size: <?php echo esc_attr( $headline_font_size ); ?>px;"><span><?php echo $headline; ?></span></h3><?php }; ?>
    <?php if(!empty($desc)) { ?><div class="desc" style="font-size: <?php echo esc_attr( $desc_font_size ); ?>px;"><?php echo wpautop($desc); ?></div><?php }; ?>
    <?php if(!empty($image)) { ?>
    <div class="image">
     <?php if(empty($url)) { ?>
     <img src="<?php echo esc_attr($image[0]); ?>" title="" alt="" />
     <?php } else { ?>
     <a href="<?php echo esc_url($url); ?>"<?php if ( $target ) { echo ' target="_blank"'; } ?>>
      <img src="<?php echo esc_attr($image[0]); ?>" title="" alt="" />
      <?php if(!empty($headline2)) { ?><span><?php echo esc_html($headline2); ?></span><?php }; ?>
     </a>
     <?php }; ?>
    </div>
    <?php }; ?>
   </li>
   <?php endfor; ?>
  </ol><!-- END .index_box -->
  
  <div style="height: 30px;"></div>
  <div style="margin: 0 auto; text-align: center;">
      <a href="<?php echo esc_url(site_url('supplies')); ?>">
          <img src="<?php echo esc_url(wp_get_attachment_url(59)); ?>" alt="消耗品" class="top_banner_syomohin">
      </a>
  </div>

 </div><!-- END #index_box_inner -->
</div><!-- END #index_box -->
<?php }; ?>

<?php
     // image **********************************************************************************
     $image = wp_get_attachment_image_src( $options['index_blog_image'], 'full');
     $url = $options['index_blog_image_url'];
     $target = $options['index_blog_image_target'];
     if(!empty($image)) {
?>
<div id="index_blog_image">
 <?php if(!empty($url)) { ?>
 <a href="<?php echo esc_url($url); ?>"<?php if ( $target ) { echo ' target="_blank"'; } ?>><img src="<?php echo esc_attr($image[0]); ?>" title="" alt="" /></a>
 <?php } else { ?>
 <img src="<?php echo esc_attr($image[0]); ?>" title="" alt="" />
 <?php }; ?>
</div>
<?php } ?>

<?php
     // blog **********************************************************************************
     if($options['show_index_blog_content'] == 1) {
?>

<div id="index_blog">

 <?php
      // catch phrase ----------------------------------------------
      $headline = $options['index_blog_headline'];
      $desc = $options['index_blog_desc'];
      if($headline || $desc) {
        $headline_font_size = $options['index_blog_headline_font_size'];
        $desc_font_size = $options['index_blog_desc_font_size'];
        $show_link = $options['show_index_blog_button'];
        $link_label = $options['index_blog_button'];
 ?>
 <div class="catchphrase clearfix">
  <?php if($headline) { ?>
  <h3 class="headline rich_font color_headline" style="font-size:<?php echo esc_html($headline_font_size); ?>px;"><?php echo esc_html($headline); ?></h3>
  <?php }; ?>
  <?php if($desc) { ?>
  <p class="desc" style="font-size:<?php echo esc_html($desc_font_size); ?>px;"><?php echo esc_html($desc); ?></p>
  <?php }; ?>
 </div>
 <?php }; ?>

 <?php
      // blog list ----------------------------------------------
      $post_num = esc_html($options['index_blog_num']);
      $args = array('post_type' => 'post', 'ignore_sticky_posts' => 1, 'orderby' => 'date', 'order' => 'DESC', 'posts_per_page' => $post_num);
      $post_list = get_posts($args);
      if ($post_list) {
 ?>
 <ol id="blog_list" class="clearfix">
  <?php foreach ($post_list as $post) : setup_postdata ($post); ?>
  <li class="clearfix">
   <a class="image" href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
    <?php if ($options['index_blog_show_date']){ ?><p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></p><?php }; ?>
    <?php if(has_post_thumbnail()) { the_post_thumbnail('size3'); } else { ?><img src="<?php echo bloginfo('template_url'); ?>/img/common/no_image3.gif" title="" alt="" /><?php }; ?>
   </a>
   <div class="info">
    <a class="title" href="<?php the_permalink() ?>"><?php trim_title(45); ?></a>
    <?php if(has_category()) { if ($options['index_blog_show_category']){ ?><p class="category"><?php show_one_category(); ?></p><?php }; }; ?>
   </div>
  </li>
  <?php endforeach; wp_reset_query(); ?>
 </ol>
 <?php }; ?>

 <?php if($show_link == 1) { ?><a class="index_blog_link" href="<?php echo get_permalink( get_option('page_for_posts') ); ?>"><?php echo esc_html($link_label); ?></a><?php }; ?>

</div><!-- END #index_blog -->

<div id="index_box">
    <div id="index_box_inner" class="clearfix">
        <div class="top_purus_movie_title_top"></div>
        <h3 class="headline rich_font color_headline" style="font-size: 180%; text-align: center;">プールス紹介動画</h3>
        <div style="height:40px;"></div>
        <div style="margin: 0 auto !important; text-align:center !important;">
            <iframe class="top_purus_movie" align="center" src="https://www.youtube.com/embed/sTi_yZQq41A?ecver=2" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        </div>
        <br>
        <p style="margin: 20px auto 20px atuo; text-align:center;"><a href="http://localhost/pawan_sir/its_wp/its_video/" class="q_button bt_blue" style="padding: 20px;">プールス紹介動画ページはこちら</a></p>
    </div><!-- END #index_box_inner -->
</div>

<?php }; ?>

<?php get_footer(); ?>
