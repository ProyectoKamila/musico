<?php
/*
  Template Name: Search Page
 */
get_header('');
?>
<section class="ads espaciado-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title">
                    <h1>Bienvenido a musicodisponible</h1>
                    <h2>La comunidad”Músico Disponible” es una pequeña red social que permite un socio busca urgentemente músicos</h2>
                </div>
            </div>
          <?php get_template_part('sidebar-box');?>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <h3 class="">Anuncios</h3>
                <div class="container-fluid items">
                    <div class="row">

<?php while (have_posts()) {
    $x = the_post(); 
    
?>
                              <?php
                                //Gather comments for a specific page/post 
                                $comments = get_comments(array(
                                    'post_id'=>$post_id,
                                    'status' => 'approve' //Change this to the type of comments to be displayed
                                ));
                               
                                ?>
                            <?php foreach ($comments as $comment){?>
                         
                             <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                <div class="thumbnail">
                                    <?php echo get_avatar($comment->comment_author_email); ?> 
                                </div>
                            </div>
                            <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                <div class="ads-text">
                                    <a href="author/<?php echo get_comment_author_link(); ?>">  <p><?php echo $comment->comment_date;?> - <?php echo $comment->comment_content;?></p></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                    <?php } ?>
<?php } ?>

                    </div>
                </div>
            </div>
      
            </div>
        </div>
    </section>
    <?php get_footer(''); ?>