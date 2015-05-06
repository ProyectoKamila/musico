<?php get_header()?>
<section class="ads">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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