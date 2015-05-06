<?php get_header()?>
<section class="ads espaciado-top">
	<div class="container">
		<div class="row">
                    <?php get_template_part('sidebar-box');?>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	<?php while (have_posts()) { the_post();?>

			<?php the_title()?>	
						<?php the_content()?>	
                          <p>Written by: 
<?php the_author_posts_link(); ?></p>
	<?php } ?>

<?php comments_template( $file, $separate_comments ); ?>
                            

</div>
</div>
</div>
<?php get_footer()?>