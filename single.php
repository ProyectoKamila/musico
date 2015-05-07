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
                                    <?php echo get_avatar($comment->comment_author_email); ?> 
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="ads-text">
                                    <p>
                                        Publicado el <?php echo get_the_date('d M Y '); ?> - a las <?php echo get_the_date('H M'); ?>
                                        <?php echo get_the_title(); ?> - <?php echo get_the_content(); ?> que sepa tocar  
                                        <?php
                                        foreach (get_field('instrumento') as $instrumento) {
                                            echo $instrumento . ', ';
                                        }
                                        ?> en 
                                        <?php
                                        $categoria = pk_get_the_category(get_the_ID(), 'categoria');
                                        $r = 1;
                                        foreach ($categoria as $category) {
                                            if ($r == 1) {
                                                echo $category->name . ', ';
                                                $r++;
                                            } else {
                                                echo $category->name;
                                            }
                                        }
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