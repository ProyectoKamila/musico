<?php get_header() ?>
<section class="ads espaciado-top">
    <div class="container">
        <div class="row">
            <?php get_template_part('sidebar-box');
            wp_reset_query();
            ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="">Anuncios</h3>
                <div class="container-fluid items">
                    <div class="row">

                        <?php
                        the_post();
                        ?>

                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

                        </div>
                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                            <div class="ads-text">
                                <p>
                                <?php the_content(); ?>
                                </p>


                            </div>
                        </div>
                            <div class="clearfix"></div>
                                 <h3 class="">Comentarios</h3>
                            <?php
                            //Gather comments for a specific page/post 
                            $comments = get_comments(array(
                                'post_id' => $post_id,
                                'status' => 'approve' //Change this to the type of comments to be displayed
                            ));
                            ?>
                            <?php foreach ($comments as $comment) { ?>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <div class="thumbnail">
                                        <?php echo get_avatar($comment->comment_author_email); ?> 
                                    </div>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                    <div class="ads-text">
                                        
                                        <p>
                                            Publicado el <?php echo $comment->comment_date; ?> -
                                            <?php echo $comment->comment_content ?> 
                                        </p>

                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            <?php } ?>
                        
                


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
get_footer()?>