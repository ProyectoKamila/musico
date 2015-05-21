<?php get_header() ?>
<section class="ads espaciado-top">
    <div class="container">
        <div class="row">
            <?php
            get_template_part('sidebar-box');
            wp_reset_query();
            ?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="">Anuncios</h3>
                <div class="container-fluid items">
                    <div class="row">

                        <?php
                        while (have_posts()) {
                            the_post();
                            ?>

                            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="thumbnail">
                                    <a href="<?php echo get_author_posts_url($post->post_author); ?>">
                                       <img src="<?php echo get_field('imagen_perfil', 'user_' . get_the_author_meta('id')); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="ads-text">
                                <p>
                                            Publicado el <?php echo get_the_date('d M Y '); ?> - a las <?php echo get_the_date('H M'); ?>
                                            <?php echo get_the_title(); ?> - <?php echo get_the_content(); ?> que sepa tocar  
                                            <?php
                                            if (get_field('instrumento')) {
                                                foreach (get_field('instrumento') as $instrumento) {
                                                    echo $instrumento . ', ';
                                                }
                                            }
                                            ?> en la ciudad de
                                            <?php
                                            logic_meta_box_cb1($post);
                                            ?>

                                        </p>

                                </div>
                            </div>
                            <div class="clearfix"></div>
                                 <h3 class="">Comentarios</h3>
                            <?php
                            //Gather comments for a specific page/post 
                            $comments = get_comments(array(
                                'post_id' => get_the_ID(),
                                'status' => 'approve' //Change this to the type of comments to be displayed
                            ));
//                            debug(get_the_ID());
                            ?>
                            <?php foreach ($comments as $comment) { ?>
                                 <?php  //debug($comment,false);?>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <div class="thumbnail">
                                        <a href="<?php echo get_author_posts_url( $comment->user_id); ?>">
                                       <img src="<?php echo get_field('imagen_perfil', 'user_' . $comment->user_id); ?>" alt="<?php echo $curauth->nickname; ?>"/>
                                    </a>
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
                            <?php // debug($post->comment_status) ?>
                            <?php comments_template(); ?>
                            <div class="clearfix"></div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer()?>