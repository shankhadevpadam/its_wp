<?php
/*
Template Name:No sidebar
*/
__('No sidebar', 'tcd-w');
?>
<?php
     get_header();
     $options = get_desing_plus_option();
?>

<?php get_template_part('breadcrumb'); ?>

<div id="main_col" class="clearfix">

 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

 <div id="article">
	<div id="page_title_block">
  		<h2 id="post_title" class="rich_font"><?php the_title(); ?></h2>
  	</div>

  <div class="post_content clearfix">
   <?php the_content(__('Read more', 'tcd-w')); ?>
   <?php custom_wp_link_pages(); ?>
  </div>

 </div><!-- END #article -->

 <?php endwhile; endif; ?>

</div><!-- END #main_col -->

<?php get_footer(); ?>