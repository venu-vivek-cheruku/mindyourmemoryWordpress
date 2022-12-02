<?php get_header(); ?>

  <?php get_template_part( 'content', 'banner' ); ?>

 <div class="inner-container deafult-template" >
  <?php if ( !empty( get_the_content() ) ): ?>

  <?php echo the_content(); ?>
  <?php endif; ?>
  </div>
<?php get_footer(); ?>
