<?php get_header(); ?>

  <?php 
  // get_template_part( 'content', 'banner' ); 
  ?>

  <?php get_template_part( 'content', 'quote' ); ?>

  <?php get_template_part( 'content', 'intro' ); ?>

  <?php if ( !empty( get_the_content() ) ): ?>

  <?php get_template_part( 'content', 'story' ); ?>

  <?php get_template_part( 'content', 'question' ); ?>

  <?php endif; ?>

<?php get_footer(); ?>
