<?php get_header();?>
<?php     $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
<section class="espaciado-top author ads">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <div class="profile-dates">
                            <div class="title">
                                DATOS PERSONALES
                            </div> 
                              <?php echo get_avatar($curauth->user_email,200); ?> 
                            <h2><?php echo $curauth->nickname; ?></h2>
                            <h3><?php echo $curauth->first_name; ?> <?php echo $curauth->last_name; ?></h3>
                            <p><?php echo $curauth->user_description;?> </p>
                            <p>Registrado desde: <?php echo $curauth->user_registered;
                            
                            $author_id = get_the_author_meta('ID');
                            ?></p>


                            <p>Se tocar: <?php echo get_field('instrumento', 'user_'. $author_id ); ?></p>
                            <p>Nivel: <?php echo get_field('instrumento', 'user_'. $author_id ); ?></p>
                            <p><?php echo get_field('estado', 'user_'. $author_id ); ?></p>
                             <p><?php echo get_field('estado', 'user_'. $author_id ); ?></p>
                            
                           

                    </div>
                </div>
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <?php echo $author_id;?>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="thumbnail">
                                    <?php echo get_avatar($comment->comment_author_email); ?> 
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="ads-text">
                                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">  <p> <?php the_time('d M Y'); ?>  - <?php the_title();?> <?php the_content();?></p></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    <?php endwhile; else: ?>
                                   <p><?php _e('No posts by this author.'); ?></p>
                      <?php endif; ?>
            </div>
        </div>
    </div>
   
</section>
<?php get_footer();?>